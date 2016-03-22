// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('EventMaintenanceService', function($http, $q) {

    var route = "/onlymakebelieve/api/eventmaintenance.php";

    var getUsersForEvent = function(eventId){
        var deferred = $q.defer();   
        $http.get(route + "?func=getUsersForEvent&event=" + eventId).success(function (data){
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var getScriptsForEvent = function(eventId){
        var deferred = $q.defer(); 
        $http.get(route + "?func=getScriptsForEvent&event=" + eventId).success(function (data){
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    return {
        getUsersForEvent: getUsersForEvent,
        getScriptsForEvent: getScriptsForEvent
    };  
    
});

