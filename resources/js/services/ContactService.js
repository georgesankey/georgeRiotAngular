// Define App
var appModule = window.appModule ||
    angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on contacts
 */
appModule.factory('ContactService', function($http, $q) {

    var route = "api/contacts.php";
    var contacts;

    // Gets all contacts for search. Will need to scale when contacts too many
    // @cached
    var getAllContacts = function(){
        var deferred = $q.defer();
        if(contacts !== undefined) {
            deferred.resolve(contacts);
        } else {
            $http.get(route).success(function (data) {
                contacts = data;
                deferred.resolve(contacts);
            });
        }
        return deferred.promise;
    };

    var newContact = function(contact) {
        var deferred = $q.defer();
        $http.post(route, contact).success(function (data) {
            contacts = undefined; // Clear old list
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var editContact = function(contact) {
        var deferred = $q.defer();
        $http.post(route, $.param(contact), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            contacts = undefined; // Clear old list
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    return {
        getAllContacts: getAllContacts,
        newContact: newContact,
        editContact: editContact
    };

});
