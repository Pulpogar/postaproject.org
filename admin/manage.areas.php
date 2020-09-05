<?php session_start();
require 'config.php';
require '../functions.php';
require '../requirelanguage.php';
ae_nocache();

$conexion = conexion($bd_config); 

if (!$conexion) {
  header("Location: ../error.php");
}

$sql = "SELECT area.*, est.es as 'nomestado' FROM areas area INNER JOIN estados est ON area.estado = est.idestado";

$areas = obtenerRegistros($conexion, $sql);

require 'Views/manage.areas.view.php';
?>