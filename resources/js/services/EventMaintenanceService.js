// Define App
var appModule = window.appModule ||
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get information on self or other users
 */
appModule.factory('EventMaintenanceService', function($http, $q) {

    var route = "api/eventmaintenance.php";

    var getUsersForEvent = function(eventId){
        var deferred = $q.defer();
        $http.get(route + "?func=getUsersForEvent&event=" + eventId).success(function (data){
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var getScriptsForEvent = function(eventId){
        var deferred = $q.defer();
        $http.get(route + "?func=getScriptsForEvent&event=" + eventId).success(function (data){
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var getEMUsers = function(eventId){
        var deferred = $q.defer();
        $http.get(route + "?func=getEMUsers&event=" + eventId).success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var userToEventService = function(service, userId, eventId, roleId){

        var deferred = $q.defer();

        var service = encodeURIComponent(service);
        var userId = encodeURIComponent(userId);
        var eventId = encodeURIComponent(eventId);
        var roleId = encodeURIComponent(roleId);

        var params = {
            'service': service,
            'user': userId,
            'event' : eventId,
            'role': roleId
        };

        $http({
            method: 'POST',
            url: route,
            data: params
        }).success(function (data, status) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var getEMScripts = function(eventId){
        var deferred = $q.defer();
        $http.get(route + "?func=getEMScripts&event=" + eventId).success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var getScriptOwners = function(scriptId){
        var deferred = $q.defer();
        $http.get(route + "?func=getScriptOwners&script=" + scriptId).success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var scriptToEventService = function(service, scriptId, eventId){

        var deferred = $q.defer();

        var service = encodeURIComponent(service);
        var scriptId = encodeURIComponent(scriptId);
        var eventId = encodeURIComponent(eventId);

        var params = {
            'service': service,
            'script': scriptId,
            'event' : eventId
        };

        $http({
            method: 'POST',
            url: route,
            data: params
        }).success(function (data, status) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    return {
        getUsersForEvent: getUsersForEvent,
        getScriptsForEvent: getScriptsForEvent,
        getEMUsers: getEMUsers,
        userToEventService: userToEventService,
        getEMScripts: getEMScripts,
        getScriptOwners: getScriptOwners,
        scriptToEventService: scriptToEventService
    };

});
