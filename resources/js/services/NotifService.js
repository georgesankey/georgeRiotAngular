// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get a user's notifications
 */
appModule.factory('NotifService', function($http, $q) {

 var getAllAccountRequests = function(){
        var deferred = $q.defer();
        var accountRequests;    
        $http.get("/onlymakebelieve/api/accountrequests.php").success(function (data){
                accountRequests = data;
                deferred.resolve(accountRequests);
            });
            return deferred.promise;
    };

 var acceptAccountRequest = function(rowId) {
        var deferred = $q.defer();
        var accountRequests;
        var params = {
            'user': rowId,
            'service' : 'accept'
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

 var rejectAccountRequest = function(rowId) {
        var deferred = $q.defer();
        var accountRequests;
        var params = {
            'user': rowId,
            'service': 'reject'
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

    return {
        getAllAccountRequests: getAllAccountRequests,
        acceptAccountRequest: acceptAccountRequest,
        rejectAccountRequest: rejectAccountRequest
    };
});
