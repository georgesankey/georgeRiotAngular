// Define App
var appModule = window.appModule || 
	angular.module("ScheduleApp", ["ngRoute", "ngResource", "jqwidgets"]);

/** 
 * Renders TimeSheet info & other notifications
 */
appModule.controller('PayPageController', ['PayPageService', '$scope', function(PayPageService, $scope) {

	//$scope.timeSheetGrid = {};
	$scope.timeSheetWindow = {};
	var url = "resources/js/controllers/products.xml";
            // prepare the data
            var source =
            {
                datatype: "xml",
                datafields: [
                    { name: 'ProductName', type: 'string' },
                    { name: 'QuantityPerUnit', type: 'int' },
                    { name: 'UnitPrice', type: 'float' },
                    { name: 'UnitsInStock', type: 'float' },
                    { name: 'Discontinued', type: 'bool' }
                ],
                root: "Products",
                record: "Product",
                id: 'ProductID',
                url: url
            };
            var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
                if (value < 20) {
                    return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + '; color: #ff0000;">' + value + '</span>';
                }
                else {
                    return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + '; color: #008000;">' + value + '</span>';
                }
               
            }
            
            var dataAdapter = new $.jqx.dataAdapter(source, {
                downloadComplete: function (data, status, xhr) { },
                loadComplete: function (data) { },
               // loadError: function (xhr, status, error) { }
            });

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
			//console.log(event);
		},
		close: function () {
			$scope.timeSheetGridSettings.apply('unselectrow');
		}
	};
	$scope.jqxButtonNotifSettings = {
		theme: 'energyblue'
	};
	$scope.timeSheetGridSettings = {/*/*
		altrows: true,
		width:  '100%',
		height: 300, 
		theme: 'energyblue',
		ready: function () {
			
		},
		//selectionmode: 'multiplecellsadvanced',
		//source: $scope.timeSheet,
		editable: true,
		sortable: true,
		pageable:true,
		filterable:true,

		columns: [
		{text: 'Name', datafield: 'name', width: '16%'},
		{text: 'Task', datafield: 'task', width: '16%'},
		{text: 'Date', columntype: 'DateTime'  ,datafield: 'date', width: '16%'},
		{text: 'Duration', columntype: 'Number'  ,datafield: 'duration', width: '16%'},
		{text: 'Travel',columntype: 'Number'  , datafield: 'travel', width: '16%'},
		{text: 'Wage',columntype: 'Number'  , datafield: 'wage', width: '16%'},
		{text: 'Total', columntype: 'Number'  , datafield: 'total', width: '16%'},
		{text: 'Comments' , datafield: 'comments', width: '16%'},
	

		],*/
		 width: 850,
                source: dataAdapter,                
                pageable: true,
                autoheight: true,
                sortable: true,
                altrows: true,
                enabletooltips: true,
                editable: true,
                selectionmode: 'multiplecellsadvanced',
                columns: [
                  { text: 'Product Name', columngroup: 'ProductDetails', datafield: 'ProductName', width: 250 },
                  { text: 'Quantity per Unit', columngroup: 'ProductDetails', datafield: 'QuantityPerUnit', cellsalign: 'right', align: 'right', width: 200 },
                  { text: 'Unit Price', columngroup: 'ProductDetails', datafield: 'UnitPrice', align: 'right', cellsalign: 'right', cellsformat: 'c2', width: 200 },
                  { text: 'Units In Stock', datafield: 'UnitsInStock', cellsalign: 'right', cellsrenderer: cellsrenderer, width: 100 },
                  { text: 'Discontinued', columntype: 'checkbox', datafield: 'Discontinued' }
                ],
                columngroups: [
                    { text: 'Product Details', align: 'center', name: 'ProductDetails' }
                ],
           
		rowselect: function (event) {
		$scope.selectedTimeSheetEntry = event.args.row;
		$scope.timeSheetWindowSettings.apply('open');
	    }	
	};

/*	PayPageService.getAllTimeSheetEntries().then(function(timeSheet){

		$scope.timeSheet = timeSheet;

	});	
*/
	$scope.timeSheetManagement = function (service) {
		 PayPageService.timeSheetManagement(service, $scope.selectedTimeSheetEntry.id).then(function(timeSheet) {
		 	$scope.timeSheet = timeSheet;
		 	//$scope.timeSheetWindowSettings.apply('close');
		 });
	}

}]);