// Define App
var appModule = window.appModule ||
        angular.module("ScheduleApp", ['ngRoute', 'jqwidgets']);

/**
 * Controller for Dashboard view
 */
appModule.controller("DashController", function ($rootScope, $scope, $http) {
    $scope.upcoming = [{
            _start: "3:00PM",
            _end: "4:00PM",
            title: "Show 1",
            id: 123
        },
        {
            _start: "4:00PM",
            _end: "5:00PM",
            title: "Show 2",
            id: 124
        },
        {
            divider: true
        },
        {
            _start: "2:00PM",
            _end: "4:00PM",
            title: "Show 3",
            id: 125
        }];
    angular.element(document).ready(function () {

    });

    $scope.createWidget = false;
    $http({
        method: 'get',
        url: 'api/notifications.php'
    }).success(function (data, status) {
        // prepare the data
        var source =
                {
                    datatype: "json",
                    datafields: [
                        {name: 'eventUserid', type: 'number'},
                        {name: 'id', type: 'number'},
                        {name: 'show_name', type: 'string'},
                        {name: 'show_status', type: 'string'},
                        {name: 'from', type: 'date'},
                        {name: 'to', type: 'date'},
                        {name: 'status', type: 'string'}
                    ],
                    url: 'api/events.php?action=get_assigned_events',
                    id: 'id'
                };
        var dataAdapter = new $.jqx.dataAdapter(source);

//         var getEditorDataAdapter = function (datafield,currentField) {
//        var source =
//         {
//                    datatype: "json",
//                    datafields: [
//                        { name: 'id', type: 'number' },
//                        { name: 'userId', type: 'number' },
//                        { name: 'message', type: 'string' },
//                        { name: 'date', type: 'date' },
//                        { name: 'status', type: 'string' }
//                    ],
//                    url: 'api/notifications.php',
//                    id: 'id'
//         };
//        var dataAdapter = new $.jqx.dataAdapter(source, {
//            uniqueDataFields: [datafield],
//            beforeLoadComplete: function (records) {
//                // update the loaded records dynamically 
//                if(datafield != currentField){
//                  return records;
//                }
//            }
//        });
//        return dataAdapter;
//    };



        var statusCheck = function (row, column, value) {
            var html = "<button id='acceptButton" + row + "' ng-click='statusAccept(" + row + ")'> Accept </button> <button id='rejectButton" + row + "' ng-click='statusReject(" + row + ")'> Reject</button>";
            if (value != '0') {
                html = value;
                if (value == "Accepted"){
                    html = '<span style="color:green;">Accepted</span>'
                }
                if (value == "Rejected"){
                    html = '<span style="color:red;">Rejected</span>'
                }
            }
            return html;
        };
        $scope.gridSettings =
                {
                    width: '100%',
                    pageable: true,
                    pagerButtonsCount: 5,
                    autoHeight: true,
                    showHeader: true,
                    pagerMode: "simple",
                    editable: false,
                    altrows: true,
                    rowdetails: true,
                    source: dataAdapter,
                    columnsResize: true,
                    rowdetailstemplate: { rowdetails: "<div style='margin: 10px;'><ul style='margin-left: 30px;'><li class='title'></li><li>More Information</li></ul><div class='information'></div><div class='notes'></div></div>", rowdetailsheight: 100 },
                    ready: function () {
                        $("#notifGrid").on("cellclick", function (event) 
                        {
                            // event arguments.
                            var args = event.args;
                            // row's bound index.
                            var rowBoundIndex = args.rowindex;
                            // row's visible index.
                            var rowVisibleIndex = args.visibleindex;
                            // right click.
                            var rightclick = args.rightclick; 
                            // original event.
                            var ev = args.originalEvent;
                            // column index.
                            var columnindex = args.columnindex;
                            // column data field.
                            var dataField = args.datafield;
                            // cell value
                            var value = args.value;
                            
                            if(dataField == 'show_name' || dataField == 'show_status'  ){
                                window.location.replace("#/event");
                            }
                        }); 

                    },
                    columns:
                            [
                                 {text: 'id', dataField: 'eventUserid', hidden:true},
                                {text: 'Show', dataField: 'show_name'},
                                {text: 'Status', dataField: 'show_status', width:100},
                                {text: 'From', dataField: 'from', cellsformat: 'M/d/yyyy - h:mm tt', width:200},
                                {text: 'To', dataField: 'to', cellsformat: 'M/d/yyyy - h:mm tt', width:200},
                                {text: 'Action', columntype: 'template', cellsalign: 'right', datafield: 'status', cellsrenderer: statusCheck, width:150}
                            ]
                };
        // now create the widget.
        $scope.createWidget = true;
    }).error(function (data, status) {
        // Some error occurred
    });


    $scope.statusAccept = function (rowid) {
        
        var currentDBID = $('#notifGrid').jqxGrid('getcellvalue', rowid, "eventUserid");
        
      $http.post('api/events.php?action=accept_event', 
        {
            'eventUserID'  : currentDBID
        }
    )

    .success(function (data, status, headers, config) {
        console.log("The status has been changed without any errors.");
        console.log(data);
    })

    .error(function(data, status, headers, config) {
        console.log("Failed to add the status to DB ");
    });
        
        $("#notifGrid").jqxGrid('setcellvalue', rowid, "status", "Accepted");
    };
    
    $scope.statusReject = function (rowid) {
        
     var currentDBID = $('#notifGrid').jqxGrid('getcellvalue', rowid, "eventUserid");

        
      $http.post('api/events.php?action=reject_event', 
        {
            'eventUserID'  : currentDBID
        }
    )

    .success(function (data, status, headers, config) {
        console.log("The status has been changed without any errors.");
        console.log(data);
    })

    .error(function(data, status, headers, config) {
        console.log("Failed to add the status to DB ");
    });
    
        $("#notifGrid").jqxGrid('setcellvalue', rowid, "status", "Rejected");
    };

});