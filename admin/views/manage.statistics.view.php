<?php ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 style="font-weight: bold;" class="m-0 text-dark"><?php echo $dashboard ?></h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php"><?php echo $irInicio;?></a></li>
              <li class="breadcrumb-item active"><?php echo $dashboard ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo contador($conexion, 'proyectos', 1) ?></h3>
                <p><?php echo $txtproyectosValidados ?><br><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a onclick="MostrarConsulta('Views/manage.projects.view.php'); return false"; class="small-box-footer"><?php echo $txtMasInfo ?>&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

         <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo contador($conexion, 'proyectos', 0) ?></h3>
                <p><?php echo $txtproyectosPendientes ?><br><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a onclick="MostrarConsulta('Views/manage.projects.view.php'); return false"; class="small-box-footer"><?php echo $txtMasInfo ?>&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo count(obtener_usuarios($conexion)) ?></h3></h3>
                <p><?php echo $txtUsuariosRegistrados ?><br><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a onclick="MostrarConsulta('Views/manage.users.view.php'); return false"; class="small-box-footer"><?php echo $txtMasInfo ?>&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo contadorRegistros($conexion, 'id','newsletter', null, null) ?></h3>
                <p><?php echo $txtSuscriptoresNewsletter ?><br><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a onclick="MostrarConsulta('Views/manage.subscriptions.view.php'); return false"; class="small-box-footer"><?php echo $txtMasInfo ?>&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo contadorRegistros($conexion, 'id','proyectos', 'idioma', 1) ?></h3>
                <p><?php echo $txtProyectosPorIdioma ?><span class="flag-icon flag-icon-es"></span><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a onclick="MostrarConsulta('Views/manage.projects.view.php'); return false"; class="small-box-footer"><?php echo $txtMasInfo ?>&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo contadorRegistros($conexion, 'id','proyectos', 'idioma', 2) ?></h3>
                <p><?php echo $txtProyectosPorIdioma ?><span class="flag-icon flag-icon-it"></span><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a onclick="MostrarConsulta('Views/manage.projects.view.php'); return false"; class="small-box-footer"><?php echo $txtMasInfo ?>&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo contadorRegistros($conexion, 'id','proyectos', 'idioma', 3) ?></h3>
                <p><?php echo $txtProyectosPorIdioma ?><span class="flag-icon flag-icon-um"></span><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a onclick="MostrarConsulta('Views/manage.projects.view.php'); return false"; class="small-box-footer"><?php echo $txtMasInfo ?>&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo contadorRegistros($conexion, 'id','proyectos', 'idioma', 4) ?></h3>
                <p><?php echo $txtProyectosPorIdioma ?><span class="flag-icon flag-icon-br"></span><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a onclick="MostrarConsulta('Views/manage.projects.view.php'); return false"; class="small-box-footer"><?php echo $txtMasInfo ?>&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

