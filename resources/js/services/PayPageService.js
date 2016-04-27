// Define App
var appModule = window.appModule ||
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Use this Service to get a user's timeSheetNotif
 */
appModule.factory('PayPageService', function($http, $q) {
    var timeSheetEntry = {};
    var route = "api/pay.php";

    var getAllTimeSheetEntries = function(){

        var deferred = $q.defer();

        if(timesheetEntry !== undefined){
            deferred.resolve(timeSheetEntry);
        } else {
            $http.get(route).success(function (data){
                timeSheetEntry = data;
                deferred.resolve(timeSheetEntry);
            });
        }
        return deferred.promise;
    };

     var submitEntry = function(entry) {
        var deferred = $q.defer();
        var postData = JSON.stringify(entry);
        $http.post(route + "?action=submit", $.param({data:postData}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    };

    var getAllUsers = function() {
        var deferred = $q.defer();

        $http.get(route + "?action=getAllUsers").success(function (data, status) {
            allUsers = data;
            deferred.resolve(allUsers);
                    });
        
        return deferred.promise;
   };
   
        return {
        submitEntry: submitEntry,
        getAllUsers:getAllUsers

    };
});
