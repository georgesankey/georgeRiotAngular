// Define App
var appModule = window.appModule || 
    angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on venues
 */
appModule.factory('ContactService', function($http, $q) {

    var route = "/onlymakebelieve/api/contact.php";
    var contacts = null;

    // Gets all contacts for search. Will need to scale when contacts too many
    var getAllContacts = function(){
        var deferred = $q.defer();  
        if(contacts !== null) {
            deferred.resolve(contacts);
        } 
        $http.get(route+"?all").success(function (data) {
            contacts = data;
            deferred.resolve(contacts);
        });
        return deferred.promise;
    };

    return {
        getAllContacts: getAllContacts
    };  
    
});

