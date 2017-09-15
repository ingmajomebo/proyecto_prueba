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

  $scope.botonNuevoCliente = function(){
    $scope.cliente = "";
  }

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

  $scope.editarPush = function(item){
      $scope.cliente =  item; 
      $scope.cliente.cupo = parseInt(item.cupo);
      $scope.cliente.saldoCupo = parseInt(item.saldoCupo);  
  }

  $scope.editarCliente = function(){
    $http.post("http://localhost/proyecto_prueba/public/EditCliente",$scope.cliente).then(function(result){
      if(result.data.success){
          $http.get("http://localhost/proyecto_prueba/public/ObtenerClientes").then(function(result){
            $scope.clientes = result.data.datos;
          });
      }else{
            alert(result.data.msg);
      }
    });
  }

  $scope.eliminarCliente = function(item){
    $scope.data ={
      idCliente: item.idCliente
    };
    modalConfirmaEliminar = confirm("¿Seguro que desea Eliminar?");

    if(modalConfirmaEliminar){
        $http.post("http://localhost/proyecto_prueba/public/EliminarCliente",$scope.data).then(function(result){
          if(result.data.success){
              $http.get("http://localhost/proyecto_prueba/public/ObtenerClientes").then(function(result){
                $scope.clientes = result.data.datos;
              });
          }else{
                alert(result.data.msg);
          }
        });
    }
  }

}]);




