// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Controller for entire page
 * Can access areas from Smarty
 */
appModule.controller("RootController", function($rootScope, $scope, $location, $route, UserService) {
	$scope.user = "User";
	// Fix this
	UserService.getUserData().success(function(user){
        $scope.user = user;
    });
    
    // Track the current page for nav
    $scope.page = "";
    $scope.isPage = function(testPage) {return $scope.page == testPage;}
    $scope.$on('$locationChangeStart', function(evt) {
        var path = $location.path().split("/");
        if(path.length == 1) {
            $scope.page = "";
        } else {
            $scope.page = path[1];
        }
    });


    $rootScope.events = [];

    $rootScope.notifications = [{
        type: "alert-danger",
        text: "You have dropped a show.",
        link: "#/e/123",
        id: 71
    },
    {
        type: "alert-warning",
        text: "A show is missing actors.",
        link: "#/e/243",
        id: 72
    },
    {
        type: "alert-info",
        text: "A show has been modified by another user.",
        link: "#/e/19",
        id: 73
    }];
});