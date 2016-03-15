// Define App
var appModule = window.appModule || 
    angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on contacts
 */
appModule.factory('ContactService', function($http, $q) {

    var route = "/onlymakebelieve/api/contacts.php";
    var contacts = null;

    // Gets all contacts for search. Will need to scale when contacts too many
    var getAllContacts = function(){
        var deferred = $q.defer();  
        if(contacts !== null) {
            deferred.resolve(contacts);
        } 
        $http.get(route).success(function (data) {
            contacts = data;
            deferred.resolve(contacts);
        });
        return deferred.promise;
    };

    var createContact = function(contact) {
        var deferred = $q.defer();
        $http.post(route, contact).success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    return {
        getAllContacts: getAllContacts
    };  
    
});

