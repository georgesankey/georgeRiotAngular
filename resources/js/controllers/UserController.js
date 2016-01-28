appModule.controller('UserController', function($scope, currentUserService) {
    currentUserService.getUserData().success(function(user){
            $scope.user = user;
        });        
    });