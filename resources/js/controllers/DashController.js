// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute']);

/**
 * Controller for Dashboard view
 */
appModule.controller("DashController", function($rootScope, $scope) {
    $scope.upcoming = [{
        _start: "3:00PM",
        _end: "4:00PM",
        title: "Show 1",
        id: 123
    },
    {
        _start: "4:00PM",
        _end: "5:00PM",
        title: "Show 2",
        id: 124
    },
    {
        divider: true
    },
    {
        _start: "2:00PM",
        _end: "4:00PM",
        title: "Show 3",
        id: 125
    }];

});