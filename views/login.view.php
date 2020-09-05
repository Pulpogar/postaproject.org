<?php require 'requirelanguage.php';?>
<?php require 'Views/Layouts/head-adminlte.php';?>

<!DOCTYPE html>
<html>
</head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148932330-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-148932330-1');
	</script>
</head><br><br>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="index.php"><img class="img-fluid" src="images/O Posta.png" alt=""> | Login</a> -->
    <a href="index.php"><i class="ti-lock"></i>&nbsp<b>POSTA</b> | Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo $txtLogin ?></p>

							<form action="./check-login.php" method="post">
								<div class="form-group has-feedback">
        <input name="user" type="text" class="form-control" placeholder='<?php echo $usuario ?>'>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder='<?php echo $password ?>'>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> <?php echo $recuerdame ?>
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="ti-unlock"></i>&nbsp<?php echo $ingresar ?></button>
        </div>
      </div>
    </form>
    <a href="#"><?php echo $OlvideContraseña ?></a><br>
    <a href="register.php" class="text-center"><?php echo $RegistrarCuenta ?></a>
  </div>
</div>
</body>
</html>

<?php require 'Views/Layouts/scripts-adminlte.php';?>