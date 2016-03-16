// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute', 'jqwidgets', 'ngResource']);

/**
 * SchedulerController 
 */
appModule.controller('SchedulerController', ['SchedulerService', 'VenueService','$scope', function(SchedulerService, VenueService, $scope) {
    $scope.schedulerEvents = SchedulerService.getAllEventsForScheduler();
    //SchedulerService.getAllEventsForScheduler().then(function(schedulerEvents){
    //    $scope.schedulerEvents = schedulerEvents;
    //});
    $scope.venues = [];
    VenueService.getAllVenues().then(function(venues) {
        $scope.venues = venues;
        console.log('venues after: '+ $scope.venues);
    });



    // prepare the data
    var source =
    {
        dataType: "array",
        dataFields: [
            { name: 'id', type: 'string' },
            { name: 'showComments', type: 'string' },
            { name: 'showName', type: 'string' },
            { name: 'calendar', type: 'string' },
            { name: 'start', type: 'date' },
            { name: 'end', type: 'date' },
            { name: 'adminCreator', type: 'string'},
            { name: 'venueName', type: 'string'}
        ],
        id: 'id',
        localData: $scope.schedulerEvents
    };

    $scope.settings = {
        date: new $.jqx.date(2015, 11, 23),
        width: '100%',
        height: 1200,
        source: source,
        view: 'weekView',
        showLegend: true,
        editDialog: true,
        created: function (args) {
           args.instance.ensureAppointmentVisible('1');
        },
        editDialogCreate: function(event){
            //alert($scope.venues);
            var args = event.args;
            var appointment = args.appointment;
            var fields = args.fields;

            fields.subjectLabel.html("Show Name");
            fields.fromLabel.html("Start Time");
            fields.toLabel.html("End Time");
            fields.descriptionLabel.html("Show Comments");
            fields.resourceLabel.html("Status");            
            fields.timeZoneContainer.hide();            
            fields.allDayContainer.hide();
            fields.statusContainer.hide();
            fields.locationContainer.hide();
            fields.colorContainer.hide();

            eventMaintenanceButton = $("<button style='margin-left: 5px; float:right;'>Event Maintenance</button>");
            fields.buttons.append(eventMaintenanceButton);
            eventMaintenanceButton.jqxButton({ theme: this.theme });

            var venueFieldsMap = {
                "Venue Name":"venueName", 
                "Street":"venueStreet",
                "City": "venueCity",
                "State": "venueState",
                "Zipcode": "venueZipcode",
                "Contact Name": "venueContactName",
                "Contact #": "venueContactNumber",
                "Venue Comments": "venueComments",
                "Administrator": "adminField"
            };

            var venueFields = "";
            $.each(venueFieldsMap, function(key, value) {
                venueFields += "<div>";
                venueFields += "<div class='jqx-scheduler-edit-dialog-label'>" + key + "</div>";
                venueFields += "<div class='jqx-scheduler-edit-dialog-field'><"+ (key == "Venue Comments"? "textarea": "input") + " type='text' id='" + value +"' readonly required /></div>";
                venueFields += "</div>";    
            });
            
            var i = 0;
            $('#dialogscheduler').children('div').each(function() {
            i += 1;
            if(i == 1){
                $(this).after(venueFields);
                return false;
            }
            });


            $('#dialogscheduler input').jqxInput({ width: '100%', height: 25});
            $('#dialogscheduler textarea').jqxInput({ width: '100%', height: 50});


        },
        editDialogOpen: function(event){
            var args = event.args;
            var appointment = args.appointment;

            if(appointment){
                $('#adminField').val(appointment.adminCreator);
                $('#venueName').val(appointment.venueName);
            } else {
                $('#adminField, #venueName').val('');
            }
        },
        appointmentChange: function(event){
            var args = event.args;
            var appointment = args.appointment;

            appointment.adminCreator = $('#adminField').val();
            appointment.venueName = $('#venueName').val();
        },
        resources:
        {
            colorScheme: "scheme05",
            dataField: "calendar",
            source:  new $.jqx.dataAdapter(source)
        },
        appointmentDataFields:
        {
            from: "start",
            to: "end",
            id: "id",
            description: "showComments",
            subject: "showName",
            resourceId: "calendar",
            adminCreator: "adminCreator",
            venueName: "venueName"
        },
        views:
        [
            'dayView',
            'weekView',
            'monthView', 
            'agendaView'
        ],
    };

}]); 
