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

    var getAllUsers = function() {
    
   };
   
        return {
        getAllTimeSheetEntries: getAllTimeSheetEntries
      

    };
});
