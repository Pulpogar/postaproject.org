<?php
session_start();
require 'admin/config.php';
require 'functions.php';
ae_nocache();?>
	
			<?php

			$errores = '';
			// Connection info. file
			// include 'conn.php';	
			$conexion = conexion($bd_config);
			// Connection variables
			$conn = mysqli_connect("localhost", $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
			// $conn = mysqli_connect("localhost", "c1510706_dbposta", "zemasa82VO", "c1510706_dbposta");

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			$idLog = obtener_max_id($conexion, 'logs', 'idlog');

			// data sent from form login.html 
			$usuario = $_POST['user']; 
			$password = $_POST['password'];
			
			// Query sent to database
			$result = mysqli_query($conn, "SELECT * FROM usuarios WHERE user = '$usuario'");
			
			
			// Variable $row hold the result of the query
			$row = mysqli_fetch_assoc($result);
			
			
			// Variable $hash hold the password hash on database
			$hash = $row['pass'];
			
			/* 
			password_Verify() function verify if the password entered by the user
			match the password hash on the database. If everything is OK the session
			is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
			*/
			if (password_verify($_POST['password'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['user'] = $row['user'];
				$_SESSION['nombre'] = $row['nombre'];
				$_SESSION['apellido'] = $row['apellido'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
				$_SESSION['rol'] = $row['idrol'];
				$_SESSION['id'] = $row['idusuario'];

				$statement = $conexion->prepare('INSERT INTO logs (idlog, idusuario, username, rol, actionLog, descriptionLog, dateLog) VALUES (:idlog, :idusuario, :username, :rol, :actionLog, :descriptionLog, now())');
				$statement->execute(array(
					':idlog' => $idLog,
					':idusuario' => $_SESSION['id'],
					':username' => $_SESSION['user'],
					':rol' => $_SESSION['rol'],							
					':actionLog' => "LOGIN",
					':descriptionLog' => utf8_encode(utf8_decode("Inicio de sesión"))
					));

					// Roles posibles:
					// 1 - Administrador
					// 2 - Validador
					// 3 - Maker
					// 4 - Usuario
					// 5 - Traductor

						if ($_SESSION['rol'] == 1) {
							$_SESSION["admin"] = TRUE;
						echo "<script> window.location.replace('admin/admin.index.php'); </script>";
						}
						elseif ($_SESSION['rol'] == 2) {
						echo "<script> window.location.replace('new-project.php'); </script>";
						}
						elseif ($_SESSION['rol'] == 3) {
							echo "<script> window.location.replace('new-project.php'); </script>";
						}
						elseif ($_SESSION['rol'] == 4) {
							// echo "<script> window.location.replace('new-project.php'); </script>";
							echo "<script> window.location.replace('index.php'); </script>";
						}
						elseif ($_SESSION['rol'] == 5) {
							echo "<script> window.location.replace('new-project.php'); </script>";
						}
						
				// header('Location: '. RUTA . '/new-project.php');
				// echo "<div class='alert alert-success mt-4' role='alert'><strong>Welcome!</strong> $row[nombre]			
				// <h6>Atencion: Esto es un panel de usuario provisorio</h6>
				// <p><a href='error-no-disponible.php'>Editar perfil</a></p>
				// <p><a href='new-project.php'>Nuevo proyecto</a></p>
				// <p><a href='logout.php'>Salir</a></p></div>";

			} else {
				echo "<div class='alert alert-danger mt-4' role='alert'>El Usuario o Password es incorrecto!
				<p><a href='login.php'><strong>Por favor intenta nuevamente</strong></a></p></div>";			
			}	
			?>
