(function() {

  var app = angular.module("validation", ["ngMessages"]);

  var RegistrationController = function($http,$window) {
    var model = this;

    model.message = "";

    model.user = {
      password: "",
      token_usuario: "",
      password_confirmation: "",
      correo: ""
    };



  

  model.submit = function(valor) {

    if(valor.password === valor.password_confirmation && valor.token_usuario != ""){
          $http.post("http://app.tamaca.com.co/CambiarContrasenaAdmin",valor).then(function(result) {
             console.log(result);
             console.log(valor);
             if (!result.data.success) {
             	alert("hubo algun error vuelve a intentar");
             }else{
             	alert("contraseña cambiada correctamente");
             	$window.location.href = 'http://reservas.tamaca.com.co/login';
             }
          });
    }else{
         alert("los campos son requeridos");
      }
    };

   model.enviarCorreo = function(valor){
   	model.datos = {
   		email: valor
   	}
   	$http.post("http://app.tamaca.com.co/RecordarContrasenaAdmin",model.datos).then(function(result){
   		if (!result.data.success) {
   			alert("hubo algun error vuelve a intentar");
   			$("#email").val("");
   		}else{
   			$window.location.href = 'http://reservas.tamaca.com.co/recuperarPassword';
   		}
   	});
   	//  
   }

  };

  var compareTo = function() {
  	
    return {
    
      require: "ngModel",
      
      scope: {
        otherModelValue: "=compareTo"
      },

      link: function(scope, element, attributes, ngModel) {



        ngModel.$validators.compareTo = function(modelValue) {
          return modelValue == scope.otherModelValue;
        };

        scope.$watch("otherModelValue", function() {
          ngModel.$validate();
          if(true){

          }else{
          	
          }
        });
      }
    };
  };

  app.directive("compareTo", compareTo);
  app.controller("RegistrationController", RegistrationController);

}());