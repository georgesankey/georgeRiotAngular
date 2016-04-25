// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ["ngRoute", "ngResource", "jqwidgets", "ngCookies"]);

/** 
 * Renders EM functionality
 */
appModule.controller('EventMaintenanceController', ['$window', '$rootScope', '$scope', '$q', '$route' ,'EventMaintenanceService', function($window, $rootScope, $scope, $q, $route, EventMaintenanceService) {
	

    /*if($rootScope.selectedEvent !== null){
        $scope.selectedEvent = $rootScope.selectedEvent;
        $cookies.put('selectedEvent', $scope.selectedEvent);

    } else {
        $scope.selectedEvent = $cookies.get('selectedEvent');
    }*/

    $scope.selectedEvent = $rootScope.selectedEvent;

    //Session Role 
    $scope.sessionUserRole = $rootScope.user.role_name;

    //Windows
    $scope.currentUserDeleteWindow = {};
    $scope.currentScriptDeleteWindow = {};

    //Grids  
    $scope.currentUsersGrid = {};
    $scope.currentScriptsGrid = {};

    //Window Settings
    $scope.currentUserDeleteWindowSettings = {};
    $scope.currentScriptDeleteWindowSettings = {};

    //booleans
	$scope.gridsConstrFinished = false;
    $scope.deleteUserWindowFlag = false;
    $scope.deleteScriptWindowFlag = false;

    //ng-models
	$scope.EMUser = "";
    $scope.EMScript = "";

    //generic EM button
    $scope.jqxButtonsEMSettings = {
        theme: 'energyblue'
    };

    //different roles for user dropdown
    $scope.showRoles = [{
            id: 4,
            roleName: "Actor",
        }, {
            id: 3,
            roleName: "Staff",
        }, {
            id: 2,
            roleName: "Team Leader",
    }];

    //dropdown list settings for add user to show
    $scope.showRoleDropDownListSettings = {
        width: 200,
        height: 20,
        autoDropDownHeight: false,
        theme: 'energyblue',
        displayMember: "roleName",
        valueMember: "id",
        source: $scope.showRoles
    };

    //the button to add users to a show
    $scope.addUserButtonSettings = {
        theme: 'energyblue',
        click: function(event){
            if($scope.EMUser !== "" && $scope.sessionUserRole === "Administrator"){
                EventMaintenanceService.userToEventService('addUser', Number($scope.EMUser.value.split(',')[0]), $scope.selectedEvent, $scope.selectedShowRole)
                .then(function(addUserArray) {
                    $scope.EMDataAdapterUsers = new $.jqx.dataAdapter(searchInputAdapter(addUserArray[0]));
                    $scope.currentUsersResults = addUserArray[1];
                    $scope.EMUser = "";
                });
            }
        }
    };

    //the button to add scripts to a show 
    $scope.addScriptButtonSettings = {
        theme: 'energyblue',
        click: function(event){
            if($scope.EMScript !== "" && $scope.sessionUserRole === "Administrator"){
                EventMaintenanceService.scriptToEventService('addScript', Number($scope.EMScript.value.split(',')[0]), $scope.selectedEvent)
                .then(function(addScriptArray) {
                    $scope.EMDataAdapterScripts = new $.jqx.dataAdapter(scriptInputAdapter(addScriptArray[0]));
                    $scope.currentScriptsResults = addScriptArray[1];
                    $scope.EMScript = "";
                });
            }
        }
    };

    //by default, select actor
    $scope.selectedShowRoleValue = $scope.showRoles[0];
    $scope.selectedShowRole = 4;


    //major service calls
    var usersForEvent = EventMaintenanceService.getUsersForEvent($scope.selectedEvent);
    var scriptsForEvent = EventMaintenanceService.getScriptsForEvent($scope.selectedEvent);
    var EMUsers = EventMaintenanceService.getEMUsers($scope.selectedEvent);
    var EMScripts = EventMaintenanceService.getEMScripts($scope.selectedEvent);


    $q.all([usersForEvent, scriptsForEvent, EMUsers, EMScripts]).
    then(function(response) {
    	$scope.currentUsersResults = response[0];
    	$scope.currentScriptsResults = response[1];
    	$scope.EMUsers = response[2];
        $scope.EMScripts = response[3];

        //Possible dataset for searches
        $scope.EMDataAdapterUsers = new $.jqx.dataAdapter(searchInputAdapter($scope.EMUsers));
        $scope.EMDataAdapterScripts = new $.jqx.dataAdapter(scriptInputAdapter($scope.EMScripts));

        $("#searchEMUsersInput").on('select', function (event) {
            if (event.args) {
                var item = event.args.item;
                if (item) {
                    //find the searchedUser and store in scope
                    angular.forEach($scope.EMUsers, function(EMUser) {
                    	if(EMUser.id == Number(item.value.split(',')[0])){
                    		$scope.EMUser = EMUser;
                    	}
                    });
                }
            }
        }).on('change', function (event) {
            //if not exactly search result, set back to empty
            $scope.EMUser = "";                           
        });

        $("#searchEMScriptsInput").on('select', function (event) {
            if (event.args) {
                var item = event.args.item;
                if (item) {
                    //find the searched Script and store in scope
                    angular.forEach($scope.EMScripts, function(EMScript) {
                        if(EMScript.id == Number(item.value.split(',')[0])){
                            item.value += EMScript.owners;
                            $scope.EMScript = EMScript;
                        }
                    });
                }
            }
        }).on('change', function (event) {
            //if not exactly search result, set back to empty
            $scope.EMScript = "";                           
        });


        $("#showRoleDropDownList").on('change', function(event) {
            var args = event.args;
            if(args){
                //if show roles dropdown has changed the role value
                var index = args.index;
                $scope.selectedShowRoleValue = $scope.showRoles[index];
                $scope.selectedShowRole = $scope.selectedShowRoleValue.id;
                 $("#showRoleDropDownList").jqxDropDownList('selectedIndex', index);
            }
        });

        //window settings for removing a user from a show
        $scope.currentUserDeleteWindowSettings = {
            height: 150,
            width: 300, 
            theme: 'energyblue',
            isModal: true,
            autoOpen: false,
            draggable: true,
            position: 'middle',
            resizable: false,
            open: function(event){
                //console.log(event);
            },
            close: function(event) {
                $scope.EMUser = ""; 
                $scope.selectedCurrentDeleteUser = "";                    
                $scope.currentUsersGridSettings.apply('unselectrow');
            }
        };

        $scope.deleteUserWindowFlag = true;


        //window settings for removing a script from a show
        $scope.currentScriptDeleteWindowSettings = {
            height: 150,
            width: 300, 
            theme: 'energyblue',
            isModal: true,
            autoOpen: false,
            draggable: true,
            position: 'middle',
            resizable: false,
            open: function(event){
                //console.log(event);
            },
            close: function(event) {
                $scope.EMScript = ""; 
                $scope.selectedCurrentDeleteScript = "";                    
                $scope.currentScriptsGridSettings.apply('unselectrow');
            }
        };

        $scope.deleteScriptWindowFlag = true;

        //the settings for grid of current users in show
	    $scope.currentUsersGridSettings = {
			altrows: true,
			width:  '100%',
			height: 480, 
			theme: 'energyblue',
			ready: function () {

                $('#yesDeleteUserButton').on('click', function(event) {
                    EventMaintenanceService.userToEventService('deleteUser', $scope.selectedCurrentDeleteUser.id, $scope.selectedEvent, null).then(function(deleteUserArray) {
                        //update grid and search data set
                        $scope.EMDataAdapterUsers = new $.jqx.dataAdapter(searchInputAdapter(deleteUserArray[0]));
                        $scope.currentUsersResults = deleteUserArray[1];
                        $scope.EMUser = ""; 
                        $scope.selectedCurrentDeleteUser= "";
                        $('#currentUserDeleteWindow').jqxWindow('close');   
                        $scope.currentUsersGridSettings.apply('unselectrow');  
                    });                        
                });
                $('#noDeleteUserButton').on('click', function(event) {
                    $scope.EMUser = ""; 
                    $scope.selectedCurrentDeleteUser = "";
                    $('#currentUserDeleteWindow').jqxWindow('close');
                    $scope.currentUsersGridSettings.apply('unselectrow'); 
                });
			},
			selectionmode: 'singlerow',
			source: $scope.currentUsersResults,
			columns: [
			{text: 'Email', datafield: 'email', width: '20%'},
			{text: 'First Name', datafield: 'first_name', width: '11%'},
			{text: 'Last Name', datafield: 'last_name', width: '11%'},
			{text: 'Show Role', datafield: 'role_name', width: '11%'},
			{text: 'Cell Number', datafield: 'cell_number', width: '11%'},
			{text: 'Home Number', datafield: 'home_number', width: '11%'},
			{text: 'Work Number', datafield: 'work_number', width: '11%'},
			{text: 'Status', datafield: 'status', width: '14%'}
			],
			rowselect: function (event) {
                if($scope.sessionUserRole === "Administrator"){                  
                    $scope.selectedCurrentDeleteUser = event.args.row;
                    $scope.currentUserDeleteWindowSettings.apply('open');
                }
		    }	
	    };

        //the settings for grid of current scripts in show
        $scope.currentScriptsGridSettings = {
            altrows: true,
            width:  '100%',
            height: 480, 
            theme: 'energyblue',
            ready: function () {

                $('#yesDeleteScriptButton').on('click', function(event) {
                    EventMaintenanceService.scriptToEventService('deleteScript', 
                        $scope.selectedCurrentDeleteScript.id, $scope.selectedEvent).then(function(deleteScriptArray) {
                        //update grid and search data set
                        $scope.EMDataAdapterScripts = new $.jqx.dataAdapter(scriptInputAdapter(deleteScriptArray[0]));
                        $scope.currentScriptsResults = deleteScriptArray[1];
                        $scope.EMScript = ""; 
                        $scope.selectedCurrentDeleteScript = "";
                        $('#currentScriptDeleteWindow').jqxWindow('close');   
                        $scope.currentScriptsGridSettings.apply('unselectrow');  
                    });                        
                });
                $('#noDeleteScriptButton').on('click', function(event) {
                    $scope.EMScript = ""; 
                    $scope.selectedCurrentDeleteScript = "";
                    $('#currentScriptDeleteWindow').jqxWindow('close');
                    $scope.currentScriptsGridSettings.apply('unselectrow'); 
                });

            },
            selectionmode: 'singlerow',
            source: $scope.currentScriptsResults,
            columns: [
            {text: 'Id', datafield: 'id', width: '2%'},
            {text: 'Name', datafield: 'name', width: '15%'},
            {text: 'Synopsis', datafield: 'synopsis', width: '25%'},
            {text: 'Creator', datafield: 'creator_info', width: '18%'},
            {text: 'Owners', datafield: 'owners', width: '40%'},                
            ],
            rowselect: function (event) {
                if($scope.sessionUserRole === "Administrator"){                  
                    $scope.selectedCurrentDeleteScript = event.args.row;
                    $scope.currentScriptDeleteWindowSettings.apply('open');
                }
            }   
        };

	    $scope.gridsConstrFinished = true;
    }); //end of then

//end of EventMaintenanceController    
}]);

//for the search input dataset
function searchInputAdapter(sourceEMUsers){
    return {
            datatype: "array",
            datafields: [
                { name: 'id' },
                { name: 'email' },
                { name: 'first_name' },
                { name: 'last_name' },
                { name: 'cell_number' },
                { name: 'work_number' },
                { name: 'home_number' },
                { name: 'value_member'},
                { name: 'display_member'}
            ],
            localData: sourceEMUsers
    };
}

//for the script input dataset
function scriptInputAdapter(sourceEMScripts){
    return {
            datatype: "array",
            datafields: [
                { name: 'id' },
                { name: 'name' },
                { name: 'synopsis' },
                { name: 'creator_info' },
                { name: 'owners' },
                { name: 'script_display_member' },
                { name: 'script_value_member' }                
            ],
            localData: sourceEMScripts
    };
}
