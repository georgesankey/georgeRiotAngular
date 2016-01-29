// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get a user's notifications
 */
appModule.factory('NotifService', function($http) {
    return {
        getAllAccountRequests: function(){

        	var url = "/onlymakebelieve/api/accountrequests.php";
        	return $http.get(url);
        }
    };
});
