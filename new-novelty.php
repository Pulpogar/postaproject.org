<?php session_start();
require 'admin/config.php';
require 'functions.php';
require 'requirelanguage.php';
ae_nocache();

$conexion = conexion($bd_config);

if (!$conexion) {
  header("Location: ../error.php");
}

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();
// comprobarSessionActiva();

$idnovedad = obtener_max_id($conexion, 'novedades', 'id');

// Comprobamos si los datos han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// $fecha = CURDATE();
	$tituloNovedad = limpiarDatos($_POST['tituloNovedad']);
  $thumb = $_FILES['imgRepNovelty']['tmp_name'];
  // $idiomaNovedad = limpiarDatos($_POST['idiomaNovedad']);
	$resumenNovedad = limpiarDatos($_POST['resumenNovedad']);
	$desarrolloNovedad = limpiarDatos($_POST['desarrolloNovedad']);

	// Direccion final del archivo incluyendo el nombre
	# Importante recordar que este archivo se encuentra dentro de la carpeta admin, asi que
	# tenemos que concatenar al inicio '../' para bajar a la raiz de nuestro proyecto.
	$imagen_representativa = $blog_config['carpeta_imagenes_novedades'] . $_FILES['imgRepNovelty']['name'];

	// // Subimos el archivo
	move_uploaded_file($thumb, $imagen_representativa);

	$statement = $conexion->prepare(
		'INSERT INTO novedades (id, titulo, resumen, imgRepresentativa, contenido, idioma, createdBy, uploadedBy, createdAt) 
		VALUES (:id, :titulo, :resumen, :imgRepresentativa, :contenido, 1, :createdBy, :uploadedBy, NOW())'
	);

	$statement->execute(array(
		
		':id' => $idnovedad,
    ':titulo' => $tituloNovedad,
    ':resumen' => $resumenNovedad,
		':imgRepresentativa' => $_FILES['imgRepNovelty']['name'],
    ':contenido' => $desarrolloNovedad,
    ':createdBy' => $_SESSION['id'],
    ':uploadedBy' => $_SESSION['id']    
  ));
  
}

require 'Views/new-novelty.view.php';
?>
