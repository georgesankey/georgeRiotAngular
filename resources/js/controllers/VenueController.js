// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute', 'jqwidgets']);

appModule.controller("VenueController", function(
			$rootScope, $scope, $location, $routeParams, VenueService, UserService) {

	// For rendering a venue
	$scope.venueId=$routeParams.id;
	$scope.venue = {};

	if($scope.venueId) {
		VenueService.getVenue($scope.venueId).then(function(venue) {
			if(!venue || !venue.name) {
				$location.path("/404");
			}

	        $scope.venue = venue;
	    });
	}

	// For creating a venue
	$scope.newVenue = {
		name: "",
		comments: "",
		contacts: [],
		address: {}
	};


	//for getting all of the venues

	$scope.venues = [];
	VenueService.getAllVenues().then(function(venues) {
		$scope.venues = venues;
	});



});