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

$sql = "SELECT rol.*, est.es as 'nomestado' FROM roles rol INNER JOIN estados est ON rol.estado = est.idestado";
$roles = obtenerRegistros($conexion, $sql);

require 'Views/manage.roles.view.php';
?>
