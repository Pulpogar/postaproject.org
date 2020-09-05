<?php session_start();
require 'config.php';
require '../functions.php';
require '../requirelanguage.php';

$conexion = conexion($bd_config);

// Comprobamos si la session esta iniciada, sino, redirigimos.
// comprobarSessionAdmin();
// comprobarSessionActiva();


// if ( isset( $_SESSION['logged'] ) ) {

//    // Sesión activa
// }
// else{

//    // Sesión inactiva
//    header("Location: /login.php");
// }

if (!$conexion) {
  header("Location: ../error.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Postaproject | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="./assets/dist/css/flag-icon.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- <script language="JavaScript" type="text/javascript" src="../assets/js/ajax.js"></script> -->

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->

  <script src="https://code.jquery.com/jquery-3.2.1.js">  </script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.3/b-html5-1.6.3/cr-1.5.2/r-2.2.5/sp-1.1.1/datatables.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 
</head>


<body onload="loadDiv()"; class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link"><?php echo $irInicio ?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fas fa-door-open"></i>&nbsp;<?php echo $cerrarSesion ?>
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <h4 style="text-align: center">P<i style="font-size: 20px" class="fab fa-osi"></i>STA | AdminPanel</h4>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo utf8_encode($_SESSION['nombre'])?>&nbsp<?php echo utf8_encode($_SESSION['apellido'])?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                <?php echo $estadisticas; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a id="btnStatistics" href="#" type="button" class="nav-link active">                
                <i class="right fab fa-osi"></i>
                  <p><?php echo $txtDatosGenerales; ?></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview" id="menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                <?php echo $txtproyectos; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a id="btnProjects" href="#" type="button" class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p><?php echo $gestionarProyectos; ?></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                <?php echo $txtusuarios; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a id="btnUsers" href="#" type="button" class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p><?php echo $gestionarUsuarios; ?></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                <?php echo $txtRoles; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a id="btnRoles" href="#" type="button" class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p><?php echo $txtGestionarRoles; ?></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shapes"></i>
              <p>
                <?php echo $txtAreas; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a id="btnAreas" href="#" type="button" class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p><?php echo $txtGestionarAreas; ?></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                <?php echo $txtcategorias; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" onclick="MostrarConsulta('manage.categories.php'); return false"; class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p><?php echo $gestionarCategorias; ?></p>
                </a>
              </li>
            </ul>
          </li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe-americas"></i>
              <p>
                <?php echo $txtIdiomas; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a id="btnLanguages" href="#" type="button" class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p><?php echo $gestionarIdiomas; ?></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                <?php echo $txtContenidos; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a id="btnNovelty" href="#" type="button" class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p><?php echo $txtGestionardoNovedad; ?></p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../new-novelty.php" class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p><?php echo $txtAgregarNovedad; ?></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                <?php echo $txtSuscripciones; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a id="btnSubscriptions" href="#" type="button" class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p><?php echo $txtSuscripToNewsletter; ?></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bars"></i>
              <p>
                <?php echo $txtLogs ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a id="btnLogs" href="#" type="button" class="nav-link active">
                  <i class="right fab fa-osi"></i>
                  <p><?php echo $txtGestionarLogs; ?></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                <?php echo $txtConfiguracion ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" onclick="MostrarConsulta('manage.languages.view.php'); return false"; class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p><?php echo $txtConfiguracionGral; ?></p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                PRUEBAS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="manage.roles.php" class="nav-link active">
                <i class="right fab fa-osi"></i>
                  <p>PRUEBAS ROLES</p>
                </a>
              </li>
            </ul>
          </li> -->
        </nav>
  </aside>


<div id="resultado"></div>


  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2-pre
    </div>
  </footer>
</div>

</body>
</html>

<script>
  function loadDiv() {
    $("#resultado").load('manage.statistics.php');
  }
</script>

<!-- <script src="../assets/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>

<script>
  $("#btnRoles").click(function(event) {
      $("#resultado").load('manage.roles.php');
  });

  $("#btnAreas").click(function(event) {
        $("#resultado").load('manage.areas.php');
  });

  $("#btnUsers").click(function(event) {
        $("#resultado").load('manage.users.php');
  });

  $("#btnProjects").click(function(event) {
        $("#resultado").load('manage.projects.php');
  });

  $("#btnLogs").click(function(event) {
        $("#resultado").load('manage.logs.php');
  });

  $("#btnLanguages").click(function(event) {
        $("#resultado").load('manage.languages.php');
  });

  $("#btnSubscriptions").click(function(event) {
        $("#resultado").load('manage.subscriptions.php');
  });

  $("#btnNovelty").click(function(event) {
        $("#resultado").load('manage.novelty.php');
  });

  $("#btnStatistics").click(function(event) {
        $("#resultado").load('manage.statistics.php');
  });
</script>
