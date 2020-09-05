<?php

require 'functions.php';
require 'admin/config.php';



// $conexion = mysqli_connect("localhost", "root", "", "dbposta");
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}
// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda volver a registrar un usuario.

$idnewsletter = obtener_max_id($conexion, 'newsletter', 'idnewsletter');

// $to = $_POST['newsEmail']; // this is your Email address
// $from = "aeg2k@hotmail.com"; // this is the sender's Email address


// $headers = "From: <".$from. ">"; 
// $headers2 = "From:" . $to;
// if(isset($_POST['submit'])){    
// mail($to,$subject,$message,$headers);
// mail($from,$subject2,$message2,$headers2);
// echo "You have subscribed to our newsletter. Thank you, we will contact you shortly.";
// }

// Comprobamos si ya han sido enviado los datos
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Validamos que los datos hayan sido rellenados
  
  $email = limpiarDatos($_POST['newsEmail']);
  $nombre = limpiarDatos($_POST['nombre']);
  $apellido = limpiarDatos($_POST['apellido']);
  $errores = '';

 // Comprobamos que ninguno de los campos este vacio.

   // Comprobamos que el usuario no exista ya.

    $statement = $conexion->prepare('SELECT * FROM newsletter WHERE email = :email LIMIT 1');
    $statement->execute(array(':email' => $email));

   // El metodo fetch nos va a devolver el resultado o false en caso de que no haya resultado.
    $resultado = $statement->fetch();

  //  Si resultado es diferente a false entonces significa que ya existe el usuario.
    if ($resultado != false) {
      $errores .= '<li>El correo ya existe</li>';
      echo "<script>alert('$correoExiste')</script>";
      echo "<script type='text/javascript'>window.location = 'index.php';</script>";
    }
  
  
  if ($errores == '') {
    $statement2 = $conexion->prepare(
      'INSERT INTO newsletter (idnewsletter, nombre, apellido, fechaAlta, email) 
      VALUES (:idnewsletter, :nombre, :apellido, now(), :email)'
    );
    
    $statement2->execute(array(
      
      ':idnewsletter' => $idnewsletter,
      ':nombre' => $nombre,
      ':apellido' => $apellido,
      ':email' => $email
      
    ));       

    // Despues de registrar al usuario redirigimos para que inicie sesion.
    
    echo "<script>alert('$altaNewsletterOk')</script>";
    echo "<script type='text/javascript'>window.location = 'index.php';</script>";
    // header('Location:' . RUTA . '/login.php');
  // }
}}
?>