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
                    { name: 'firstName', type: 'string' },
                    //{ name: 'site',columntype:'dropdownlist',editable:'false', type: 'int' },
                    { name: 'HourlyRate', type: 'float',aggregates: ['sum', 'avg'] },
                    //{ name: 'Travel', type: 'float' },
                    { name: 'Driver', type: 'float',aggregates: ['sum', 'avg'] },
                    { name: 'Suitcase', type: 'float' },
					//{ name: 'WatchAShow', type: 'float' },
                    //{ name: 'Driver', type: 'bool' }
                ],
                root: "Entries",
                record: "Entry",
                id: 'EntryID',
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

            //var columns = ['First Name', 'Last Name', 'Product Name', 'Quantity', "Unit Price", "Total"];
            //$("#columnchooser").jqxDropDownList({  autoDropDownHeight: true, width: 120, height: 25, selectedIndex: 1, source: columns });
           // $("#enablehover").jqxCheckBox({  checked: true });

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
	$scope.timeSheetGridSettings = {
		source: dataAdapter,
		altrows: true,
		width:  '100%',
		height: 500, 
		theme: 'energyblue',
		ready: function () {
			
		},
		selectionmode: 'multiplecellsadvanced',
		//source: $scope.timeSheet,
		editable: true,
		sortable: true,
		pagesizeoptions: ['20','30','40'],
		pageable:true,
		filterable:true,
		showfilterrow: true,
		enabletooltips: true,
		showaggregates: true,
		pagesize: '20',
		
/*
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
                columns: [
                  { text: 'First Name', datafield: 'firstName', width: 250, align: 'center',cellsalign: 'center'},
                  { text: 'Site', columngroup: 'Users', datafield: 'site', width: 200, align: 'center', cellsalign: 'center',columntype:'dropdownlist',
                  createeditor: function(row,column,editor){
                  	//assign a new data source to the dropdownList ,promptText: "Please Choose:"
                  	var names= ['Event 1', 'Event 2', 'Event 3'];
                  	editor.jqxDropDownList({autoDropDownHeight:true,source:names});
                  }
              },
                  { text: 'Hourly Rate', columngroup: 'Users', datafield: 'HourlyRate', align: 'center', cellsalign: 'center', cellsformat: 'c2', width: 200 },
                  { text: 'Travel', datafield: 'Travel', cellsalign: 'right', align: 'center', cellsalign: 'center',cellsrenderer: cellsrenderer, width: 100 },
                  { text: 'Driver', columntype: 'checkbox', datafield: 'Driver', align: 'center', cellsalign: 'center', },
                  { text: 'Suitcase', datafield: 'Suitcase', cellsalign: 'right', align: 'center', cellsalign: 'center',cellsrenderer: cellsrenderer, width: 100 },
                  { text: 'Watch A Show', datafield: 'WatchAShow', align: 'center', cellsalign: 'center', },

                  {
                    text: 'Total', editable: false, datafield: 'total', cellsformat: 'c2',//aggregates:['sum', 'avg'],
                      cellsrenderer: function (index, datafield, value, defaultvalue, column, rowdata) {
                          var total = parseFloat(rowdata.UnitPrice) * parseFloat(rowdata.UnitsInStock);
                          return "<div style='margin: 4px;' class='jqx-right-align'>" + dataAdapter.formatNumber(total, "c2") + "</div>";
                      }
                  }
                ],
                columngroups: [
                    { text: 'Site Information', align: 'center', name: 'Users' }
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