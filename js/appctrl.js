var app = angular.module('app', []);

app.controller('appctrl', ['$scope', '$http', function($scope, $http) {

    
/*
    var url = {
        method: 'POST',
        url: 'news/testang',
        headers: {
            'Content-Type': undefined
        },
        data: {
            dataform: 'default'
        }
    }
*/
    //$http(url).
    $http.post('news/testang', {dataform: 'default'}).success(function($data) {
        $scope.testang = $data['testang'];
        $scope.datatest = $data;
       // console.log($data);
    });

    

}]);
