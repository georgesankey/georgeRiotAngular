// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get a user's events for scheduler
 */
appModule.factory('SchedulerService', function($http, $q) {

    var route = "/onlymakebelieve/api/scheduler.php";

     var getAllEventsForScheduler = function(){
            var deferred = $q.defer();
            $http.get(route + "?func=getAllEventsForScheduler").success(function (events){
                    deferred.resolve(events);
            });


  //  var appointments = new Array();
    /*    var appointment1 = {
            id: "1",
            showName: "Aladdin",            
            showComments: "These are comments for the show Aladdin.",
            calendar: "Scheduled",
            start: new Date(2015, 10, 24, 9, 0, 0),
            end: new Date(2015, 10, 24, 16, 0, 0),
            adminCreator: "1",
            venue: "1"
        };
        var appointment2 = {
            id: "2",
            showName: "Wicked",            
            showComments: "These are comments for the show Wicked.",
            calendar: "Deferred",
            start: new Date(2015, 10, 25, 9, 0, 0),
            end: new Date(2015, 10, 25, 16, 0, 0),
            adminCreator: "2",
            venue: "2"
        };
        var appointment3 = {
            id: "3",
            showName: "Lion King",            
            showComments: "These are comments for the show Lion King.",
            calendar: "Cancelled",
            start: new Date(2015, 10, 26, 9, 0, 0),
            end: new Date(2015, 10, 26, 16, 0, 0),
            adminCreator: "1",
            venue: "1"
        };
      
        appointments.push(appointment1);
        appointments.push(appointment2);
        appointments.push(appointment3);

        
        //deferred.resolve(appointments);
        //return deferred.promise;
        return appointments;
        */
        return deferred.promise;
    };

 /*var accountRequestManagement = function(service, rowId) {
        var deferred = $q.defer();
        var accountRequests;
        var user = encodeURIComponent(rowId);
        var serviceParam = (service == 'accept' ? encodeURIComponent('accept'): encodeURIComponent('reject'));
        var params = {
            'user': user,
            'service' : serviceParam
        };
        $http({
            method: 'POST',
            url: "/onlymakebelieve/api/accountrequests.php",
            data: params
        }).success(function (data, status) {
            accountRequests = data;
            deferred.resolve(accountRequests);
        });
        return deferred.promise;
   };
*/
    return {
        getAllEventsForScheduler: getAllEventsForScheduler
    };
});
