<?php 
session_start();
require 'admin/config.php';
require 'functions.php';
ae_nocache();

$conexion = conexion($bd_config);
// $id_articulo = (int)limpiarDatos($_GET['id']);
$id_proyecto = id_proyecto($_GET['id']);

if (!$conexion) {
	header('Location: error.php');
}

if (empty($id_proyecto)) {
	header('Location: index.php');
}

$proyecto_test = obtener_proyecto_por_id_test($conexion, $id_proyecto);


$nombre = obtenerCampoPorID($conexion, 'imagenes_etapa', 'idimagen',$id_proyecto);

// $statement = $conexion->prepare("SELECT nombre FROM videos_proyecto WHERE idproyecto = $id_proyecto");
// $statement->execute();
// $videos = $statement->fetchAll();


if (!$proyecto_test) {
	// Redirigimos al index si no hay post
	header('Location: index.php');
}

$proyecto_test = $proyecto_test[0];

require 'Views/single.view-test.php';

?>