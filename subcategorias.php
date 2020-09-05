<?php

$conexion = mysqli_connect("localhost", $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
// $conexion = mysqli_connect("localhost", "root", "", "dbposta");
	
$la_categoria = $_POST['categoria'];

$query = $conexion->query("SELECT * FROM subcategorias WHERE idcategoria = $la_categoria");

echo '<option value="0">Seleccione una subcategoría</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id']. '">' . utf8_encode($row['nombre']) . '</option>' . "\n";
}