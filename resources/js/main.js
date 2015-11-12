// Main Controller

var appModule = angular.module("ScheduleApp", ['ngRoute']);

appModule.config(function($routeProvider) {

	$routeProvider
	    .when('/', {
	      controller:'MainController',
	      templateUrl:'resources/views/dashboard.html'
	    })
	    .otherwise({
	      redirectTo:'/'
	    });

});

appModule.controller("RootController", function($scope) {
	$scope.user = "User";
});

appModule.controller("MainController", function($scope) {
	$scope.testing = "Test";
});

