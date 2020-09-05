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

$idproyecto = obtener_max_id($conexion, 'proyectos', 'id');
$idetapa = obtener_max_id($conexion, 'etapas_proyecto', 'idetapa');

// var_dump($idproyecto);

// Comprobamos si los datos han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// $fecha = CURDATE();
	$titulo = limpiarDatos($_POST['titulo']);
	$autorProyecto = limpiarDatos($_POST['autorProyecto']);
	$thumb = $_FILES['thumb']['tmp_name'];
	$imagenes = $_FILES["uploadFile"]["tmp_name"];
	$contador_img = count($_FILES["uploadFile"]["tmp_name"]);
	// var_dump($imagenes);
	// var_dump($contador_img);
	$videorep = limpiarDatos($_POST['video']);
	$extracto = limpiarDatos($_POST['extracto']);
	//en este caso asigno los elementos del arreglo que se llama tienda a la variable texto
	$texto = implode(',', $_POST['field_name']);
	limpiarDatos($texto);
	// utf8_encode($texto);
	//esta linea cuenta cuantos elementos tiene nuestro arreglo
	$count = count($_POST['field_name']);
	// var_dump($count);
	// var_dump($_POST['field_name']);
	// $idioma = limpiarDatos($_POST['idioma']);
	$dificultad = limpiarDatos($_POST['dificultad']);
	$tags = limpiarDatos($_POST['tags']);
	$habilidades = limpiarDatos($_POST['habilidades']);
	// $area = limpiarDatos($_POST['areapp']);
	// $categoria = limpiarDatos($_POST['categorias']);
	// $subcategoria = limpiarDatos($_POST['subcategorias']);
	$herramientas = limpiarDatos($_POST['herramientas']);
	$materiales = limpiarDatos($_POST['materiales']);
	$organizacionIni = limpiarDatos($_POST['organizacionIni']);
	$videos = $_POST['url_video'];
	$contador_videos = count($_POST['url_video']);
	$otherfiles = limpiarDatos($_POST['otherfiles']);


	// Direccion final del archivo incluyendo el nombre
	# Importante recordar que este archivo se encuentra dentro de la carpeta admin, asi que
	# tenemos que concatenar al inicio '../' para bajar a la raiz de nuestro proyecto.
	$imagen_representativa = $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

	// // Subimos el archivo
	move_uploaded_file($thumb, $imagen_representativa);

	$statement = $conexion->prepare(
		'INSERT INTO proyectos (id, fecha, titulo, autorProyecto, autorSubida, thumb, video, extracto, idioma, dificultad, tags, habilidades, area, categoria, subcategoria, herramientas, materiales, organizacionIni, imagenes, videos, video1, video2, video3, video4, otherfiles, estado) 
		VALUES (:id, now(), :titulo, :autorProyecto, :autorSubida, :thumb, :video, :extracto, 1, :dificultad, :tags, :habilidades, 1, 1, 1, :herramientas, :materiales, :organizacionIni, null, null, null, null, null, null, :otherfiles, 0)'
	);

	$statement->execute(array(
		
		':id' => $idproyecto,
		// ':fecha' => $fecha,		
		':titulo' => $titulo,
		':autorProyecto' => $autorProyecto,
		':autorSubida' => $_SESSION['nombre'],
		':thumb' => $_FILES['thumb']['name'],
		':video' => $videorep,
		':extracto' => $extracto,
		// ':idioma' => $idioma,
		':dificultad' => $dificultad,
		':tags' => $tags,
		':habilidades' => $habilidades,
		// ':area' => $area,
		// ':categoria' => $categoria,
		// ':subcategoria' => $subcategoria,
		':herramientas' => $herramientas,
		':materiales' => $materiales,
		':organizacionIni' => $organizacionIni,
		// ':video1' => $video1,
		// ':video2' => $video2,
		// ':video3' => $video3,
		// ':video4' => $video4,
		':otherfiles' => $otherfiles

	));


