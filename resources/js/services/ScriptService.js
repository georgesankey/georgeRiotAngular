// Define App
var appModule = window.appModule || 
    angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('ScriptService', function($http, $q) {

    var route = "/onlymakebelieve/api/scripts.php";

    var getScript = function(id){
        var deferred = $q.defer(); 
        $http.get(route + "?id="+id).success(function (data){
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var getScriptsForUser = function(userId){
        var deferred = $q.defer();   
        $http.get(route+"?user="+userId).success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    // Use promise to chain requests
    var newScript = function(script) {
        var deferred = $q.defer(); 
        $http.post(route, $.param(script), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var editScript = function(script) {
        var deferred = $q.defer(); 
        $http.post(route, $.param(script), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    return {
        getScriptsForUser: getScriptsForUser,
        getScript: getScript,
        newScript: newScript,
        editScript: editScript
    };  
    
});

