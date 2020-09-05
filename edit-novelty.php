<?php session_start();
require 'admin/config.php';
require 'functions.php';
ae_nocache();

$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

// Comprobamos si la session esta iniciada, sino, redirigimos.
// comprobarSession();
// comprobarSessionActiva();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$titulo = limpiarDatos($_POST['titulo']);
	$contenido = limpiarDatos($_POST['contenido']);
	$idioma = limpiarDatos($_POST['idioma']);

	$statement = $conexion->prepare('UPDATE novedades SET id=:id, titulo=:titulo, contenido=:contenido, idioma=:idioma WHERE id = :id');
	$statement->execute(array(
		':id' => $id,		
		':titulo' => $titulo,
		':contenido' => $contenido,
		':idioma' => $idioma
	));

	header("Location: " . RUTA . '/admin.index.php');

} else {
	$idnovedad = id_proyecto($_GET['id']);

	if (empty($idnovedad)) {
		header('Location: ' . RUTA . '/admin');
	}

	$statement = $conexion->prepare("SELECT * FROM novedades WHERE id=$idnovedad");
	$statement->execute();
	$novedad = $statement->fetch();
	
	if (!$novedad) {
		// Redirigimos al index si no hay post
		header('Location: index.php');
	}
}

require 'Views/edit-novelty.view.php';

?>