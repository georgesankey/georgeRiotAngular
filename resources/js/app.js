
// Initialize app
var appModule = window.appModule || 
    angular.module("ScheduleApp", ["ngRoute", "jqwidgets"]);

// Route the app
appModule.config(function($routeProvider) {

	$routeProvider
	    .when('/', {
	        controller:'DashController',
	        templateUrl:'resources/views/dashboard.html'
	    })
        .when('/calendar', {
            controller:'MainController',
            templateUrl:'resources/views/scheduler.html'
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
        .when('/messages',{
            controller:'MainController',
            templateUrl: 'resources/views/message.html'

        })
        .when('/create/v/', {
            controller:'VenueController',
            templateUrl:'resources/views/create/create_venue.html'
        })
        .when('/create/e/', {
            controller:'MainController',
            templateUrl:'resources/views/create/create_event.html'
        })
        .when('/v/:id', {
            controller:'VenueController',
            templateUrl:'resources/views/venue.html'
        })
        .when('/e/:id', {
            controller:'MainController',
            templateUrl:'resources/views/event.html'
        })
        .when('/u/:id', {
            controller:'ProfileController',
            templateUrl:'resources/views/user.html'
        })
        .when('/404', {
            templateUrl:'resources/views/404.html'
        })
	    .otherwise({
	        redirectTo:'/404'
	    });

});
