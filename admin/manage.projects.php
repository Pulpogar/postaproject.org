<?php session_start();
require 'config.php';
require '../functions.php';
require '../requirelanguage.php';
ae_nocache();

$conexion = conexion($bd_config);

// Comprobamos si la session esta iniciada, sino, redirigimos.
// comprobarSessionAdmin();
// comprobarSessionActiva();


// if ( isset( $_SESSION['logged'] ) ) {

//    // Sesión activa
// }
// else{

//    // Sesión inactiva  
//    header("Location: /login.php");
// }


if (!$conexion) {
  header("Location: ../error.php");
}
$estadoV = 1;
$estadoNV = 0;
$inicio = 1;
$sqlV= "SELECT * FROM proyectos where estado = $estadoV order by fecha desc";
$sqlNV= "SELECT * FROM proyectos where estado = $estadoNV order by fecha desc";
$proyectos = obtener_proyecto($blog_config['proyectos_por_pagina'], $conexion, 1,$sqlV);
$pendientes = obtener_proyecto($blog_config['proyectos_por_pagina'], $conexion, 0,$sqlNV);

require 'Views/manage.projects.view.php';
?>