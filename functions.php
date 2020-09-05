<?php
require 'requirelanguage.php';

function ae_nocache() 
{
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
}


// <?php

// $host = "localhost"; /* Host name */
// $user = "root"; /* User */
// $password = ""; /* Password */
// $dbname = "c1510706_dbposta"; /* Database name */

// $con = mysqli_connect($host, $user, $password,$dbname);
// // Check connection
// if (!$con) {
//  die("Connection failed: " . mysqli_connect_error());
// }

# Funcion para conectarnos a la base de datos.
# Return: la conexion o false si hubo un problema.
function conexion($bd_config){
	try {
		// $conexion = new PDO('mysql:host=localhost;dbname=dbposta', $bd_config['usuario'], $bd_config['pass']);	
		$conexion = new PDO('mysql:host=localhost;dbname=c1510706_dbposta', $bd_config['usuario'], $bd_config['pass']);		
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		return $conexion;

	} catch (PDOException $e) {
		return false;		
	}
}

# Funcion para limpiar y convertir datos como espacios en blanco, barras y caracteres especiales en entidades HTML.
# Return: los datos limpios y convertidos en entidades HTML.
function limpiarDatos($datos){
	// Eliminamos los espacios en blanco al inicio y final de la cadena
	$datos = trim($datos);

	// Quitamos las barras / escapandolas con comillas
	$datos = stripslashes($datos);

	// Convertimos caracteres especiales en entidades HTML (&, "", '', <, >)
	$datos = htmlspecialchars($datos);

	// Con la función utf8_decode logramos que se visualicen caracteres acentuados y ñ
	$datos = utf8_encode(utf8_decode($datos));
	// Con la funcion nl2br podemos transformar los saltos de linea en etiquetas <br>
	$datos = nl2br($datos);

	return $datos;
}

function ultimos_registros($conexion, $tabla, $limit){
	
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM $tabla
	ORDER BY fecha DESC LIMIT $limit");

	$sentencia->execute();
	return $sentencia->fetchAll();
}

