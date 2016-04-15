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
              { name: 'firstName', type: 'string'},
                    //{ name: 'siteA',columntype:'dropdownlist',editable:'false' },
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
                    url: url,

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

                  var sites = [
                  { value: "AU", label: "Brookdale Impatient"  },
                  { value: "AT", label: "Incarnation" },
                  { value: "AZ", label: "A. Harry Moore" },
                  { value: "BS", label: "AHRC Middle/High School" },
                  { value: "BH", label: "Blythedale" },
                  { value: "BD", label: "Bronx Psych" },
                  { value: "BB", label: "morgan Stanley" },
                  { value: "BY", label: "James Martin" },
                  { value: "BE", label: "David Garcia" },
                  { value: "BZ", label: "Belize Clark" },
                  { value: "BJ", label: "Lucas Lewis" },
                  { value: "BM", label: "Bermuda Adams" },
                  { value: "CR", label: "John Young" },
                  { value: "HR", label: "Samuel King" },
                  { value: "CU", label: "Natalie Green" },
                  { value: "CY", label: "Addison Campbell" },
                  { value: "CZ", label: "Gabriel Nelson"  },
                  { value: "DK", label: "Harper Phillips" },


                  ];
                  var sitesSource =
                  {
                   datatype: "array",
                   datafields: [
                   { name: 'label', type: 'string' },
                   { name: 'value', type: 'string' }
                   ],
                   localdata: sites
                 };
                 var travel = [
                 { value: "20", label: "$20" },
                 { value: "30", label: "$30" },
                 ];
                 var travelSource =
                 {
                   datatype: "array",
                   datafields: [
                   { name: 'label', type: 'string' },
                   { name: 'value', type: 'string' }
                   ],
                   localdata: travel
                 };

                 var sitesAdapter = new $.jqx.dataAdapter(sitesSource, {
                //autoBind: true
              });
                 var travelAdapter = new $.jqx.dataAdapter(travelSource, {
                //autoBind: true
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
            //$scope.timeSheetWindowSettings.append(container);
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
        addrow: function (rowid, rowdata, position, commit) {
                    // synchronize with the server - send insert command
                    // call commit with parameter true if the synchronization with the server is successful 
                    //and with parameter false if the synchronization failed.
                    // you can pass additional argument to the commit callback which represents the new ID if it is generated from a DB.
                    commit(true);
                  },
                  rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 5px;'></div>");
                    toolbar.append(container);
                    container.append('<input id="addrowbutton" type="button" value="Add New Row" />');
                    container.append('<input style="margin-left: 5px;" id="deleterowbutton" type="button" value="Delete Selected Row" />');
                    container.append('<input style="margin-left: 5px;" id="updaterowbutton" type="button" value="Update Selected Row" />');
                    $("#addrowbutton").jqxButton();


                  },
                  columns: [
                  { text: 'Name', datafield: 'firstName', width: 250, align: 'center',cellsalign: 'center' ,editable:false},
                  { text: 'Site', columngroup: 'Users', datafield: 'site', width: 200, align: 'center',  cellsalign: 'center',columntype:'dropdownlist',
                  createeditor: function (row, value, editor) {
                    editor.jqxDropDownList({ source: sitesAdapter, displayMember: 'label', valueMember: 'value', dropDownHeight:100, selectedIndex: 1, 'theme': 'energyblue'});
                  }

                },



                { text: 'Hourly Rate', columngroup: 'Users', datafield: 'HourlyRate', align: 'center', cellsalign: 'center', cellsformat: 'c2', width: 200 },
                { text: 'Travel', datafield: 'Travel', cellsalign: 'right', align: 'center', cellsalign: 'center',cellsrenderer: cellsrenderer, width: 100 ,columntype:'dropdownlist',
                createeditor: function (row, value, editor) {
                  editor.jqxDropDownList({ source: travelAdapter, displayMember: 'label', valueMember: 'value', dropDownHeight:100, selectedIndex: 1,  });
                }
              },
              { text: 'Driver', columntype: 'checkbox', datafield: 'Driver', align: 'center', cellsalign: 'center', },
              { text: 'Suitcase', datafield: 'Suitcase', cellsalign: 'right', align: 'center', cellsalign: 'center',cellsrenderer: cellsrenderer, width: 100 },
              { text: 'Watch A Show', datafield: 'WatchAShow', align: 'center', cellsalign: 'center', },

              {
                text: 'Total', editable: false, datafield: 'total', cellsformat: 'c2', aggregates:['sum', 'avg'],
                cellsrenderer: function (index, datafield, value, defaultvalue, column, rowdata) {
                  var total = (parseFloat(rowdata.HourlyRate) * 1);
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
    //the button to export files with paypage data
    $scope.exportButtonSettings = {
      theme: 'energyblue',
      click: function(event){
        $("#jqxgrid").jqxGrid('exportdata', 'xls', 'jqxgrid');
      }
    };
    //$(#date).html("<div>From: " + selection.from.toLocaleDateString() + " <br/>To: " + selection.to.toLocaleDateString() + "</div>");}

    $scope.dateInputSettings =
    {
      width: 200,
      height: 30,
      formatString: 'd',
      animationType: 'fade',
      selectionMode: 'range'

    }
    $scope.date = Date.now();

  /*PayPageService.getAllTimeSheetEntries().then(function(timeSheet){

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