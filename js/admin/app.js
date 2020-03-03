var app = angular.module("products", ['ngRoute']);

app.config(function ($routeProvider, $locationProvider) {
    $routeProvider
        .when("/:id", {
            templateUrl: "/views/product.tpl.php"
        });

    $locationProvider.html5Mode(true);

});

app.controller('productsController', function ($scope) {

    $scope.myData = "abc";

})