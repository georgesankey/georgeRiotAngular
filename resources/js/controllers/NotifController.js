// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ["ngRoute", "ngResource", "jqwidgets"]);

/** 
 * Renders account requests & other notifications
 */
appModule.controller('NotifController', ['NotifService', '$scope', function(NotifService, $scope) {


	NotifService.getAllAccountRequests().then(function(accountRequests){

		$scope.accountRequests = accountRequests;

	});	

	$scope.acceptAccountRequest = function () {
		 NotifService.acceptAccountRequest($scope.selectedAccountRequest.id).then(function(accountRequests) {
		 	$scope.accountRequests = accountRequests;
		 	$scope.accountRequestWindowSettings.apply('close');
		 });
	}

	$scope.rejectAccountRequest = function() {
		 NotifService.rejectAccountRequest($scope.selectedAccountRequest.id).then(function(accountRequests) {
		 	$scope.accountRequests = accountRequests;
		 	console.log('acctRequest: ' + accountRequests);
		 	$scope.accountRequestWindowSettings.apply('close');
		 });	
	}

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
		{text: 'Email', datafield: 'email', width: '36%'},
		{text: 'First Name', datafield: 'first_name', width: '16%'},
		{text: 'Last Name', datafield: 'last_name', width: '16%'},
		{text: 'User Access', datafield: 'role_name', width: '16%'},
		{text: 'Phone Number', datafield: 'phone_number', width: '16%'}
		],
		rowselect: function (event) {
		$scope.selectedAccountRequest = event.args.row;
		$scope.accountRequestWindowSettings.apply('open');
	    }	
	};
}]);