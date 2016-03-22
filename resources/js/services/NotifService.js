// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get a user's notifications
 */
appModule.factory('NotifService', function($http, $q) {

var accountRequests;
var accountRequestsResponse;

var getAllAccountRequests = function(){
        var deferred = $q.defer();
        if(accountRequests !== undefined){
            deferred.resolve(accountRequests);
        } else {
            $http.get("/onlymakebelieve/api/accountrequests.php").success(function (data){
                accountRequests = data;
                deferred.resolve(accountRequests);
            }).finally(function () {
                accountRequests = undefined;
            });            
        }
        return deferred.promise;
    };

 var accountRequestManagement = function(service, rowId) {
        var deferred = $q.defer();
        var user = encodeURIComponent(rowId);
        var serviceParam = (service == 'accept' ? encodeURIComponent('accept'): encodeURIComponent('reject'));
        var params = {
            'user': user,
            'service' : serviceParam
        };
        if(accountRequestsResponse !== undefined){
            deferred.resolve(accountRequestsResponse);            
        } else {
            $http({
                method: 'POST',
                url: "/onlymakebelieve/api/accountrequests.php",
                data: params
            }).success(function (data, status) {
                accountRequestsResponse = data;
                deferred.resolve(accountRequestsResponse);
            }).finally(function() {
                accountRequestsResponse = undefined;
            });
        }
        return deferred.promise;
   };
   
    return {
        getAllAccountRequests: getAllAccountRequests,
        accountRequestManagement: accountRequestManagement
    };
});
