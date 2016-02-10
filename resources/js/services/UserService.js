// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('UserService', function($http, $q) {
    return {
    	user: null,
        getUserData: function(){
        	var deferred = $q.defer();
        	var context=this;
        	if(this.user !== null) {
        		deferred.resolve(this.user);
        	} else {
        		var url = "/onlymakebelieve/api/userdata.php";
        		$http.get(url).success(function(data, status) {
        			context.user = data;
        			console.log(context.user);
        			deferred.resolve(context.user);
        		});
        	}
        	return deferred.promise;
        }
    };
});
