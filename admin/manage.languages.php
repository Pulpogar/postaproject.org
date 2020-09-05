<?php session_start();
require 'config.php';
require '../functions.php';
require '../requirelanguage.php';
ae_nocache();

$conexion = conexion($bd_config); 

if (!$conexion) {
  header("Location: ../error.php");
}

$sql = "SELECT idi.*, est.es as 'nomestado' FROM idiomas idi INNER JOIN estados est ON idi.estado = est.idestado";
$idiomas = obtenerRegistros($conexion, $sql);

require 'Views/manage.languages.view.php';
?>