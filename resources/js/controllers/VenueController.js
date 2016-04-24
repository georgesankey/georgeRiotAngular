// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute', 'jqwidgets']);

appModule.controller("VenueController", function(
			$rootScope, $scope, $location, $routeParams, 
				AddressService, VenueService, ContactService) {

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

	/////////////////////////////////////////////////////////////////////
	// For creating a venue
	$scope.newVenue = {
		name: "",
		comments: "",
		contact: 0,
		address: 0
	};

	$scope.newAddress = {
		street_1:"",
		zipcode:"",
		state:"NY",
		city:"",
		owner_type:2
	};

	$scope.newContact = {
		first_name:"",
		last_name:"",
		cell_number:"",
		work_number:"",
		home_number:"",
		details:""
	};

	// Log details first
	$scope.submitVenue = function() {
		$scope.newVenue.contact = Number($scope.newVenue.contact);

		AddressService.editAddress($scope.newAddress).then(function(data) {
			if(data.id) {
				$scope.newVenue.address = Number(data.id);
				VenueService.editVenue($scope.newVenue).then(function(data) {
					alertLog("Venue Created");
					console.log(data);
				});
			}
		});

	};

	// Contact list
	$scope.contactSearch = "";
	$scope.AllContacts = [];
	$scope.contacts = [];
	$scope.filterContacts = function() {
		var needle = $scope.contactSearch.toLowerCase();
		$scope.contacts = $scope.AllContacts.filter(function(e) {
			if(e.first_name.toLowerCase().indexOf(needle) > -1) {
				return true;
			}
			if(e.last_name.toLowerCase().indexOf(needle) > -1) {
				return true;
			}
			if(e.details.toLowerCase().indexOf(needle) > -1) {
				return true;
			}
			return false;
		});
		if($scope.contacts.length > 5) {
			$scope.contacts = $scope.contacts.slice(0,5);
		}
	};
	ContactService.getAllContacts().then(function(contacts) {
		$scope.AllContacts = contacts;
	});
	$scope.setContact = function(ct) {
		$scope.newVenue.contact = ct.id;
		$scope.contactSearch = ct.last_name+", "+ct.first_name+" || "+ct.cell_number;
		$scope.contacts = [];
	};

});