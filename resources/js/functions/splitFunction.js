// Define App
var appModule = window.appModule || 
    angular.module("ScheduleApp", ['ngRoute']);

appModule.filter('splitFunction',  function() {
	return function(input, splitChar, splitIndex){
    	if(input === undefined || input === null || input.trim() === ""){
    		return "  None";
    	}
    	return input.split(splitChar)[splitIndex];           	
    }
            
});