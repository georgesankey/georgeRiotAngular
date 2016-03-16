// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ["ngRoute", "ngResource", "jqwidgets"]);

/** 
 * Renders TimeSheet info & other notifications
 */
appModule.controller('PayPageController', ['PayPageService', '$scope', function(PayPageService, $scope) {

	$scope.timeSheetGrid = {};
	$scope.timeSheetWindow = {};

	$scope.timeSheetWindowSettings = {
		height: 150,
		width: 300, 
		theme: 'energyblue',
		isModal: true,
		autoOpen: false,
		draggable: true,
		position: 'middle',
		resizable: false,
		open: function(event){
			console.log(event);
		},
		close: function () {
			$scope.timeSheetGridSettings.apply('unselectrow');
		}
	};
	$scope.jqxButtonNotifSettings = {
		theme: 'energyblue'
	};
	$scope.timeSheetGridSettings = {
		altrows: true,
		width:  '100%',
		height: 300, 
		theme: 'energyblue',
		ready: function () {
			
		},
		selectionmode: 'multiplecellsadvanced',
		source: $scope.timeSheet,
		editable: true,
		sortable: true,
		pageable:true,
		columns: [
		{text: 'Name', datafield: 'name', width: '16%'},
		{text: 'Task', datafield: 'task', width: '16%'},
		{text: 'Date', columntype: 'DateTime'  ,datafield: 'date', width: '16%'},
		{text: 'Duration', columntype: 'Number'  ,datafield: 'duration', width: '16%'},
		{text: 'Travel',columntype: 'Number'  , datafield: 'travel', width: '16%'},
		{text: 'Wage',columntype: 'Number'  , datafield: 'wage', width: '16%'},
		{text: 'Total', columntype: 'Number'  , datafield: 'total', width: '16%'},
		{text: 'Comments' , datafield: 'comments', width: '16%'},
	

		],
		rowselect: function (event) {
		$scope.selectedTimeSheetEntry = event.args.row;
		$scope.timeSheetWindowSettings.apply('open');
	    }	
	};

	PayPageService.getAllTimeSheetEntries().then(function(timeSheet){

		$scope.timeSheet = timeSheet;

	});	

	$scope.timeSheetManagement = function (service) {
		 PayPageService.timeSheetManagement(service, $scope.selectedTimeSheetEntry.id).then(function(timeSheet) {
		 	$scope.timeSheet = timeSheet;
		 	$scope.timeSheetWindowSettings.apply('close');
		 });
	}

}]);