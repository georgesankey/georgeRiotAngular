// Define App
var appModule = window.appModule ||
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get a user's events for scheduler
 */
appModule.factory('SchedulerService', function($http, $q) {

    var route = "api/scheduler.php";
    var allEvents;

    var getAllEventsForScheduler =  function(){
        var deferred = $q.defer();

        $http.get(route + "?func=getAllEventsForScheduler").success(function (events) {
            allEvents = events;
            deferred.resolve(allEvents);
        });
        
        return deferred.promise;
    };

    var showMaintenance = function(service, data) {
        var deferred = $q.defer();

        var serviceParam = (service == 'add'? 'add': (service == 'change'? 'change': 'delete'));
        var params = {
            'data': data,
            'service' : serviceParam
        };

        $http({
            method: 'POST',
            url: route + "?func=showMaintenance",
            data: params
        }).success(function (data, status) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };


    return {
        getAllEventsForScheduler: getAllEventsForScheduler,
        showMaintenance: showMaintenance
    };

});
