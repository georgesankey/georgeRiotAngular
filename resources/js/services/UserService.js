// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('UserService', function($http, $q) {

    var route = "/onlymakebelieve/api/userdata.php";
    var sessionUser;
    var user;

    var getSessionUserData = function(){
        var deferred = $q.defer();   
        if(sessionUser !== undefined){
            deferred.resolve(sessionUser);
        } else {
            $http.get(route).success(function (data){
                sessionUser = data;
                deferred.resolve(sessionUser);
            }).finally(function() {
                sessionUser = undefined;   
            });
        }
        return deferred.promise;
    };

    var getUser = function(userId){
        var deferred = $q.defer();   
        if(user !== undefined){
            deferred.resolve(user);
        } else {
            $http.get(route + "?user=" + userId)
            .success(function (data){
                user = data;
                deferred.resolve(user);
            }).finally(function() {
                user = undefined;
            });
        }
        return deferred.promise;
    };
            //return $http.get(route + "?user=" + userId);

    return {
        getSessionUserData: getSessionUserData,
        getUser: getUser
    };  
    
});

