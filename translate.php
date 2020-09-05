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


// Determinamos si se estan enviado datos por el metodo POST o GET
# Si se envian por POST significa que el usuario los ha enviado desde el formulario
# por lo que tomamos los datos y los cambiamos en la base de datos.

# De otra forma significa que hay datos enviados por el metodo GET
# es decir, el ID que pasamos por la URL, si es asi entonces traemos los 
# datos de la base de datos a pantalla para que el usuario los pueda modificar.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Limpiamos los datos para evitar que el usuario inyecte codigo.
	$titulo = limpiarDatos($_POST['titulo']);
	$autor = limpiarDatos($_POST['autor']);
	// $thumb = $_FILES['thumb']['tmp_name'];
	// $video = limpiarDatos($_POST['video']);
	$extracto = limpiarDatos($_POST['extracto']);
	// $idioma = limpiarDatos($_POST['idioma']);
	// $dificultad = limpiarDatos($_POST['dificultad']);
	$tags = limpiarDatos($_POST['tags']);
	$habilidades = limpiarDatos($_POST['habilidades']);
	// $area = limpiarDatos($_POST['areapp']);
	// $categoria = limpiarDatos($_POST['categorias']);
	// $subcategoria = limpiarDatos($_POST['subcategorias']);
	$herramientas = limpiarDatos($_POST['herramientas']);
	$materiales = limpiarDatos($_POST['materiales']);
	$organizacionIni = limpiarDatos($_POST['organizacionIni']);
	// $texto = limpiarDatos($_POST['texto']);
	// $otherfiles = limpiarDatos($_POST['otherfiles']);
	// Con la funcion nl2br podemos transformar los saltos de linea en etiquetas <br>
	// $texto = nl2br($_POST['texto']);
	$texto = limpiarDatos($_POST['texto']);
	$idproyecto = limpiarDatos($_POST['id']);
	// $thumb_guardada = $_POST['thumb-guardada'];
	// $thumb = $_FILES['thumb'];

	# Comprobamos que el nombre del thumb no este vacio, si lo esta
	# significa que el usuario no agrego una nueva thumb y entonces utilizamos la thumb anterior.

	// if (empty($thumb['name'])) {
	// 	$thumb = $thumb_guardada;
	// } else {

		// De otra forma cargamos la nueva thumb
		// Direccion final del archivo incluyendo el nombre
		# Importante recordar que este archivo se encuentra dentro de la carpeta admin, asi que
		# tenemos que concatenar al inicio '../' para bajar a la raiz de nuestro proyecto.

		// $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

		// move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);
		// $thumb = $_FILES['thumb']['name'];

	// }

	$statement = $conexion->prepare('UPDATE proyectos SET id=:id, titulo=:titulo, autor=:autor, extracto=:extracto, tags=:tags, habilidades=:habilidades, herramientas=:herramientas, materiales=:materiales, organizacionIni=:organizacionIni, texto=:texto, estado=0  WHERE id = :id');
	$statement->execute(array(
		':id' => $idproyecto,
		// ':fecha' => $fecha,		
		':titulo' => $titulo,
		':autor' => $autor,
		// ':thumb' => $_FILES['thumb']['name'],
		// ':video' => $video,
		':extracto' => $extracto,
		// ':idioma' => $idioma,
		// ':dificultad' => $dificultad,
		':tags' => $tags,
		':habilidades' => $habilidades,
		// ':area' => $area,
		// ':categoria' => $categoria,
		// ':subcategoria' => $subcategoria,
		':herramientas' => $herramientas,
		':materiales' => $materiales,
		':organizacionIni' => $organizacionIni,
		':texto' => $texto
		// ':otherfiles' => $otherfiles
		// ':thumb' => $thumb,

	));

	header("Location: " . RUTA . '/admin.index.php');

} else {
	$id_proyecto = id_proyecto($_GET['id']);

	if (empty($id_proyecto)) {
		header('Location: ' . RUTA . '/admin');
	}

	// Obtenemos el post por id
	$proyecto = obtener_proyecto_por_id($conexion, $id_proyecto);

	// Si no hay post en el ID entonces redirigimos.
	if (!$proyecto) {
		header('Location: ' . RUTA . '/admin/index.php');
	}
	$proyecto = $proyecto[0];
}
$statement = $conexion->prepare("SELECT * FROM etapas_proyecto WHERE idproyecto = $id_proyecto");
$statement->execute();
$etapas = $statement->fetchAll();

require 'Views/translate.view.php';

?>