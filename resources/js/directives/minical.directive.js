// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ['ngRoute', 'jqwidgets']);

/**
 * Mini Calendar on dashboard 
 */
// Directive for mini calendar on home page
// Note: Directives cannot have spaces or - characters
// Camel case in name here translates to dashes in html
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
        }); 

        // End code

    }
};
}]);