<?php

$conexion = mysqli_connect("localhost", $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
// $conexion = mysqli_connect("localhost", "root", "", "dbposta");

$query = $conexion->query("SELECT * FROM categorias");

echo '<option value="0">Seleccione una categoría</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id']. '">' . utf8_encode($row['nombre']) . '</option>' . "\n";
}