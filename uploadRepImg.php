<?php session_start();
require 'admin/config.php';
require 'functions.php';
require 'requirelanguage.php';
ae_nocache();

$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

$idproyecto = obtener_max_id($conexion, 'proyectos', 'id');
$idetapa = 1;

// upload.php
// 'images' refers to your file input name attribute
if (empty($_FILES['imgRep'])) {
    echo json_encode(['error'=>'No files found for upload.']); 
    // or you can throw an exception 
    return; // terminate
}

// get the files posted
$images = $_FILES['imgRep'];

// a flag to see if everything is ok
$success = null;

// file paths to store
$paths= [];

// get file names
$filenames = $images['name'];

// loop and process files
    $idimagen = obtener_max_id($conexion, 'imagenes_etapa', 'idimagen');
    $uploadfile=$_FILES["imgRep"]["tmp_name"];
	$folder="imag_/imgRep/";
	$fechaactual  = date("dHi");  //Fecha Actual       
    $no_aleatorio  = rand(10, 99);
    $target = "$folder".$fechaactual.$no_aleatorio.$_FILES["imgRep"]["name"];
    if(move_uploaded_file($_FILES["imgRep"]["tmp_name"], $target)) {
        $success = true;
        $paths[] = $target;
    } else {
        $success = false;
    }

// check and process based on successful status 
if ($success === true) {
    // call the function to save all data to database
    // code for the following function `save_data` is not 
    // mentioned in this example
    // save_data($paths[]);
    $statement3 = $conexion->prepare(
        'INSERT INTO imagenes_etapa (idimagen, idproyecto, idetapa, nombre) 
        VALUES (:idimagen, :idproyecto, :idetapa, :nombre)'
    );

    $statement3->execute(array(
        
        ':idimagen' => $idimagen,
        ':idproyecto' => $idproyecto,
        ':idetapa' => 1,
        ':nombre' => $fechaactual.$no_aleatorio.$_FILES["imgRep"]["name"]
        
    ));
    $idimagen++;
    // store a successful response (default at least an empty array). You
    // could return any additional response info you need to the plugin for
    // advanced implementations.
    $output = [];
    // for example you can get the list of files uploaded this way
    // $output = ['uploaded' => $paths];
} elseif ($success === false) {
    $output = ['error'=>'Error while uploading images. Contact the system administrator'];
    // delete any uploaded files
    foreach ($paths as $file) {
        unlink($file);
    }
} else {
    $output = ['error'=>'No files were processed.'];
}

// return a json encoded response for plugin to process successfully
echo json_encode($output);


?>

