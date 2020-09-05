<?php 
require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

if (!$conexion) {
	header('Location: error.php');
	die('Problemas con la conexion');
}

// Obtenemos las novedades
$sql= "SELECT * FROM novedades";
$novedade = obtenerRegistros ($conexion, $sql);
$cantidadNovedades = count($novedade);
// var_dump($novedades);



// Si no hay novedades entonces redirigimos
if(!$novedade){
	header('Location: index.php');
}

include 'Views/novelty.view.php';

?>