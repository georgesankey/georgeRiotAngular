// Contains services used by the app

appModule.factory('currentUserService', function($http) {
    return {
        getUserData: function(){

        	var url = "/onlymakebelieve/api/userdata.php";
        	return $http.get(url);
        }
    };
});

appModule.factory('accountRequestService', function($http) {
    return {
        getAllAccountRequests: function(){

        	var url = "/onlymakebelieve/api/accountrequests.php";
        	return $http.get(url);
        }
    };
});
