// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/** 
 * Renders account requests
 */
appModule.controller('AccountRequestController', function($scope, NotifService) {
	NotifService.getAllAccountRequests().success(function(requests){
		$scope.requests = requests;
	});
});