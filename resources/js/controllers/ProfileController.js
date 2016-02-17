// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute', 'jqwidgets']);

appModule.controller("ProfileController", function(
			$rootScope, $scope, $routeParams, UserService, ScriptService) {

	$scope.userId=$routeParams.id;
	$scope.user = {};
	$scope.scripts = [];

	UserService.getUser($scope.userId).then(function(user) {
        $scope.user = user;
    });

	ScriptService.getScriptsForUser($scope.userId).then(function(scripts) {
		$scope.scripts = scripts;
	});

});