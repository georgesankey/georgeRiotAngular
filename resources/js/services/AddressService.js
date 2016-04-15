// Define App
var appModule = window.appModule ||
    angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('AddressService', function($http, $q) {

    var route = "api/address.php";

    var getAddress = function(id){
        var deferred = $q.defer();
        $http.get(route + "?id="+id).success(function (data){
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var editAddress = function(address) {
        var deferred = $q.defer();
        var postData = JSON.stringify(address);
        $http.post(route, $.param({data:postData}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    return {
        getAddress: getAddress,
        editAddress: editAddress
    };

});
