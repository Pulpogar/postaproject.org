<?php
require 'admin/config.php';
require 'functions.php';
ae_nocache();

// Comprobamos si la session esta iniciada, sino, redirigimos.
// comprobarSession();

// Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}


$idimagen = obtener_max_id($conexion, 'imagenes_proyecto');
$idproyecto = obtener_max_id($conexion, 'proyectos');


if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif")) {


        //con estas variables generaremos un codigo que vamos a unir como nombre a la imagen
        //de esta manera evitaremos problemas con los nombres de las imagenes
        $fechaactual  = date("dHi");  //Fecha Actual       
        $no_aleatorio  = rand(10, 99); //Generamos dos Digitos aleatorios
        //esta es la ruta donde copiaremos la imagen
        //recuerden que deben crear un directorio con este mismo nombre
        //en el mismo lugar donde se encuentra el archivo subir.php

        $ruta = "images/" .$fechaactual.$no_aleatorio.$_FILES['file']['name'];

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $ruta)) {

            $imagen = $fechaactual.$no_aleatorio.$_FILES['file']['name'];

          
            $statement = $conexion->prepare(
                'INSERT INTO imagenes_proyecto (id, idproyecto, nombre, uploaded, estado) 
                VALUES (:id, :idproyecto, :nombre, :uploaded, :estado)'
                );
        
                $statement->execute(array(
                    ':id' => $idimagen,	
                    ':idproyecto' => $idproyecto,
                    ':nombre' => $imagen,
                    ':uploaded' => '10-02-2019',
                    ':estado' => '1'        
                ));

        } else {
            echo 'no';
        }
    }
  ?>