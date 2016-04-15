// Define App
var appModule = window.appModule ||
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get a user's notifications
 */
appModule.factory('NotifService', function($http, $q) {

    var accountRequests;

    // @cached
    var getAllAccountRequests = function(){
        var deferred = $q.defer();
        if(accountRequests !== undefined){
            deferred.resolve(accountRequests);
        } else {
            $http.get("api/accountrequests.php").success(function (data){
                accountRequests = data;
                deferred.resolve(accountRequests);
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
        $http({
            method: 'POST',
            url: "api/accountrequests.php",
            data: params
        }).success(function (data, status) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    return {
        getAllAccountRequests: getAllAccountRequests,
        accountRequestManagement: accountRequestManagement
    };
});
