// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('EventMaintenanceService', function($http, $q) {

    var route = "/onlymakebelieve/api/eventmaintenance.php";
    var getUsersForEvent;
    var getScriptsForEvent;

    var getUsersForEvent = function(eventId){
        var deferred = $q.defer();   
        if(getUsersForEvent !== undefined){
            deferred.resolve(getUsersForEvent);
        } else {
            $http.get(route + "?func=getUsersForEvent&event=" + eventId).success(function (data){
                getUsersForEvent = data;
                deferred.resolve(getUsersForEvent);
            }).finally(function() {
                getUsersForEvent = undefined;
            });
        }
        return deferred.promise;
    };

    var getScriptsForEvent = function(eventId){
        var deferred = $q.defer(); 
        if(getScriptsForEvent !== undefined){
            deferred.resolve(getScriptsForEvent);
        } else {
            $http.get(route + "?func=getScriptsForEvent&event=" + eventId).success(function (data){
                getScriptsForEvent = data;
                deferred.resolve(getScriptsForEvent);
            }).finally(function() {
                getScriptsForEvent = undefined;
            });
        }
        return deferred.promise;
    };

    return {
        getUsersForEvent: getUsersForEvent,
        getScriptsForEvent: getScriptsForEvent
    };  
    
});

