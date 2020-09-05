<?php session_start();

require 'functions.php';
require 'admin/config.php';
require 'requirelanguage.php';

// $conexion = mysqli_connect("localhost", "root", "", "dbposta");
$conexion = conexion($bd_config);
// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda volver a registrar un usuario.
if (isset($_SESSION['user'])) {
  header('Location:' . RUTA . '/index.php');
  die();
}

$idusuario = obtener_max_id($conexion, 'usuarios', 'idusuario');
// var_dump($idusuario);


// Comprobamos si ya han sido enviado los datos
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Validamos que los datos hayan sido rellenados
  $user = limpiarDatos(strtolower($_POST['user']), FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $email = limpiarDatos($_POST['email']);
  $nombre = limpiarDatos($_POST['name']);
  $apellido = limpiarDatos($_POST['apellido']);
  $fechaNacimiento = limpiarDatos($_POST['fechaNacimiento']);
  $nacionalidad = limpiarDatos($_POST['nacionalidad']);
  
  $errores = '';

  // Comprobamos que ninguno de los campos este vacio.
  if (empty($user) or empty($password) or empty($password2)) {
    $errores = '<li>Por favor rellena todos los datos correctamente</li>';
  } else {

    // Comprobamos que el usuario no exista ya.
    try {
      // $conexion = new PDO('mysql:host=localhost;dbname=dbposta', 'root', '');
      // $conexion = new PDO('mysql:host=localhost;dbname=dbposta', 'root', '');
      $conexion = new PDO('mysql:host=localhost;dbname=c1510706_dbposta', 'c1510706_dbposta', 'zemasa82VO');
    } catch (PDOException $e) {
      echo "Error:" . $e->getMessage();
    }

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE user = :user LIMIT 1');
    $statement->execute(array(':user' => $user));

    // El metodo fetch nos va a devolver el resultado o false en caso de que no haya resultado.
    $resultado = $statement->fetch();

    // Si resultado es diferente a false entonces significa que ya existe el usuario.
    if ($resultado != false) {
      $errores .= '<li>El nombre de usuario ya existe</li>';
    }

    // Comprobamos que las contraseñas sean iguales.
    if ($password != $password2) {
      $errores.= '<li>Las contraseñas no coinciden</li>';
    }
  }
      // Hasheamos nuestra contraseña para protegerla un poco.
    # OJO: La seguridad es un tema muy complejo, aqui solo estamos haciendo un hash de la contraseña,
    # pero esto no asegura por completo la informacion encriptada.

    $passHash = password_hash($password, PASSWORD_BCRYPT);
  // Comprobamos si hay errores, sino entonces agregamos el usuario y redirigimos.
  
  if ($errores == '') {
    $statement = $conexion->prepare('INSERT INTO usuarios (idusuario, user, pass, email, idrol, intentos, activo, nombre, apellido, fechaNacimiento, nacionalidad) VALUES (:idusuario, :user, :pass, :email, :idrol, :intentos, :activo, :nombre, :apellido, :fechaNacimiento, :nacionalidad)');
    $statement->execute(array(
        ':idusuario' => $idusuario,	
        ':user' => $user,
        ':pass' => $passHash,
        ':email' => $email,
        ':idrol' => '4',
        ':intentos' => '1',
        ':activo' => '1',
        ':nombre' => $nombre,
        ':apellido' => $apellido,
        ':fechaNacimiento' => $fechaNacimiento,
        ':nacionalidad' => $nacionalidad
        ));
        
// Email test
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "no-reply@postaproject.org";
$to = "info@postaproject.org";
$subject = "NUEVO USUARIO REGISTRADO";
$msg = "¡Hola administrador!\n\nTe informamos que POSTA tiene un nuevo usuario registrado.\n\n[Mensaje generado automáticamente]";
$message = utf8_decode($msg);
$headers = "From:" . $from;
mail($to,$subject,$message, $headers);

    // Despues de registrar al usuario redirigimos para que inicie sesion.
    
    echo "<script>alert('$usuarioRegistroOk')</script>";
    echo "<script type='text/javascript'>window.location = 'login.php';</script>";
    // header('Location:' . RUTA . '/login.php');
  }
}
require 'Views/register.view.php';
?>