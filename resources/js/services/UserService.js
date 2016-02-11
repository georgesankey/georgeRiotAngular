// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('UserService', function($http, $q) {

    var sessionUser;

    var getSessionUserData = function(){
        var deferred = $q.defer();   
        if(sessionUser !== undefined){
            deferred.resolve(sessionUser);
        } else {
            $http.get("/onlymakebelieve/api/userdata.php").success(function (data){
                sessionUser = data;
                deferred.resolve(sessionUser);
            });
        }
        return deferred.promise;
    };

    var getUser = function(userId){
        var deferred = $q.defer();   
        $http.get("/onlymakebelieve/api/userdata.php?user="+userId).success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    return {
        getSessionUserData: getSessionUserData,
        getUser: getUser
    };  
        
        //,
        //getSearchedUserData: function($searchedUser){
        //	var url = "/onlymakebelieve/api/userdata.php?user=" . $searchedUser;
        //	return $http.get(url);
        //}
});

