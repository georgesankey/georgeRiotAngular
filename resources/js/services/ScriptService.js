// Define App
var appModule = window.appModule || 
    angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('ScriptService', function($http, $q) {

    var scripts;

    var getScript = function(id){
        var deferred = $q.defer();   
        $http.get("/onlymakebelieve/api/scripts.php?id="+id).success(function (data){
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var getScriptsForUser = function(userId){
        var deferred = $q.defer();   
        $http.get("/onlymakebelieve/api/scripts.php?user="+userId).success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    return {
        getScriptsForUser: getScriptsForUser,
        getScript: getScript
    };  
        
        //,
        //getSearchedUserData: function($searchedUser){
        //  var url = "/onlymakebelieve/api/userdata.php?user=" . $searchedUser;
        //  return $http.get(url);
        //}
});

