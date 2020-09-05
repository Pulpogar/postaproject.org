<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>



<?php session_start();
require 'admin/config.php';
require 'functions.php';
require 'requirelanguage.php';
ae_nocache();

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();
// comprobarSessionActiva();

// Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

$idproyecto = obtener_max_id($conexion, 'proyectos', 'id');

// var_dump($idproyecto);

// Comprobamos si los datos han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titulo = limpiarDatos($_POST['titulo']);
	
	$statement = $conexion->prepare(
		'INSERT INTO proyectos (id, fecha, titulo, autorProyecto, autorSubida, thumb, video, extracto, idioma, dificultad, tags, habilidades, area, categoria, subcategoria, herramientas, materiales, organizacionIni, imagenes, videos, video1, video2, video3, video4, otherfiles, estado) 
		VALUES (:id, now(), :titulo, null, :autorSubida, :thumb, null, null, 1, 1, null, null, 1, 1, 1, null, null, null, null, null, null, null, null, null, null, 0)'
	);

	$statement->execute(array(
		
		':id' => $idproyecto,
		':titulo' => $titulo,
		':autorSubida' => $_SESSION['nombre'],
		':thumb' => 'nothumb370x300.png'

	));

// Email test
// ini_set( 'display_errors', 1 );
// error_reporting( E_ALL );
// $from = "no-reply@postaproject.org";
// $to = "info@postaproject.org";
// $subject = "NUEVO PROYECTO CARGADO";
// $msg = "¡Hola administrador!\n\nSe ha cargado un nuevo proyecto a POSTA,\nel mismo está pendiente de validación.\n\n[Mensaje generado automáticamente]";
// $message = utf8_decode($msg);
// $headers = "From:" . $from;
// mail($to,$subject,$message, $headers);



// success notification
// Shorthand for:
// alertify.notify( message, 'success', [wait, callback]);

//   echo '<script type="text/javascript">';
//   echo 'setTimeout(function () { swal.fire("WOW!","Message!","success");';
//   echo '}, 1000);location.href="index.php"</script>';

// echo '<script type="text/javascript">
//   					swal("", "Éxito", "success");
// 					  </script>';
					  

// echo "<script>alertify.success('Success message'); location.href='index.php'</script>";

echo "<script>alert('$proyectoGuardadoOk'); location.href='edit.php?id=$idproyecto;'</script>";

}
// require 'Views/modals/new-project.modal.php';

?>