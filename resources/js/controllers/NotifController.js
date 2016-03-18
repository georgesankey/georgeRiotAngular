// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ["ngRoute", "ngResource", "jqwidgets"]);

/** 
 * Renders account requests & other notifications
 */
appModule.controller('NotifController', ['NotifService', '$scope', function(NotifService, $scope) {

	$scope.accountRequestGrid = {};
	$scope.accountRequestWindow = {};

	$scope.accountRequestWindowSettings = {
		height: 150,
		width: 300, 
		theme: 'energyblue',
		isModal: true,
		autoOpen: false,
		draggable: true,
		position: 'middle',
		resizable: false,
		open: function(event){
			//console.log(event);
		},
		close: function () {
			$scope.accountRequestGridSettings.apply('unselectrow');
		}
	};
	$scope.jqxButtonNotifSettings = {
		theme: 'energyblue'
	};
	$scope.accountRequestGridSettings = {
		altrows: true,
		width:  '100%',
		height: 300, 
		theme: 'energyblue',
		ready: function () {
			//$scope.accountRequestGrid.selectrow(0);
		},
		selectionmode: 'singlerow',
		source: $scope.accountRequests,
		columns: [
		{text: 'Email', datafield: 'email', width: '34%'},
		{text: 'First Name', datafield: 'first_name', width: '11%'},
		{text: 'Last Name', datafield: 'last_name', width: '11%'},
		{text: 'User Access', datafield: 'role_name', width: '11%'},
		{text: 'Cell Number', datafield: 'cell_number', width: '11%'},
		{text: 'Home Number', datafield: 'home_number', width: '11%'},
		{text: 'Work Number', datafield: 'work_number', width: '11%'},
		],
		rowselect: function (event) {
		$scope.selectedAccountRequest = event.args.row;
		$scope.accountRequestWindowSettings.apply('open');
	    }	
	};

	NotifService.getAllAccountRequests().then(function(accountRequests){

		$scope.accountRequests = accountRequests;

	});	

	$scope.accountRequestManagement = function (service) {
		 NotifService.accountRequestManagement(service, $scope.selectedAccountRequest.id).then(function(accountRequests) {
		 	$scope.accountRequests = accountRequests;
		 	$scope.accountRequestWindowSettings.apply('close');
		 });
	}

}]);