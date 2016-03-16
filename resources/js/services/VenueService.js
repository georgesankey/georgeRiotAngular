// Define App
var appModule = window.appModule || 
    angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on venues
 */
appModule.factory('VenueService', function($http, $q) {

    var route = "/onlymakebelieve/api/venue.php";

    var getSessionUserData = function(){
        var deferred = $q.defer();   
        if(sessionUser !== undefined){
            deferred.resolve(sessionUser);
        } else {
            $http.get(route).success(function (data){
                sessionUser = data;
                deferred.resolve(sessionUser);
            });
        }
        return deferred.promise;
    };

    var getVenue = function(venueId){
        var deferred = $q.defer();   
        $http.get(route+"?id="+venueId).success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var getAllVenues = function(){
        var deferred = $q.defer();   
        $http.get(route+"?func=getAllVenues").success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };
    
    return {
        getSessionUserData: getSessionUserData,
        getVenue: getVenue,
        getAllVenues: getAllVenues
    };  
    
});

