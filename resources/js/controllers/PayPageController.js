// Define App
var appModule = window.appModule || 
angular.module("ScheduleApp", ["ngRoute", "ngResource", "jqwidgets"]);

/** 
 * Renders TimeSheet info & other notifications
 */
 appModule.controller('PayPageController',  [ 'PayPageService', 'VenueService','$scope','$rootScope', '$http', '$q','$route' , function ( PayPageService, VenueService, $scope, $rootScope, $http,$q, $route) {


    
    $scope.createuserList = false;
    $scope.timeSheetShowFlag = true;
    $scope.userFormShowFlag = false;
    var user = $rootScope.user.role_name;
    if(user !== "Administrator"){

           

    var venueParam = VenueService.getAllVenues();
    var usertimeSheetParam = PayPageService.getUsersTimesheetEntries();
    
    $q.all([venueParam,usertimeSheetParam])
    .then(function(response){
    $scope.allVenues = response[0];
    $scope.allUserTimeSheetEntries = response[1];
    

    $scope.dateInputSettings =
    {
      width: 200,
      height: 30,
      formatString: 'd',
      animationType: 'fade'
      
    }
    //$scope.convertedDate = $scope.date;
    // Change the text reflecting the date picker
    $("#date").on('change', function (event) {
       var selection = $("#date").jqxDateTimeInput('getDate');
                       
                });



    $scope.suitcase = [15,20,40];
    $scope.travel = [20,30];
    $scope.workShop = [125,150,175];
    $scope.driver = [15];
    $scope.watchShow = [30];

 
    $scope.date = new Date();

    //TimeSheet Entry 
          $scope.newEntry = {
                  
          userId: $rootScope.user.id,
          date:  $scope.date,
          venueId: "",       
          workShop:  0,
          travel:     0,
          driver:     0,
          suitcase:   0,    
          watchShow:  0,
          rehersalHours:0,
          meetingHours: 0,                 
          hospitalCompliance:0, 
          total: 0,
          comments:""

        };
         
          // Log details first
          $scope.submitEntry = function() {
            
           PayPageService.submitEntry($scope.newEntry).then(function(data) {
                  alertLog("Timesheet Entry Created");                  
                });
      
                                
              }

          

              //Calculation Total Logic
            $scope.totalCalculation = function() { 
              return ($scope.newEntry.travel + $scope.newEntry.driver + ($scope.newEntry.meetingHours*15.) +
            $scope.newEntry.watchShow + ($scope.newEntry.rehersalHours*20.) + $scope.newEntry.suitcase
            + ($scope.newEntry.hospitalCompliance*15.) + $scope.newEntry.workShop)


          };
      
      var userTimesheetEntries =  new $.jqx.dataAdapter(timeSheetAdapter($scope.allUserTimeSheetEntries));
      
      //User Grid Settings
      $scope.usertimeSheetGridSettings = {
        source: userTimesheetEntries,
        altrows: true,       
        width:  '100%',
        height: '100%', 
        theme: 'energyblue',
        ready: function () {

        },
        selectionmode: 'multiplecellsadvanced',
        sortable: true,
        pagesizeoptions: ['20','30','40'],
        pageable:true,
        filterable:true,
        showfilterrow: true,
        enabletooltips: true,
        showaggregates: true,
        pagesize: '20',
        
      columns: [
      { text: 'First Name',columngroup: 'Users', datafield: 'firstName', width: 100, align: 'center',cellsalign: 'center' ,editable:false},
      { text: 'Last Name', columngroup: 'Users', datafield: 'lastName', width: 100, align: 'center',  cellsalign: 'center'
      },
      { text: 'Date', datafield: 'date', filtertype: 'date' , width: 150,align: 'center',  cellsalign: 'center', cellsformat: 'MM/dd/yyyy'},
      { text: 'Venue', datafield: 'venue', align: 'center', cellsalign: 'center', width: 150 },
      { text: 'Workshop Rate', datafield: 'workShop', align: 'center', cellsalign: 'center',cellsformat: 'c2',width: 70  },
      { text: 'Travel', datafield: 'travel', cellsalign: 'right', align: 'center',cellsformat: 'c2', cellsalign: 'center',width: 70  },
      { text: 'Driver', datafield: 'driver', align: 'center', cellsalign: 'center',cellsformat: 'c2',width: 70  },
      { text: 'Suitcase', datafield: 'suitcase', cellsalign: 'right', align: 'center', cellsformat: 'c2',cellsalign: 'center',width: 70 },

      { text: 'Watch </br>A Show', datafield: 'watchShow', align: 'center', cellsalign: 'center', width: 70 },
      { text: 'Rehersal #</br>of Hours', datafield: 'rehersalHours', align: 'center', cellsalign: 'center', width: 100 },
      { text: 'Hospital</br> Compliance # of Hours', datafield: 'hospitalCompliance', align: 'center', cellsalign: 'center',width: 125  },
      { text: 'Meeting #</br> of Hours', datafield: 'meetingHours', align: 'center', cellsalign: 'center',width: 100  },
      { text: 'Total', datafield: 'total', align: 'center', cellsalign: 'center', width: 70 ,cellsformat: 'c2'},
      { text: 'Comments', datafield: 'comments', align: 'center', cellsalign: 'center', width: 150 },
      { text: 'Submited Date', datafield: 'submitDate', align: 'center', cellsalign: 'center',width: 150  }

     
              ],
              columngroups: [
              { text: 'Users', align: 'center', name: 'Users' },
              { text: 'Venue Information', align: 'center', name: 'Venue' }
              ],

              rowselect: function (event) {
                $scope.selectedTimeSheetEntry = event.args.row;
                $scope.timeSheetWindowSettings.apply('open');
              }   
            };
         

            $scope.userFormShowFlag = true;
            $scope.timeSheetShowFlag = false;
            $scope.timeSheetManagement =  null;
            })
}
     else 
   {
    var userParam = PayPageService.getAllUsers();
    var timeSheetParam = PayPageService.getAllTimeSheetEntries();
   
    $q.all([userParam,timeSheetParam])
    .then(function(response){
    $scope.allUsers = response[0];
    $scope.allTimeSheetEntries = response[1];
    
    
         
    // prepare the data
    var source =
    {
      datatype: "json",
      datafields: [


            { name: 'First Name', type: 'string'},
            { name: 'Last Name', type: 'string'},
            { name: 'Venue', type: 'string'},            
            { name: 'WorkShop', type: 'float'},
            { name: 'Travel', type: 'float'},
            { name: 'Driver', type: 'float'},
            { name: 'Suitcase', type: 'float'} ,
            { name: 'Watch Show', type: 'float' },
            { name: 'Rehersal Hours', type: 'float' },
            { name: 'Meeting Hours', type: 'float' },
            { name: 'Hospital Compliance', type: 'float' },
            { name: 'Total', type: 'float' },
            { name: 'Comments', type: 'string' },
            { name: 'Submitted Date', type: 'string' }
            
            ],
            

          };

      var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
        if (value < 20) {
          return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + '; color: #ff0000;">' + value + '</span>';
        }
        else {
          return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + '; color: #008000;">' + value + '</span>';
        }

      }

      var dataAdapter = new $.jqx.dataAdapter(source, {
        downloadComplete: function (data, status, xhr) { },
        loadComplete: function (data) { },
   // loadError: function (xhr, status, error) { }
        });

      var timesheetEntries =  new $.jqx.dataAdapter(timeSheetAdapter($scope.allTimeSheetEntries));
       
      //Timesheet Grid Settings
      $scope.timeSheetGridSettings = {
        source: timesheetEntries,
        altrows: true,       
        width:  '100%',
        height: '100%', 
        theme: 'energyblue',
        ready: function () {

        },
        selectionmode: 'multiplecellsadvanced',
        //source: $scope.timeSheet,
       // editable: true,
        sortable: true,
        pagesizeoptions: ['20','30','40'],
        pageable:true,
        filterable:true,
        showfilterrow: true,
        enabletooltips: true,
        showaggregates: true,
        //showtoolbar:true,
        pagesize: '20',
        addrow: function (rowid, rowdata, position, commit) {
            // synchronize with the server - send insert command
            // call commit with parameter true if the synchronization with the server is successful 
            //and with parameter false if the synchronization failed.
            // you can pass additional argument to the commit callback which represents the new ID if it is generated from a DB.
            commit(true);
          },
         
      columns: [
      { text: 'First Name',columngroup: 'Users', datafield: 'firstName', width: 100, align: 'center',cellsalign: 'center' ,editable:false},
      { text: 'Last Name', columngroup: 'Users', datafield: 'lastName', width: 100, align: 'center',  cellsalign: 'center'
      },
      { text: 'Date', datafield: 'date', filtertype: 'range',width: 150, align: 'center',  cellsalign: 'center', cellsformat: 'MM/dd/yyyy' },
      { text: 'Venue', datafield: 'venue', align: 'center', cellsalign: 'center', width: 150 },
      { text: 'Workshop Rate', datafield: 'workShop', align: 'center', cellsalign: 'center',cellsformat: 'c2',width: 70  },
      { text: 'Travel', datafield: 'travel', cellsalign: 'right', align: 'center',cellsformat: 'c2', cellsalign: 'center',width: 70  },
      { text: 'Driver', datafield: 'driver', align: 'center', cellsalign: 'center',cellsformat: 'c2',width: 70  },
      { text: 'Suitcase', datafield: 'suitcase', cellsalign: 'right', align: 'center', cellsformat: 'c2',cellsalign: 'center',width: 70 },

      { text: 'Watch </br>A Show', datafield: 'watchShow', align: 'center', cellsalign: 'center', width: 70 },
      { text: 'Rehersal #</br>of Hours', datafield: 'rehersalHours', align: 'center', cellsalign: 'center', width: 100 },
      { text: 'Hospital</br> Compliance # of Hours', datafield: 'hospitalCompliance', align: 'center', cellsalign: 'center',width: 125  },
      { text: 'Meeting #</br> of Hours', datafield: 'meetingHours', align: 'center', cellsalign: 'center',width: 100  },
      { text: 'Total', datafield: 'total', align: 'center', cellsalign: 'center', width: 70 ,cellsformat: 'c2'},
      { text: 'Comments', datafield: 'comments', align: 'center', cellsalign: 'center', width: 150 },
      { text: 'Submited Date', datafield: 'submitDate', align: 'center', cellsalign: 'center',width: 150  },

     
              ],
              columngroups: [
              { text: 'Users', align: 'center', name: 'Users' },
              { text: 'Venue Information', align: 'center', name: 'Venue' }
              ],

              rowselect: function (event) {
                $scope.selectedTimeSheetEntry = event.args.row;
                $scope.timeSheetWindowSettings.apply('open');
              }   
            };
    
    
    // ADMIN date info  
    $scope.dateInputSettings =
    {
      width: 200,
      height: 30,
      formatString: 'd',
      animationType: 'fade',
      selectionMode: 'range',
      
      
    }
    
  
       
       var test =  new $.jqx.dataAdapter(userAdapter($scope.allUsers));
       
     

       
       
    $scope.userGridSettings= {
        source: test,
        theme: 'energyblue',
        width:  '100%',
        sortable: true,
        pageable:true,
        filterable:true,
        showfilterrow: true,
        enabletooltips: true,
        pagesize: '20',
          columns: [
          { text: 'E-mail', datafield: 'email', width: 250, align: 'center',cellsalign: 'center' },
          { text: 'First Name',columngroup: 'Name', datafield:'first_name', width: 200, align: 'center',  cellsalign: 'center'},
          { text: 'Last Name', columngroup: 'Name', datafield: 'last_name', width: 250, align: 'center',cellsalign: 'center' },
          { text: 'Role', datafield: 'role_name', width: 200, align: 'center',  cellsalign: 'center'},
          { text: 'Cell Number', columngroup: 'Number',datafield: 'cell_number', width: 250, align: 'center',cellsalign: 'center' },
          { text: 'House number', datafield: 'home_number', width: 200, align: 'center',  cellsalign: 'center'},
          ]
};
    $scope.addTimesheetEntrySettings = {

       theme: 'energyblue',
        click: function(event){
           /* if($scope.EMUser !== "" && $scope.sessionUserRole === "Administrator"){
                EventMaintenanceService.userToEventService('addUser', Number($scope.EMUser.value.split(',')[0]), $scope.selectedEvent, $scope.selectedShowRole)
                .then(function(addUserArray) {
                    $scope.EMDataAdapterUsers = new $.jqx.dataAdapter(searchInputAdapter(addUserArray[0]));
                    $scope.currentUsersResults = addUserArray[1];
                    $scope.EMUser = "";
                });
            }*/
        }
    }

$scope.createuserList = true;
})
, function(error) {
        console.log('opsssss' + error);
    };
    //Buttons to export grids with paypage data
    $scope.exportButtonSettings = {
    theme: 'energyblue',
    click: function(event){
    $("#jqxgrid").jqxGrid('exportdata', 'xls', 'jqxgrid');
                          }
    };
       
    $scope.exportUserButtonSettings = {
    theme: 'energyblue',
    click: function(event){
    $("#userGrid").jqxGrid('exportdata', 'xls', 'jqxgrid');
                          }
    };
}


    

  /*PayPageService.getAllTimeSheetEntries().then(function(timeSheet){

        $scope.timeSheet = timeSheet;

    }); 
                     */
$scope.timeSheetManagement = function (service) {

  PayPageService.timeSheetManagement(service, $scope.selectedTimeSheetEntry.id).then(function(timeSheet) {
    $scope.timeSheet = timeSheet;
            //$scope.timeSheetWindowSettings.apply('close');
          });
}
    

}]);
 // prepare the data
       function userAdapter(source){
               return {                  
                    datatype: "array",
                    datafields: [

                        {name: 'email', type: 'string'},
                        {name: 'first_name', type: 'string'},
                        {name: 'last_name', type: 'string'},
                        {name: 'role_name', type: 'string'},
                        {name: 'cell_number', type: 'string'},
                        {name: 'home_number', type: 'string'}
                                          ],

                    localdata: source
        
                   
                };
    
    }

     // prepare TimeSheet data
       function timeSheetAdapter(source){
               return {                  
                    datatype: "array",
                    datafields: [

                        {name: 'firstName', type: 'string'},
                        {name: 'lastName', type: 'string'},
                        {name: 'date', type: 'date'},
                        {name: 'venue', type: 'int'},                       
                        {name: 'workShop', type: 'int'},
                        {name: 'travel', type: 'int'},
                        {name: 'driver', type: 'int'},
                        {name: 'suitcase', type: 'int'},
                        {name: 'watchShow', type: 'int'},
                        {name: 'rehersalHours', type: 'int'},
                        {name: 'meetingHours', type: 'int'},
                        {name: 'hospitalCompliance', type: 'int'},
                        {name: 'total', type: 'int'},
                        {name: 'comments', type: 'string'},
                        {name: 'submitDate', type: 'date'}

                                          ],

                    localdata: source
        
                   
                };
    
    }

