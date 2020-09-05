<?php session_start();

require 'admin/config.php';
require 'functions.php';
require 'requirelanguage.php';
ae_nocache();


// Comprobamos si la session esta iniciada, sino, redirigimos.
// comprobarSession();

// 1.- Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

$id = limpiarDatos($_GET['id']);

// Comprobamos que exista un ID
if (!$id) {
	echo "<script> window.location.replace('admin.index.php'); </script>";
	// header('Location:' . RUTA . '/admin.index.php');
}

$statement = $conexion->prepare('UPDATE proyectos SET estado = 1 WHERE id = :id');
$statement->execute(array('id' => $id));
	echo "<script>alert('$validarProyecto'); location.href='admin.index.php'</script>";
	// echo "<script>alert('$validarProyecto')</script>";
	// echo "<script> window.location.replace('index.php'); </script>";
	// header('Location: ' . RUTA . '/index.php');



?>