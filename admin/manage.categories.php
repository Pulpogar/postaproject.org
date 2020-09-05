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
$sqlCategorias = "SELECT categorias.*, est.es as 'txtEstado' FROM categorias INNER JOIN estados est ON categorias.estado = est.idestado";

$categorias = obtenerRegistros($conexion, $sqlCategorias);

$sqlSubcategorias = "SELECT c.id AS 'idcat', s.id AS 'idsub', s.es as 'nombEs', s.en as 'nombEn', s.it as 'nombIt', s.br as 'nombBr', s.idcategoria, e.es FROM categorias c
INNER JOIN subcategorias s ON c.id = s.idcategoria
INNER JOIN estados e ON s.estado = e.idestado";

$subcategorias = obtenerRegistros($conexion, $sqlSubcategorias);

require 'Views/manage.categories.view.php';
?>