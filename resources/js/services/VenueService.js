// Define App
var appModule = window.appModule || 
    angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on venues
 */
appModule.factory('VenueService', function($http, $q) {

    var route = "/onlymakebelieve/api/venue.php";
    var allVenues;
    var venue;

    var getVenue = function(venueId){
        var deferred = $q.defer();
        if(venue !== undefined){
            deferred.resolve(venue);
        } else {
            $http.get(route+"?func=getVenue&venue="+venueId).success(function (data) {
                venue = data;
                deferred.resolve(venue);         
            }).finally(function() {
                venue = undefined;
            });
        }
        return deferred.promise;
    };

    var getAllVenues = function(){
        var deferred = $q.defer();   
        if(allVenues !== undefined){
            deferred.resolve(allVenues);                  
        } else {
            $http.get(route+"?func=getAllVenues").success(function (data) {
                allVenues = data;
                deferred.resolve(allVenues);         
            }).finally(function () {
                allVenues = undefined;
            });
        }
        return deferred.promise;
    };
    
    return {
        getVenue: getVenue,
        getAllVenues: getAllVenues
    };  
    
});

