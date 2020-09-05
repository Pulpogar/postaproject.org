<?php
session_start();
require 'admin\config.php';
require 'functions.php';
ae_nocache();

$conexion = conexion($bd_config);

if (!$conexion) {
	header('Location: error.php');
}

// Obtenemos los post
$proyectos = obtener_proyecto($blog_config['proyectos_por_pagina'], $conexion, 1);

// Si no hay post entonces redirigimos
if(!$proyectos){
	header('Location: error-no-disponible.php');
}

require 'Views/index.view.php';

?>