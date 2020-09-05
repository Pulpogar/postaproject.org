<?php session_start();
require 'admin/config.php';
require 'functions.php';
require 'requirelanguage.php';
ae_nocache();

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();
// comprobarSessionActiva();

// Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

$idproyecto = obtener_max_id($conexion, 'proyectos_test', 'id');
// $idetapa = obtener_max_id($conexion, 'etapas_proyecto', 'idetapa');

// Comprobamos si los datos han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// $fecha = CURDATE();
	$titulo = limpiarDatos($_POST['titulo']);
	$autorProyecto = limpiarDatos($_POST['autorProyecto']);
	$thumb = $_FILES['thumb']['tmp_name'];
	$videorep = limpiarDatos($_POST['video']);
	$extracto = limpiarDatos($_POST['extracto']);
	$dificultad = limpiarDatos($_POST['dificultad']);
	$tags = limpiarDatos($_POST['tags']);
	$desarrollo = limpiarDatos($_POST['desarrollo']);
	$habilidades = limpiarDatos($_POST['habilidades']);
	$herramientas = limpiarDatos($_POST['herramientas']);
	$materiales = limpiarDatos($_POST['materiales']);
	$organizacionIni = limpiarDatos($_POST['organizacionIni']);
	$otherfiles = limpiarDatos($_POST['otherfiles']);

	$statement = $conexion->prepare(
		'INSERT INTO proyectos_test (id, fecha, titulo, autorProyecto, autorSubida, thumb, video, extracto, idioma, dificultad, tags, habilidades, area, categoria, subcategoria, herramientas, materiales, organizacionIni, otherfiles, desarrollo, estado) 
		VALUES (:id, now(), :titulo, :autorProyecto, :autorSubida, :thumb, :video, :extracto, 1, :dificultad, :tags, :habilidades, 1, 1, 1, :herramientas, :materiales, :organizacionIni, :otherfiles, :desarrollo, 0)'
	);

	$statement->execute(array(
		
		':id' => $idproyecto,	
		':titulo' => $titulo,
		':autorProyecto' => $autorProyecto,
		':autorSubida' => $_SESSION['nombre'],
		':thumb' => $_FILES['thumb']['name'],
		':video' => $videorep,
		':extracto' => $extracto,
		':dificultad' => $dificultad,
		':tags' => $tags,
		':habilidades' => $habilidades,
		':herramientas' => $herramientas,
		':materiales' => $materiales,
		':organizacionIni' => $organizacionIni,
		':otherfiles' => $otherfiles,
		':desarrollo' => $desarrollo

	));

echo "<script>alert('$proyectoGuardadoOk'); location.href='index.php'</script>";

}

require 'Views/new-project.view-test.php';

?>