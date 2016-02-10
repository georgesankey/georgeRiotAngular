// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('UserService', function($http, $q) {

    var getSessionUserData = function(){
        var deferred = $q.defer();
        var sessionUser;    
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

    return {
        getSessionUserData: getSessionUserData
    };  
        
        //,
        //getSearchedUserData: function($searchedUser){
        //	var url = "/onlymakebelieve/api/userdata.php?user=" . $searchedUser;
        //	return $http.get(url);
        //}
});

