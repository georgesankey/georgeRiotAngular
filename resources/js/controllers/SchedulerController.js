// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute', 'jqwidgets']);

/**
 * SchedulerController 
 */
appModule.controller('SchedulerController', ['SchedulerService', 'VenueService', 'UserService', '$scope', '$q', function(SchedulerService, VenueService, UserService, $scope, $q) {
    
    $scope.createScheduler = false;
    var schedParam = SchedulerService.getAllEventsForScheduler();
    var venuesParam = VenueService.getAllVenues();
    var userParam = UserService.getSessionUserData();
 

    $q.all([schedParam, venuesParam, userParam])
    .then(function(response){
    $scope.sourceSchedule = response[0];
    $scope.venues = response[1];
    $scope.currentUser = response[2];

    var sourceSchedule = {
            dataType: "array",
            dataFields: [
                { name: 'id', type: 'string' },
                { name: 'comments', type: 'string' },
                { name: 'show_name', type: 'string' },
                { name: 'show_status', type: 'string' },
                { name: 'from', type: 'date' },
                { name: 'to', type: 'date' },
                { name: 'administrator', type: 'string'},
                { name: 'venue_id', type: 'string'}
            ],
            id: 'id',
            localData: $scope.sourceSchedule
    };

    $scope.settings = {
        date: new $.jqx.date(),
        width: '100%',
        height: 1200,
        source: sourceSchedule,
        view: 'weekView',
        showLegend: true,
        editDialog: true,
        created: function (args) {
          //args.instance.ensureAppointmentVisible('2');
        },
        editDialogCreate: function(event){
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

            var eventMaintenanceButton = $("<button style='margin-left: 5px; float:right;'>Event Maintenance</button>");
            fields.buttons.append(eventMaintenanceButton);
            eventMaintenanceButton.jqxButton({ theme: this.theme });

            var venueFieldsMap = {
                "Venue Name": "comboboxVenueName",
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
                venueFields += "<div class='jqx-scheduler-edit-dialog-field'><"+ (key == "Venue Comments"? "textarea": 
                    (key == "Venue Name" ? "div" : "input")) + " type='text' id='" + value +"' " +  
                        (key !== "Venue Name"? "readonly required />": "></div>") + "</div>";
                venueFields += "</div>";    
            });
            
            $('#dialogscheduler div:first-child').first().after(venueFields);
            
            var venueNameSource = [];
            var venueIdSource = [];
            $.each($scope.venues, function(index, value) {
                    venueNameSource.push(value.name);
                    venueIdSource.push(value.id);
            });

            $scope.venueNames = venueNameSource;
            $scope.venueIds = venueIdSource;

            $('#dialogscheduler input').jqxInput({ width: '100%', height: 25});
            $('#dialogscheduler textarea').jqxInput({ width: '100%', height: 50});
            $("#comboboxVenueName").jqxDropDownList({ source: venueNameSource, width: '100%', height: '25px' });            

        },
        editDialogOpen: function(event){
            var args = event.args;
            var appointment = args.appointment;

            if(appointment){
                //existing appointment
                $.each($scope.venues, function(index, value) {
                    if(value.id == appointment.venue){
                        $("#comboboxVenueName").jqxDropDownList('selectedIndex', index);
                        updateVenueFields(value);    
                        UserService.getUser(appointment.adminCreator)
                        .then(function(userItem) {
                            $('#adminField').val(userItem.first_name + " " + userItem.last_name + " ("+ userItem.email + ")");
                        });
                    }
                });  
            } else {
                //new appointment
                VenueService.getVenue($scope.venues[0].id).then(function(venueItem) {
                    updateVenueFields(venueItem);   
                });

                $("#comboboxVenueName").jqxDropDownList('selectedIndex', 0);
                $('#adminField').val($scope.currentUser.first_name + " " + $scope.currentUser.last_name + " (" + $scope.currentUser.email + ")");
            }

                $("#comboboxVenueName").on('change', function (event) {
                    var args = event.args;
                    if(args){
                        var index = args.index;
                        VenueService.getVenue($scope.venueIds[index]).then(function (venueItem) {
                            updateVenueFields(venueItem); 
                        });
                    }
                });
        },
        appointmentChange: function(event){
            var args = event.args;
            var appointment = args.appointment;

            //appointment.adminCreator = $('#adminField').val();
            //appointment.venueName = $('#venueName').val();
        },
        resources:
        {
            colorScheme: "scheme05",
            dataField: "show_status",
            source:  new $.jqx.dataAdapter(sourceSchedule)
        },
        appointmentDataFields:
        {
            from: "from",
            to: "to",
            id: "id",
            description: "comments",
            subject: "show_name",
            resourceId: "show_status",
            adminCreator: "administrator",
            venue: "venue_id"
        },
        views:
        [
            'dayView',
            'weekView',
            'monthView', 
            'agendaView'
        ]
    }; //end of $scope.settings
        $scope.createScheduler = true;

}); //end of then clause
    


}]); //end of SchedulerController

function updateVenueFields(venue){
    $('#venueStreet').val(venue.street_1);
    $('#venueCity').val(venue.city);
    $('#venueState').val(venue.state);
    $('#venueZipcode').val(venue.zipcode);
    $('#venueContactName').val(venue.first_name + " " + venue.last_name);
    var contactNumber = (venue.work_number !== "" ? venue.work_number + " (WORK)" : 
        (venue.cell_number !== "" ? venue.cell_number + " (CELL)" : venue.home_number + " (HOME)"));
    $('#venueContactNumber').val(contactNumber);
    $('#venueComments').val(venue.comments); 
} 