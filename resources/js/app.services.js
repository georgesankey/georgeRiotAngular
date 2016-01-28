// Contains services used by the app

appModule.factory('currentUserService', function($http) {
    return {
        getUserData: function(){

        	var url = "/onlymakebelieve/api/userdata.php";
        	return $http.get(url);
        }
    };
});

