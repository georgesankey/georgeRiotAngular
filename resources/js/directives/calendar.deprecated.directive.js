// Define App
var appModule = window.appModule || 
    angular.module("ScheduleApp", ['ngRoute']);

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