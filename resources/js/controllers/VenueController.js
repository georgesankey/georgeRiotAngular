// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute', 'jqwidgets']);

appModule.controller("VenueController", function(
			$rootScope, $scope, $routeParams, VenueService, UserService) {

	$scope.venueId=$routeParams.id;
	$scope.venue = {};

	VenueService.getVenue($scope.venueId).then(function(venue) {
        $scope.venue = venue;
    });

});