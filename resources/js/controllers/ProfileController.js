// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute', 'jqwidgets']);

appModule.controller("ProfileController", function($rootScope, $scope, $routeParams, UserService) {

	$scope.userId=$routeParams.id;
	$scope.user = {};

	UserService.getUser($scope.userId).then(function(user) {
        $scope.user = user;
    });

});