// Define App
var appModule = window.appModule ||
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get a user's timeSheetNotif
 */
appModule.factory('PayPageService', function($http, $q) {
    var timeSheetEntry = {};
    var route = "api/pay.php";

    var getAllTimeSheetEntries = function(){

        var deferred = $q.defer();

        if(timesheetEntry !== undefined){
            deferred.resolve(timeSheetEntry);
        } else {
            $http.get(route).success(function (data){
                timeSheetEntry = data;
                deferred.resolve(timeSheetEntry);
            });
        }
        return deferred.promise;
    };

 var timeSheetManagement = function(service, rowId) {
        var deferred = $q.defer();
        var timeSheetentry;
        var user = encodeURIComponent(rowId);
        var serviceParam = (service == 'accept' ? encodeURIComponent('accept'): encodeURIComponent('reject'));
        var params = {
            'user': user,
            'service' : serviceParam
        };
        $http({
            method: 'POST',
            url: "api/pay.php",
            data: params
        }).success(function (data, status) {
            timeSheet = data;
            deferred.resolve(timeSheetentry);
        });
        return deferred.promise;
   };
   
        return {
        getAllUsers: getAllUsers,
        getAllTimeSheetEntries: getAllTimeSheetEntries,
        timeSheetManagement: timeSheetManagement,

    };
});
