var app = angular.module("myApp", ['objectTable']);

app.factory('myApp', ['$cacheFactory', function($cacheFactory) {
  return $cacheFactory('super-cache');
}]);

app.controller("controllerCliente",[ "$scope","$http","$window",function($scope,$http,$window) {
  
  $scope.cliente = {
    dato: ""
  };
  $http.get("http://localhost/proyecto_prueba/public/ObtenerClientes").then(function(result){
    $scope.clientes = result.data.datos;
  });

  $scope.insertarCliente = function(){
    $http.post("http://localhost/proyecto_prueba/public/InsertarCliente",$scope.cliente).then(function(result){
      if(result.data.success){
          $http.get("http://localhost/proyecto_prueba/public/ObtenerClientes").then(function(result){
            $scope.clientes = result.data.datos;
          });
      }else{
            alert(result.data.msg);
      }
    });    
  }
}]);




