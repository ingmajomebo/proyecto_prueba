var app = angular.module("myApp", ['objectTable','highcharts-ng']);

app.factory('myApp', ['$cacheFactory', function($cacheFactory) {
  return $cacheFactory('super-cache');
}]);

app.controller("controllerCliente",[ "$scope","$http","API_ENDPOINT","$window",function($scope,$http,API_ENDPOINT,$window) {
  
  $scope.cliente = {
    dato: ""
  };

  $scope.JSONPaises = [];
  $scope.JSONDepartamento = [];
  $scope.JSONCiudades = [];

  $scope.clienteVisita = {
    fecha: "",
    valorNeto: "",
    valorVisita: "",
    observaciones: "",
    idVendedor: "",
    idClienteVisita: "",
  };

  $http.get(API_ENDPOINT.url + "ObtenerClientes").then(function(result){
    $scope.clientes = result.data.datos;
    $scope.clientes[0].nit = result.data.nit;
  });

  



  $scope.botonNuevoCliente = function(){
    $scope.cliente = {
      datos: "",
      nit: "",
      nombreCliente: "",
      pais: "",
      departamento: "",
      ciudad: "",
      direccion: "",
      telefono: "",
      cupo: "",
      saldoCupo: "",
      porcentajeVisitas: ""
    };
  }

  $scope.insertarCliente = function(){

    $http.post(API_ENDPOINT.url + "InsertarCliente",$scope.cliente).then(function(result){
      if(result.data.success){
          $http.get(API_ENDPOINT.url + "ObtenerClientes").then(function(result){
            $scope.clientes = result.data.datos;
          });
      }else{
            alert(result.data.msg);
      }
    });    
  }

  $scope.editarPush = function(item){
      $scope.cliente =  angular.copy(item); 
      $scope.cliente.cupo = parseInt(item.cupo);
      $scope.cliente.saldoCupo = parseInt(item.saldoCupo);  
  }

  $scope.editarCliente = function(){
    $http.post(API_ENDPOINT.url + "EditCliente",$scope.cliente).then(function(result){
      if(result.data.success){
          $http.get(API_ENDPOINT.url + "ObtenerClientes").then(function(result){
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
        $http.post(API_ENDPOINT.url + "EliminarCliente",$scope.data).then(function(result){
          if(result.data.success){
              $http.get(API_ENDPOINT.url + "ObtenerClientes").then(function(result){
                $scope.clientes = result.data.datos;
              });
          }else{
                alert(result.data.msg);
          }
        });
    }
  }


//------------------MANEJO DE VISITAS-----------------------

  $scope.pushVisita = function(item){

    $scope.clienteVisita.porcVisitas = item.porcentajeVisitas/100;
    $scope.clienteVisita.valorNeto = 0;
    $scope.clienteVisita.idClienteVisita = item.idCliente;
    $scope.clienteVisita.saldoCupo = parseInt(item.saldoCupo);
    //$scope.clienteVisita.valorVisita = 1;
  }

  $scope.insertarVisita = function(){
    $scope.clienteVisita.valorVisita = $scope.clienteVisita.porcVisitas * parseInt($scope.clienteVisita.valorNeto);
      $http.post(API_ENDPOINT.url + "Visita/InsertarVisita",$scope.clienteVisita).then(function(result){
          if(result.data.success){
              $http.get(API_ENDPOINT.url + "ObtenerClientes").then(function(result){
                $scope.clientes = result.data.datos;
              });
          }else{
                alert(result.data.msg);
          }
      }); 
  }

}]);

app.controller("controllerVisitas",[ "$scope","$http","API_ENDPOINT","$window",function($scope,$http,API_ENDPOINT,$window) {

  $scope.clienteVisita = {
    fecha: "",
    valorNeto: "",
    valorVisita: "",
    observaciones: "",
    idVendedor: "",
    valorVisita: "",
    idClienteVisita: "",
  };

  $http.get(API_ENDPOINT.url + "Visita/listVisita").then(function(result){
    $scope.visitas = result.data.datos;
  });

  $scope.editarPush = function(item){
    console.log(item);
    $scope.clienteVisita = {
      fecha: item.fecha,
      valorNeto: parseFloat(item.valorNeto),
      observaciones:item.observaciones,
      idVendedor: parseFloat(item.idVendedor),
      valorVisita: parseFloat(item.valorVisita),
      idClienteVisita: item.idCliente,
      idVisita:item.idVisita
    };
    $scope.clienteVisita.porcVisitas = item.porcentajeVisitas/100;
  }

  $scope.EditarVisita = function(){
    $scope.clienteVisita.idVendedor = parseFloat($scope.clienteVisita.idVendedor);
    $http.post(API_ENDPOINT.url + "Visita/editVisita",$scope.clienteVisita).then(function(result){
      if(result.data.success){
          $http.get(API_ENDPOINT.url + "Visita/listVisita").then(function(result){
            $scope.visitas = result.data.datos;
          });
      }else{
            alert(result.data.msg);
      }
    });
  }

}]);

app.controller("controllerReportes",[ "$scope","$http","API_ENDPOINT","$window",function($scope,$http,API_ENDPOINT,$window) {
      
      $http.get(API_ENDPOINT.url + "Reporte/CantidadVisitasPorCiudad").then(function(result){
        $scope.ciudades = result.data.labels;
        $scope.clientes = result.data.datos;

      });
  var chartConfig = {
            chart: {
            type: 'bar'
        },
        title: {
            text: 'Reporte'
        },
        xAxis: {
            categories: ['Santa Marta', 'Barranquilla', 'Cartagena']
        },
        yAxis: {
            title: {
                text: '# Numero Cliente'
            }
        },
        series: [{
            name: '',
            data: [0, 0, 0]
        }, {
            name: 'Cliente',
            data: [5, 7, 3]
        }]
      };
        $('#container').highcharts(chartConfig);
}]);



