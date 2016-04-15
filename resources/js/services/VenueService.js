// Define App
var appModule = window.appModule ||
    angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on venues
 */
appModule.factory('VenueService', function($http, $q) {

    var route = "api/venue.php";
    var allVenues;

    var getVenue = function(venueId){
        var deferred = $q.defer();
        $http.get(route+"?func=getVenue&venue="+venueId).success(function (data) {
            deferred.resolve(data);
        });
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
            });
        }
        return deferred.promise;
    };

    var editVenue = function(venue) {
        var deferred = $q.defer();
        $http.post(route+"?func=editVenue", $.param(venue), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            allVenues = undefined;
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    return {
        getVenue: getVenue,
        getAllVenues: getAllVenues,
        editVenue: editVenue
    };

});
