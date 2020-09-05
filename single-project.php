<?php 
session_start();
require 'admin/config.php';
require 'functions.php';
ae_nocache();

$conexion = conexion($bd_config);
$id_proyecto = id_proyecto($_GET['id']);

if (!$conexion) {
	header('Location: error.php');
}

if (empty($id_proyecto)) {
	header('Location: index.php');
}

$proyecto = obtener_proyecto_por_id($conexion, $id_proyecto);

$statement = $conexion->prepare("SELECT nombre FROM imagenes_etapa WHERE idproyecto = $id_proyecto");
$statement->execute();
$imagenes = $statement->fetchAll();

$statement = $conexion->prepare("SELECT enlace FROM videos_etapa WHERE idproyecto = $id_proyecto");
$statement->execute();
$videos = $statement->fetchAll();

$statement = $conexion->prepare("SELECT * FROM etapas_proyecto WHERE idproyecto = $id_proyecto");
$statement->execute();
$etapas = $statement->fetchAll();

$nombre = obtenerCampoPorID($conexion, 'imagenes_etapa', 'idimagen',$id_proyecto);

$statement = $conexion->prepare("SELECT * FROM novedades ORDER BY createdAt DESC LIMIT 1");
$statement->execute();
$novedad = $statement->fetch();

if (!$proyecto) {
	// Redirigimos al index si no hay post
	header('Location: index.php');
}

$proyecto = $proyecto[0];

require 'Views/single-project.view.php';

?>