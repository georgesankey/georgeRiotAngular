// Main Controller

var appModule = angular.module("ScheduleApp", ['ngRoute']);

appModule.config(function($routeProvider) {

	$routeProvider
	    .when('/', {
	      controller:'MainController',
	      templateUrl:'resources/views/dashboard.html'
	    })
	    .otherwise({
	      redirectTo:'/'
	    });

});

appModule.controller("RootController", function($scope) {
	$scope.user = "User";
});

appModule.controller("MainController", function($scope) {
	$scope.testing = "Test";
});

// Inserts the calendar onto the page
$(document).ready(function() {
   $("#calendar").fullCalendar({
       //uses my Google Calendar API key for now
       googleCalendarApiKey: 'AIzaSyBNlYH01_9Hc5S1J9vuFmu2nUqBZJNAXxs ',
       
       // Populates US holidays and Example FFG holidays
       events: {
           googleCalendarId: 'onlymakebelieve.org_o8mk4ka4mrbo2101de9mfg9f50@group.calendar.google.com',
           // Think this is OMB API key
           //   AIzaSyBNlYH01_9Hc5S1J9vuFmu2nUqBZJNAXxs
           //onlymakebelieve.org_o8mk4ka4mrbo2101de9mfg9f50@group.calendar.google.com
           
           /* MY key
           AIzaSyAFKT1d_pETqF40V66ceNUm8TIhypgD-6g
           tsgforce.com_iuc4u4omg70eiieko6iu7i8p5k@group.calendar.google.com
           */
           
       },
       eventClick: function(event) {
			// opens events in a popup window
			window.open(event.url, 'gcalevent', 'width=700,height=600');
			return false;
		},
		selectable: true,
		selectHelper: true,
		editable: true,
		eventLimit: true, // allow "more" link when too many events
       header: {
            left: 'prev,next,today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
       }
       
   }); 
   
   $("#menu-btn").on("click", function() {
       toggleMenu();
   });
   
});

var toggleMenu = function() {
    if($("#sidebar").hasClass("hide")) {
        $("#sidebar").removeClass("hide");
        $("#page-wrapper").css("margin-left", "");
    } else {
        $("#sidebar").addClass("hide");
        $("#page-wrapper").css("margin-left", "0px");
    }
}
