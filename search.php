<?php 
session_start();
require 'admin/config.php';
require 'functions.php';
ae_nocache();

// Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: error.php');
}

// Comprobamos que haya contenido en GET
if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])){
	$busqueda = limpiarDatos($_GET['busqueda']);

	$statement =$conexion->prepare(
		"SELECT DISTINCT p.* FROM proyectos p inner join etapas_proyecto ep ON (p.id = ep.idproyecto)  WHERE estado = 1 AND (p.titulo LIKE :busqueda or extracto Like :busqueda or tags LIKE :busqueda or autorProyecto LIKE :busqueda or ep.texto LIKE :busqueda)"
	);
	$statement->execute(array(':busqueda' => "%$busqueda%"));

	$resultados = $statement->fetchAll();
	$contador_resultados = count($resultados);
	
	if (empty($resultados)) {
		$titulo = 'No se encontraron proyectos que contengan el texto: "' . utf8_encode($busqueda) . '"';
	} else {
		$titulo = 'Proyecto/s que contiene/n el texto: "' . utf8_encode($busqueda) .'"';
	}

} else {
	header('Location:' . RUTA . '/index.php');
}

require 'Views/search.view.php';

?>