Function obtenerRegistros ($conexion, $sql) {
	$resultado = $conexion->query($sql);
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

# Funcion para obtener un post por ID
# Return: El post, o false si no se encontro ningun post con ese ID.
function obtener_proyecto_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM proyectos WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

# Funcion para obtener un post por ID
# Return: El post, o false si no se encontro ningun post con ese ID.
function obtener_proyecto_por_id_test($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM proyectos_test WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}


function obtener_proyecto_por_usuario($conexion, $autorSubida){
	$resultado = $conexion->query("SELECT * FROM proyectos WHERE autorSubida = '$autorSubida' ORDER BY fecha DESC");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

// User rating
function obtener_user_rating($conexion, $id_user, $id_project){
	$sql = "SELECT * FROM project_rating WHERE postid=$id_project and userid= $id_user";
	$query = $conexion->prepare($sql);
	$query->execute();
	$row = $query->fetch();
	$userRating = $row[0];
	return ($userRating);
}
	
function obtenerISO($conexion, $tabla, $id, $filtro){
	$sql = "SELECT ISO FROM $tabla WHERE $id = $filtro";
	$query = $conexion->prepare($sql);
	$query->execute();
	$row = $query->fetch();
	$iso = $row[0];
	return ($iso);
}

// get average
function obtener_avg_rating($conexion, $id_project){
	$sql = "SELECT ROUND(AVG(rating),1) as averageRating FROM project_rating WHERE postid= $id_project";
	$query = $conexion->prepare($sql);
	$query->execute();
	$row = $query->fetch();
	$averageRating = $row[0];
	return ($averageRating);
}

function existen_registros($conexion, $tabla, $id){
	$resultado = $conexion->query("SELECT * FROM $tabla WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}


function obtener_max_id($conexion, $tabla, $campo){
	// $result = mysqli_query($conexion, "SELECT MAX($campo) FROM $tabla");
    // $row = mysqli_fetch_row($result);
	// $maxID = $row[0];
	$sql = "SELECT MAX($campo) FROM $tabla";
	$query = $conexion->prepare($sql);
    $query->execute();
	$row = $query->fetch();
	$maxID = $row[0];
	$maxID++;
	return $maxID;
}


function contador ($conexion, $tabla, $estado){

	$proyectos_totales = $conexion->prepare("SELECT COUNT(id) AS total FROM $tabla WHERE estado = $estado");
	$proyectos_totales->execute();
	$proyectos_totales = $proyectos_totales->fetch()['total'];

	//5. Calculamos el numero de paginas que habra en la paginacion

	return $proyectos_totales;
}

function contadorRegistros ($conexion, $id, $tabla, $filtro, $value){

	if (($filtro !=null) && ($value != null)){

	$registros_totales = $conexion->prepare("SELECT COUNT($id) AS total FROM $tabla WHERE $filtro = $value");
	$registros_totales->execute();
	$registros_totales = $registros_totales->fetch()['total'];
	} else {
	$registros_totales = $conexion->prepare("SELECT COUNT($id) AS total FROM $tabla");
	$registros_totales->execute();
	$registros_totales = $registros_totales->fetch()['total'];
	}

	//5. Calculamos el numero de paginas que habra en la paginacion

	return $registros_totales;
}


function obtenerCampoPorID($conexion, $tabla, $idbd, $id){
	$sql = "SELECT nombre FROM $tabla WHERE $idbd = $id";
	$query = $conexion->prepare($sql);
	$query->execute();
	$row = $query->fetch();
	$nombre = $row['nombre'];
	return ($nombre);
}


function obtenerCampoMultilenguaje($conexion, $tabla, $idbd, $id, $idioma){
	$sql = "SELECT $idioma FROM $tabla WHERE $idbd = $id";
	$query = $conexion->prepare($sql);
	$query->execute();
	$row = $query->fetch();
	$nombre = $row[$idioma];
	return ($nombre);
}

function id_proyecto($id){
	return (int)limpiarDatos($id);
}


# Funcion para obtener la pagina actual
# Return: El numero de la pagina si esta seteado, sino entonces retorna 1.
function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p']: 1; 
}

function obtener_usuarios($conexion){
	$resultado = $conexion->query("SELECT r.es as 'rol', u.* FROM usuarios u INNER JOIN roles r ON r.id = u.idrol");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}
# Funcion para obtener los post determinando cuantos queremos traer por pagina.
# Return: Los post dependiendo de la pagina que estemos y cuantos post por pagina establecimos.
function obtener_proyecto($proyectos_por_pagina, $conexion, $estado){
	//1.- Obtenemos la pagina actual
	// $pagina_actual = isset($_GET['p']) ? (int)$_GET['p']: 1;
	// Para reutilizar el codigo creamos una funcion que nos dice la pagina actual.

	//2.- Determinamos desde que post se mostrara en pantalla
	$inicio = (pagina_actual() > 1) ? (pagina_actual() * $proyectos_por_pagina - $proyectos_por_pagina) : 0;

	//3.- Preparamos nuestra consulta trayendo la informacion e indicandole desde donde y cuantas filas.
	// Ademas le pedimos que nos cuente cuantas filas tenemos.
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM proyectos where estado = $estado order by fecha desc LIMIT {$inicio}, {$proyectos_por_pagina} ");

	$sentencia->execute();
	return $sentencia->fetchAll();
}

# Funcion para calcular el numero de paginas que tendra la paginacion.
# Return: El numero de paginas
function numero_paginas($proyectos_por_pagina, $conexion){
	//4.- Calculamos el numero de filas / articulos que nos devuelve nuestra consulta
	$total_post = $conexion->prepare('SELECT count(id) as total from proyectos');
	$total_post->execute();
	$total_post = $total_post->fetch()['total'];
	//5. Calculamos el numero de paginas que habra en la paginacion
	$numero_paginas = ceil($total_post / $proyectos_por_pagina);
	return $numero_paginas;
}

# Funcion para traducir la fecha de formato timestamp a español.
# Return: La fecha en español.
function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp);

	// -1 porque los meses en la funcion date empiezan desde el 1
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = $dia . ' de ' . $meses[$mes] . ' del ' . $year;
	return $fecha;
}

# Funcion para comprobar la session del admin
function comprobarSessionAdmin(){
	// Comprobamos si la session esta iniciada
	if (!isset($_SESSION['admin'])) {
		echo "<script>alert('Debes iniciar sesión'); location.href='login.php'</script>";
		// echo "<script> window.location.replace('login.php'); </script>";
	} 
}

function comprobarSession(){
	// Comprobamos si la session esta iniciada
	if (!isset($_SESSION['loggedin'])) {
		// echo "header('Location:' . RUTA . '/login.php')";

		echo "<script>alert('Debes iniciar sesión'); location.href='login.php'</script>";
		// echo "<head><meta http-equiv='refresh' content='0; url=login.php'></head>";
	} 
}
function comprobarSessionActiva(){
					if(isset($_SESSION['tiempo']) ) {

						//Tiempo en segundos para dar vida a la sesión.
						$inactivo = 10;//10 segundos en este caso.
							

						//Calculamos tiempo de vida inactivo.
						$vida_session = time() - $_SESSION['tiempo'];

						//Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
						if($vida_session > $inactivo)
						{ 
							//Removemos sesión.
							session_unset();
							//Destruimos sesión.
							session_destroy();             
							//Redirigimos pagina.
							echo "<script> window.location.replace('login.php'); </script>";

							exit();
							
						}
						
				}
				$_SESSION['tiempo'] = time();

}
?>