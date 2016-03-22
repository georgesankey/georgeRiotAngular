// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get a user's events for scheduler
 */
appModule.factory('SchedulerService', function($http, $q) {

    var route = "/onlymakebelieve/api/scheduler.php";
    var allEvents; 

    var getAllEventsForScheduler =  function(){
        var deferred = $q.defer();
        if(allEvents !== undefined){
            deferred.resolve(allEvents);
        } else {
            $http.get(route + "?func=getAllEventsForScheduler").success(function (events) {
                allEvents = events;
                deferred.resolve(allEvents);
            }).finally(function() {
                allEvents = undefined;
            });
        }
        return deferred.promise;
    };

    return {
        getAllEventsForScheduler: getAllEventsForScheduler
    };

});

