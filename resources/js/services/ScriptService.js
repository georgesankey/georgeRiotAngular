// Define App
var appModule = window.appModule || 
    angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('ScriptService', function($http, $q) {

    var route = "/onlymakebelieve/api/scripts.php";
    var script;
    var scriptsForUser;

    var getScript = function(id){
        var deferred = $q.defer(); 
        if(script !== undefined){
            deferred.resolve(script);    
        } else {
            $http.get(route + "?id="+id).success(function (data){
                script = data;
                deferred.resolve(script);
            }).finally(function() {
                script = undefined;
            });
        }  
        return deferred.promise;
    };

    var getScriptsForUser = function(userId){
        var deferred = $q.defer();   
        if(scriptsForUser !== undefined){
            deferred.resolve(scriptsForUser);
        } else {
            $http.get(route+"?user="+userId).success(function (data) {
                scriptsForUser = data;
                deferred.resolve(scriptsForUser);
            }).finally(function() {
                scriptsForUser = undefined;
            });
        }
        return deferred.promise;
    };

    return {
        getScriptsForUser: getScriptsForUser,
        getScript: getScript
    };  
    
});

