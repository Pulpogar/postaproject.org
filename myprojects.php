<?php 
session_start();
require 'admin/config.php';
require 'functions.php';
ae_nocache();

$conexion = conexion($bd_config);

if (!$conexion) {
	header('Location: error.php');
}

// Obtenemos los post
$proyectos = obtener_proyecto_por_usuario($conexion, $_SESSION['nombre']);

if(!$proyectos){
	$cant_proyectos = 0;
}else{
	$cant_proyectos = count($proyectos);
}
$contador = 0;
$text = "<br>";

// Si no hay post entonces redirigimos
// if(!$proyectos){
// 	header('Location: error.php');
// }

require 'Views/myprojects.view.php';

?>