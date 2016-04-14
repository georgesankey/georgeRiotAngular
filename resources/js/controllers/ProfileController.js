// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute', 'jqwidgets']);

appModule.controller("ProfileController", function(
			$rootScope, $scope, $routeParams, UserService, ScriptService) {

	$scope.user = {};
	$scope.scripts = [];
	$scope.newEvents = [];
	$scope.pastEvents = [];

	// Set base requests to user profile
	$scope.userId=$routeParams.id;
	if(!$scope.userId) {
		$scope.userId = $rootScope.user.id;
	}

	UserService.getUser($scope.userId).then(function(user) {
        $scope.user = user;
    });

	ScriptService.getScriptsForUser($scope.userId).then(function(scripts) {
		$scope.scripts = scripts;
	});

});