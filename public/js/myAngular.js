var app = angular.module("myApp", ['objectTable']);

app.factory('myApp', ['$cacheFactory', function($cacheFactory) {
  return $cacheFactory('super-cache');
}]);

app.controller("controllerCliente",[ "$scope","$http","$window",function($scope,$http,$window) {
 alert("hola angular");
}]);




