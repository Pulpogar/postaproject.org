<?php session_start();
require 'config.php';
require '../../functions.php';
require '../../requirelanguage.php';
ae_nocache();

$conexion = conexion($bd_config);

if (!$conexion) {
  header("Location: ../error.php");
}

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();
// comprobarSessionActiva();

$idrol = obtener_max_id($conexion, 'roles', 'id');

// Comprobamos si los datos han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// $fecha = CURDATE();
	$idrol= limpiarDatos($_POST['id']);
	$nombreRolEs = limpiarDatos($_POST['nombreRolEs']);
	$nombreRolEn = limpiarDatos($_POST['nombreRolEn']);
	$nombreRolIt = limpiarDatos($_POST['nombreRolIt']);
	$nombreRolPt = limpiarDatos($_POST['nombreRolPt']);

	$statement = $conexion->prepare(
		"UPDATE roles SET es=:es, en=:en, it=:it, br=:br, estado=1 WHERE id='$idrol'" 
	);

	$statement->execute(array(
		
	':id' => $idrol,
	':es' => $nombreRolEs,
	':en' => $nombreRolEn,
	':it' => $nombreRolIt,
	':br' => $nombreRolPt
 
  ));
  echo "<script> window.location.replace('../admin.index.php'); </script>";
}
// require 'Views/new-novelty.view.php';
?>
