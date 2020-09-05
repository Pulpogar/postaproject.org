<?php session_start();
require 'admin/config.php';
require 'functions.php';
ae_nocache();

// 1.- Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

// Comprobamos si la session esta iniciada, sino, redirigimos.
// comprobarSession();
// comprobarSessionActiva();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Limpiamos los datos para evitar que el usuario inyecte codigo.
	$txtEs = limpiarDatos($_POST['es']);
	$txtEn = limpiarDatos($_POST['en']);
	$txtIt = limpiarDatos($_POST['it']);
	$txtBr = limpiarDatos($_POST['br']);


	$idRol = limpiarDatos($_POST['id']);


	$statement = $conexion->prepare('UPDATE roles SET id=:id, es=:es, en=:en, it=:it, br=:br, estado=:estado WHERE id = :id');
	$statement->execute(array(
		':id' => $idRol,
		':es' => $txtEs,
		':en' => $txtEn,
		':it' => $txtIt,
		':br' => $txtBr,
		':estado' => '1'
	));

	header("Location: " . RUTA . '/admin.index.php');

} else {
	$id_rol = id_rol($_GET['id']);

	if (empty($id_rol)) {
		header('Location: ' . RUTA . '/admin');
	}

	// Obtenemos el post por id
	$proyecto = obtener_proyecto_por_id($conexion, $id_proyecto);

	// Si no hay post en el ID entonces redirigimos.
	if (!$rol) {
		header('Location: ' . RUTA . '/admin/index.php');
	}
	$rol = $rol[0];
}

require 'Views/edit-rol.view.php';

?>