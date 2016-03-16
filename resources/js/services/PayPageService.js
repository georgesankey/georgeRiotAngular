// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get a user's timeSheetNotif
 */
appModule.factory('PayPageService', function($http, $q) {

 var getAllTimeSheetEntries = function(){
        var deferred = $q.defer();
        var timeSheetentry;    
        $http.get("/onlymakebelieve/api/pay.php").success(function (data){
                accountRequests = data;
                deferred.resolve(timeSheetentry);
            });
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
            url: "/onlymakebelieve/api/pay.php",
            data: params
        }).success(function (data, status) {
            accountRequests = data;
            deferred.resolve(timeSheetentry);
        });
        return deferred.promise;
   };

    return {
        getAllTimeSheetEntries: getAllTimeSheetEntries,
        timeSheetManagement: timeSheetManagement
    };
});
