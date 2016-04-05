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


	// For getting all of the venues
	VenueService.getAllVenues().then(function(venues) {
		$scope.venues = venues;
	});

	// Filter search on venues
	$scope.venueSearch = [];
	$scope.venueQuery = "";
	$scope.filterVenues = function() {
		var query = $scope.venueQuery.toLowerCase();

		if(!$scope.venues || $scope.venues.length < 1 
				|| query.trim() == "") {
			$scope.venueSearch = [];
			return false;
		}

		$scope.venueSearch = $scope.venues.filter(function(e) {
			return e.name ? e.name.toLowerCase().indexOf(query) > -1 : false;
		});
	};

});