<!DOCTYPE html>
<html ng-app="myApp">

<head>
  <title>Banshee S.A</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/dashboardcss/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="css/dashboardcss/css/flat-admin.css">

  <link rel="stylesheet" type="text/css" href="css/dashboardcss/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="css/dashboardcss/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="css/dashboardcss/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="css/dashboardcss/css/theme/yellow.css">
  <link rel="stylesheet" type="text/css" href="js/build/object-table-style.css">


</head>
<body ng-controller="controllerCliente">
  <div class="app app-default">
      <aside class="app-sidebar" id="sidebar">
                  <div class="sidebar-header">
                        <a class="sidebar-brand" href="#"><span class="highlight">Banshee S.A</span></a>
                        <strong class="sidebar-brand" style="margin-top: -58px;"></strong>
                        <button type="button" class="sidebar-toggle">
                          <i class="fa fa-times"></i>
                      </button>
                  </div>

                  <div class="sidebar-menu">
                    <ul class="sidebar-nav">
                      <li class="active">
                        <a href="#">
                            <div class="icon">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                            </div>
                            <div class="title">Visitas</div>
                        </a>
                      </li>
                      <li class="active">
                        <a href="/#">
                            <div class="icon">
                                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                            </div>
                            <div class="title">Reportes</div>
                        </a>
                      </li>
                    </ul>
                  </div>
                <div class="sidebar-footer">
                    <ul class="menu">
                      <li>
                            <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-cogs" aria-hidden="true"></i>
                            </a>
                      </li>

                    </ul>
                </div>
        </aside>

<!--////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="app-container">

                <nav class="navbar navbar-default" id="navbar">
                    <div class="container-fluid">
                      <div class="navbar-collapse collapse in">
                            <ul class="nav navbar-nav navbar-mobile">
                                   <li>
                                        <button type="button" class="sidebar-toggle">
                                          <i class="fa fa-bars"></i>
                                        </button>
                                  </li>
                            </ul>

                        <ul class="nav navbar-nav navbar-right">


                            <li class="dropdown profile">
                                  <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
                                    <img class="profile-img" src="css/dashboardcss/images/profile.png">
                                    <div class="title">Perfil</div>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="profile-info">
                                      <h4 class="username">{{ Auth::user()->nombreUsuario }}</h4>
                                    </div>
                                  <ul class="action">
                                          <li>
                                                <a href="#">
                                                  Perfil
                                                </a>
                                          </li>
                                          <li>
                                                <a href="#">
                                                  Configuración
                                                </a>
                                          </li>
                                          <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                          </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    </div>
                </nav>

                <div class="row">
                      <div class="col-xs-12">
                        <div class="card card-banner card-chart card-green no-br">
                            <div class="card-header">
                                       <div class="card-title">
                                          <div class="title">Administrador: {{ Auth::user()->nombre }}</div>
                                      </div>
                                      <ul class="card-action">
                                              <li>
                                                    <a href="/">
                                                      <i class="fa fa-refresh"></i>
                                                    </a>
                                              </li>
                                     </ul>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                  <div class="card">
                    <div class="card-header">
                      Noticias
                    </div>
                    <div class="alert alert-danger" ng-if="mensajeErrorCrearCuenta" ng-repeat="item in detalle"><span class="product-title" id="mensajesError">@{{ item[0] }}</span><br></div> 
                    <div class="alert alert-info" style="display:none;" id="content"><strong>¡Bien hecho!</strong> Noticia Modificada Correctamente</div>

                    <div class="card-body no-padding">
                    <div id="botonCrear">
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalNoticias" id="nuevoProducto">Nuevo</button>
                    </div>
                      <table  object-table
                      data = "clientes"
                      display = "10"
                      headers = "Nit, Nombre, Telefono, Cupo, Saldo Cupo,Accion"
                      fields = "nit,nombreCliente,telefono,cupo,saldoCupo"
                      sorting = "compound"
                      editable = "true"
                      resize="true"
                      drag-columns="true">
                      <tbody>
                        <tr>
                          <td>@{{::item.nit}}</td>
                          <td>@{{::item.nombreCliente}}</td>
                          <td>@{{::item.telefono}}</td>
                          <td>@{{::item.cupo}}</td>
                          <td>@{{::item.saldoCupo}}</td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
            <div class="row">
              <footer class="app-footer">
                    <div class="row">
                          <div class="col-xs-12">
                            <div class="footer-copyright">
                            Desarrollo © 2017 Manuel Melgarejo.
                          </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>


<div class="modal fade" id="myModalNoticias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Insertar Cliente</h4>
      </div>
      
      <form name="signup_form" class="" novalidate>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputDato">Dato</label>
            <textarea class="form-control" id="dato" rows="3" ng-model="cliente.dato" autofocus required></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputNit">Nit</label>
            <input type="text" class="form-control" id="nit"  ng-model="cliente.nit" required />
          </div>
          <div class="form-group">
            <label for="exampleInputNombreCliente">Nombre Cliente</label>
            <input type="text" class="form-control" id="nit"  ng-model="cliente.nombreCliente" required />
          </div>
          <div class="form-group">
            <label for="exampleInputPais">Pais</label>
            <select class="form-control" id="pais" ng-model="cliente.pais" required >
             <option value="Colombia">Colombia</option>
           </select>
          </div><br>
          <div class="form-group">
            <label for="exampleInputDepartamento">Departamento</label>
            <select class="form-control" id="departamento" ng-model="cliente.departamento" required >
             <option value="Magdalena">Magdalena</option>
           </select>
          </div><br>
          <div class="form-group">
            <label for="exampleInputPais">Ciudad</label>
            <select class="form-control" id="ciudad" ng-model="cliente.ciudad" required >
             <option value="Santa marta">Santa marta</option>
           </select>
          </div><br>
          <div class="form-group">
            <label for="exampleInputNombreDireccion">Direccion</label>
            <input type="text" class="form-control" id="direccion"  ng-model="cliente.direccion" required />
          </div>
          <div class="form-group">
            <label for="exampleInputNombreDireccion">Telefono</label>
            <input type="text" class="form-control" id="telefono"  ng-model="cliente.telefono" required />
          </div>
          <div class="form-group">
            <label for="exampleInputNombreTelefono">Cupo</label>
            <input type="number" class="form-control" id="cupo"  ng-model="cliente.cupo" required />
          </div>
          <div class="form-group">
            <label for="exampleInputNombreSaldoCupo">Saldo Cupo</label>
            <input type="number" class="form-control" id="saldoCupo"  ng-model="cliente.saldoCupo" ng-value="@{{cliente.cupo}}" disabled  />
          </div>
          <div class="form-group">
            <label for="exampleInputNombrePorcentajeVisitas">Porcentaje Visitas</label>
            <input type="number" class="form-control" id="porcentajeVisitas"  ng-model="cliente.porcentajeVisitas"  required />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" data-toggle="modal" data-target="#myModal2" ng-click="insertarCliente()">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


    <script type="text/javascript" src="css/dashboardcss/js/vendor.js"></script>
    <script type="text/javascript" src="css/dashboardcss/js/app.js"></script> 
    <<script type="text/javascript" src="js/node_modules/angular/angular.min.js"></script>
    <script type="text/javascript" src="js/myAngular.js"></script>
    <script type="text/javascript" src="js/constants.js"></script>
    <script type="text/javascript" src="js/build/object-table.js"></script>


</body>
</html>
