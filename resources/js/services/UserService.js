// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('UserService', function($http) {
    return {
        getUserData: function(){

        	var url = "/onlymakebelieve/api/userdata.php";
        	return $http.get(url);
        }
    };
});
