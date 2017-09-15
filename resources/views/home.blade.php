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
}
}
}
}
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



    <script type="text/javascript" src="css/dashboardcss/js/vendor.js"></script>
    <script type="text/javascript" src="css/dashboardcss/js/app.js"></script> 
    <<script type="text/javascript" src="js/node_modules/angular/angular.min.js"></script>
    <script type="text/javascript" src="js/myAngular.js"></script>
    <script type="text/javascript" src="js/constants.js"></script>
    <script type="text/javascript" src="js/build/object-table.js"></script>


</body>
</html>
