<?php 
session_start();
require 'admin/config.php';
require 'functions.php';
ae_nocache();

$conexion = conexion($bd_config);
$idnovedad = id_proyecto($_GET['id']);

if (!$conexion) {
	header('Location: error.php');
}

if (empty($idnovedad)) {
	header('Location: index.php');
}

$statement = $conexion->prepare("SELECT * FROM novedades WHERE id=$idnovedad");
$statement->execute();
$novedad = $statement->fetch();

if (!$novedad) {
	// Redirigimos al index si no hay post
	header('Location: index.php');
}

require 'Views/single-novelty.view.php';

?>