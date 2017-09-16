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
<body ng-controller="controllerVisitas">
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
                        <a href="/home">
                            <div class="icon">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                            </div>
                            <div class="title">Clientes</div>
                        </a>
                      </li>
                      <li class="active">
                        <a href="/listarVisita">
                            <div class="icon">
                                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                            </div>
                            <div class="title">Listado Visitas</div>
                        </a>
                      </li>
                      <li class="active">
                        <a href="/reportes">
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
                                      <h4 class="username">{{ Auth::user() }}</h4>
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
                                          <div class="title">Administrador</div>
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
                      Lista de Visitas
                    </div>
                    <div class="alert alert-danger" ng-if="mensajeErrorCrearCuenta" ng-repeat="item in detalle"><span class="product-title" id="mensajesError">@{{ item[0] }}</span><br></div> 
                    <div class="alert alert-info" style="display:none;" id="content"><strong>¡Bien hecho!</strong> Noticia Modificada Correctamente</div>

                    <div class="card-body no-padding">
                      <table  object-table
                      data = "visitas"
                      display = "10"
                      headers = "Nombre Cliente, fecha, Valor Neto, Valor Visita, Vendedor,Accion"
                      fields = "nombreCliente,fecha,valorNeto,valorVisita,nombreVendedor"
                      sorting = "compound"
                      editable = "true"
                      resize="true"
                      drag-columns="true">
                      <tbody>
                        <tr>
                          <td>@{{::item.nombreCliente}}</td>
                          <td>@{{::item.fecha}}</td>
                          <td>@{{::item.valorNeto}}</td>
                          <td>@{{::item.valorVisita}}</td>
                          <td>@{{::item.nombreVendedor}}</td>
                          <td><a data-toggle="modal" data-target="#myModalEditCliente" ng-click='$owner.editarPush(item)'><i class="fa fa-pencil" aria-hidden="true" id="iconoEditar"></i></a></td>
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


<div class="modal fade" id="myModalEditCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Insertar Visita</h4>
      </div>
      <form name="signup_form" class="" novalidate>
      <input type="hidden" ng-model="clienteVisita.idClienteVisita"/>
      <input type="hidden" ng-model="clienteVisita.saldoCupo"/>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputFecha">Fecha</label>
            <input type="text" class="form-control" id="fecha"  ng-model="clienteVisita.fecha" required />
          </div>
          <div class="form-group">
            <label for="exampleInputVendedor">Vendedor</label>
            <select class="form-control" id="vendedor" ng-model="clienteVisita.idVendedor" required >
             <option value="1">carlos</option>
           </select>
          </div><br>
          <div class="form-group">
            <label for="exampleInputValorNeto">Valor Neto</label>
            <input type="enum" class="form-control" id="valorNeto"  ng-model="clienteVisita.valorNeto" required />
          </div>
          <input type="enum" ng-show="false" ng-model="clienteVisita.porcVisitas">
          <div class="form-group">
            <label for="exampleInputNombreValorVisita">Valor Visita</label>
            @{{clienteVisita.valorNeto*clienteVisita.porcVisitas}}
          </div><br>

          <div class="form-group">
            <label for="exampleInputObservaciones">Observaciones</label>
            <textarea class="form-control" id="observaciones" rows="3" ng-model="clienteVisita.observaciones" autofocus required></textarea>
          </div><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" data-toggle="modal" data-target="#myModal2" ng-click="EditarVisita()">Guardar</button>
        </div>
      </form>
  </div>
</div>
</div>


    <script type="text/javascript" src="css/dashboardcss/js/vendor.js"></script>
    <script type="text/javascript" src="css/dashboardcss/js/app.js"></script> 
    <script type="text/javascript" src="js/node_modules/angular/angular.min.js"></script>
    <script type="text/javascript" src="js/node_modules/angula-grafica/angular-fusioncharts.min.js"></script>
    <script type="text/javascript" src="js/myAngular.js"></script>
    <script type="text/javascript" src="js/constants.js"></script>
    <script type="text/javascript" src="js/build/object-table.js"></script>


</body>
</html>
