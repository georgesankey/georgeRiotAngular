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

 var accountRequestManagement = function(service, rowId) {
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

    return {
        getAllAccountRequests: getAllAccountRequests,
        accountRequestManagement: accountRequestManagement
    };
});
