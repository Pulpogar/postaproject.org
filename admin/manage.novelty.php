<?php 
// session_start();
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

$sql = "SELECT * FROM novedades";
$novedades = obtenerRegistros($conexion, $sql);

require 'Views/manage.novelty.view.php';
?>