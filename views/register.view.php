<?php require 'requirelanguage.php'; ?>
<?php require 'Views/Layouts/head-adminlte.php';?>

<!DOCTYPE html>
<html lang="es">
<head>
  	<!-- <script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-148932330-1');
	</script> -->
</head>
<br>
<br>
<body class="hold-transition register-page">

<!-- <body onload="location.reload(true)" class="hold-transition register-page"> -->
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><i class="ti-id-badge"></i>&nbsp<b>POSTA</b> | <?php echo $registro ?></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg"><i class="ti-plus"></i>&nbsp<?php echo $RegistrarCuenta ?></p>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 name">
              <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder='<?php echo $nombre ?>' required="">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 name">
              <div class="form-group has-feedback">
                <input type="text" name="apellido" class="form-control" placeholder='<?php echo $apellido ?>' required="">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
            </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 name">
          <h5><?php echo $fechaNacimiento ?></h5>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 name">
          <input type="date" name="fechaNacimiento" class="form-control" placeholder='<?php echo $nombreCompleto ?>' required=""> 
        </div>
      </div>
      <br>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder='<?php echo $direccionEmail ?>' required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
													<select class="form-control" name="nacionalidad" id="nacionalidad">
														<?php
															$conexion = mysqli_connect("localhost", $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
													
															$query = $conexion->query("SELECT * FROM paises");

															echo '<option value="0">'. $nacionalidad .'</option>';

															while ( $row = $query->fetch_assoc() )
															{
																echo '<option value="' . $row['idpais']. '">' . utf8_encode($row['nombre']) . '</option>' . "\n";
															} ?>
													</select> 
			</div>
      <div class="form-group has-feedback">
        <input type="text" minlenght="4" maxlength="17" name="user" class="form-control" placeholder='<?php echo $usuario ?>' required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 name">
              <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder='<?php echo $password ?>' required="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 name">
              <div class="form-group has-feedback">
                <input type="password" name="password2" class="form-control" placeholder='<?php echo $repetirContraseña ?>' required="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
            </div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> <?php echo $aceptoTerminos ?> <a href="#"><?php echo $terminos ?></a>
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="ti-check-box"></i>&nbsp<?php echo $registrar ?></button>
        </div>
      </div>
    </form>

    <div class="social-auth-links text-center">
      <!-- <p>- O -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> <?php echo $registroFacebook ?></a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> <?php echo $registroGoogle ?></a> -->
    </div>

    <a href="login.php" class="text-center"><?php echo $yaRegistrado ?></a>
  </div>
  <br><br><br>
</div>

</body>
</html>

<?php require 'Views/Layouts/scripts-adminlte.php';?>