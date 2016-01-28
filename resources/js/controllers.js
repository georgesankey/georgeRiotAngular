appModule.controller("RootController", function($rootScope, $scope, $location, $route) {
	$scope.user = "User";
    
    // Track the current page for nav
    $scope.page = "";
    $scope.isPage = function(testPage) {return $scope.page == testPage;}
    $scope.$on('$locationChangeStart', function(evt) {
        var path = $location.path().split("/");
        if(path.length == 1) {
            $scope.page = "";
        } else {
            $scope.page = path[1];
        }
    });


    $rootScope.events = [];

    $rootScope.notifications = [{
        type: "alert-danger",
        text: "You have dropped a show.",
        link: "#/e/123",
        id: 71
    },
    {
        type: "alert-warning",
        text: "A show is missing actors.",
        link: "#/e/243",
        id: 72
    },
    {
        type: "alert-info",
        text: "A show has been modified by another user.",
        link: "#/e/19",
        id: 73
    }];
});

appModule.controller("MainController", function($scope) {
	//$scope.event = {location:"test"};

});

appModule.controller("DashController", function($rootScope, $scope) {
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

});

appModule.controller('UserController', function($scope, currentUserService) {
    currentUserService.getUserData().success(function(user){
            $scope.user = user;
        });        
    });

appModule.controller('AccountRequestController', function($scope, accountRequestService) {
	accountRequestService.getAllAccountRequests().success(function(requests){
		$scope.requests = requests;
	});
});