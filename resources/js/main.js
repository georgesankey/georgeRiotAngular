// Main Controller

var appModule = angular.module("ScheduleApp", ['ngRoute']);

appModule.config(function($routeProvider) {

	$routeProvider
	    .when('/', {
	        controller:'MainController',
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
        .when('/404', {
            templateUrl:'resources/views/404.html'
        })
	    .otherwise({
	        redirectTo:'/404'
	    });

});

appModule.controller("RootController", function($scope, $location, $route) {
	$scope.user = "User";
    
    // Track the current page for nav
    $scope.page = "";
    $scope.isPage = function(testPage) {return $scope.page == testPage;}
    $scope.$on('$locationChangeStart', function(evt) {
        var path = $location.path().split("/");
        if(path.length == 1) {
            $scope.page = "";
        } else {
            $scope.page = path[1];
        }
    });


});

appModule.controller("MainController", function($scope) {
	//$scope.event = {location:"test"};

});


appModule.directive('calendar',  ['$rootScope', '$location', function($rootScope, $location) {
return {
    restrict: 'A',
    link: function($scope, element) {
        
        // Run Code here

        $(element).fullCalendar({
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
                //window.open(event.url, 'gcalevent', 'width=700,height=600');

                $rootScope.$apply(function() {
                    $rootScope.event = event;
                    $location.path("/e/"+event.id);
                });

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

        // End code

    }
};
}]);

appModule.directive('minical',  ['$rootScope', function($rootScope) {
return {
    restrict: 'A',
    link: function($scope, element) {
        
        // Run Code here

        $(element).fullCalendar({
            header: {},

            googleCalendarApiKey: 'AIzaSyBNlYH01_9Hc5S1J9vuFmu2nUqBZJNAXxs ',
             
            // Populates US holidays and Example FFG holidays
            events: {
                googleCalendarId: 'onlymakebelieve.org_o8mk4ka4mrbo2101de9mfg9f50@group.calendar.google.com',
            },
            eventClick: function(event) {
                return false;
            },
            eventLimit: 1,
            eventRender: function(event, element, view) {
                var dateString = moment(event.start).format('YYYY-MM-DD');

                view.el.find('.fc-day[data-date="' + dateString + '"]')
                    .addClass('fc-highlight');
            },

            dayRender: function(date, cell) {
                //cell.addClass("fc-highlight");
            },
        }); 

        // End code

    }
};
}]);

$(document).ready(function() {
   
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
