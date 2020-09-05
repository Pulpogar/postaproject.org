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
        <!-- <div class="image">
          <img src="assets/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo utf8_encode($_SESSION['nombre'])?>&nbsp<?php echo utf8_encode($_SESSION['apellido'])?></a>
        </div> -->
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
              <a id="btnAreas" href="manage.areas.php" type="button" class="nav-link active">
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
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
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
          </li>
        </nav>
  </aside>