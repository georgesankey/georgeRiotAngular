
// Initialize app
var appModule = window.appModule || 
    angular.module("ScheduleApp", ['ngRoute']);

// Route the app
appModule.config(function($routeProvider) {

	$routeProvider
	    .when('/', {
	        controller:'DashController',
	        templateUrl:'resources/views/dashboard.html'
	    })
        .when('/calendar', {
            controller:'MainController',
            templateUrl:'resources/views/calendar.html'
        })
        .when('/pay', {
            controller:'MainController',
            templateUrl:'resources/views/pay.html'
        })
        .when('/actors', {
            controller:'MainController',
            templateUrl:'resources/views/actors.html'
        })
        .when('/notifications', {
            controller:'MainController',
            templateUrl:'resources/views/notifs.html'
        })
        .when('/message',{
            controller:'MainController',
            templateUrl: 'resources/views/message.htm'

        })
        .when('/create/v/', {
            controller:'MainController',
            templateUrl:'resources/views/create/create_venue.html'
        })
        .when('/create/e/', {
            controller:'MainController',
            templateUrl:'resources/views/create/create_event.html'
        })
        .when('/v/:id', {
            controller:'MainController',
            templateUrl:'resources/views/venue.html'
        })
        .when('/e/:id', {
            controller:'MainController',
            templateUrl:'resources/views/event.html'
        })
        .when('/u/:id', {
            controller:'MainController',
            templateUrl:'resources/views/user.html'
        })
        .when('/404', {
            templateUrl:'resources/views/404.html'
        })
	    .otherwise({
	        redirectTo:'/404'
	    });

});