// Aqui va a insertar un insert por cada uno de los elementos contados anteriormente
$idetapa = 0;
for($j = 0; $j < $count; $j++) // j=0 0 1, j=1 1 2, j=2 2 3, j=3 3 4
{
$idetapa++;
//traigo los elementos de la lista y se los asigno a la variable idtienda

$titulo = limpiarDatos($_POST['field_name'][$j]);
$texto = limpiarDatos($_POST['field_name'][$j+1]);

//consulta mysql que insertara una vez por cada elemento
$statement2 = $conexion->prepare(
	'INSERT INTO etapas_proyecto (idetapa, idproyecto, titulo, texto) 
	VALUES (:idetapa, :idproyecto, :titulo, :texto)'
);

$statement2->execute(array(
	
	':idetapa' => $idetapa,
	':idproyecto' => $idproyecto,
	// ':fecha' => $fecha,		
	':titulo' => $titulo,
	':texto' => $texto
	
));
$j++;
}

// if (($_FILES["uploadFile"]["type"] == "image/pjpeg")
//     || ($_FILES["uploadFile"]["type"] == "image/jpeg")
//     || ($_FILES["uploadFile"]["type"] == "image/png")
// 	|| ($_FILES["uploadFile"]["type"] == "image/gif")
// 	|| ($_FILES["uploadFile"]["name"]["type"] == "image/jpg")) {

		//con estas variables generaremos un codigo que vamos a unir como nombre a la imagen
        //de esta manera evitaremos problemas con los nombres de las imagenes
        
        //esta es la ruta donde copiaremos la imagen
        //recuerden que deben crear un directorio con este mismo nombre
        //en el mismo lugar donde se encuentra el archivo subir.php

		for($i=0;$i<count($_FILES["uploadFile"]["name"]);$i++)
		{
			$idimagen = obtener_max_id($conexion, 'imagenes_etapa', 'idimagen');
			$uploadfile=$_FILES["uploadFile"]["tmp_name"][$i];
			$folder="images/";
			$fechaactual  = date("dHi");  //Fecha Actual       
			$no_aleatorio  = rand(10, 99); //Generamos dos Digitos aleatorios
			move_uploaded_file($_FILES["uploadFile"]["tmp_name"][$i], "$folder".$fechaactual.$no_aleatorio.$_FILES["uploadFile"]["name"][$i]);
		
			
			$statement3 = $conexion->prepare(
				'INSERT INTO imagenes_etapa (idimagen, idproyecto, nombre) 
				VALUES (:idimagen, :idproyecto, :nombre)'
			);
		
			$statement3->execute(array(
				
				':idimagen' => $idimagen,
				':idproyecto' => $idproyecto,
				':nombre' => $fechaactual.$no_aleatorio.$_FILES["uploadFile"]["name"][$i]
				
			));
			$idimagen++;
		};
	// }


for($j = 0; $j < $contador_videos; $j++) // j=0 0 1, j=1 1 2, j=2 2 3, j=3 3 4
{
	$idvideo = obtener_max_id($conexion, 'videos_etapa', 'idvideo');

//traigo los elementos de la lista y se los asigno a la variable idtienda

$enlace = ($_POST['url_video'][$j]);

//consulta mysql que insertara una vez por cada elemento
$statement2 = $conexion->prepare(
	'INSERT INTO videos_etapa (idvideo, idproyecto, enlace) 
	VALUES (:idetapa, :idproyecto, :enlace)'
);

$statement2->execute(array(
	
	':idetapa' => $idvideo,
	':idproyecto' => $idproyecto,
	// ':fecha' => $fecha,		
	':enlace' => $enlace
	
));
$idvideo++;
}
// Email test
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "no-reply@postaproject.org";
$to = "info@postaproject.org";
$subject = "NUEVO PROYECTO CARGADO";
$msg = "¡Hola administrador!\n\nSe ha cargado un nuevo proyecto a POSTA,\nel mismo está pendiente de validación.\n\n[Mensaje generado automáticamente]";
$message = utf8_decode($msg);
$headers = "From:" . $from;
mail($to,$subject,$message, $headers);
echo "<script>alert('$proyectoGuardadoOk'); location.href='index.php'</script>";
// header('Location: index.php');
}
require 'Views/new-project.view.php';

?>