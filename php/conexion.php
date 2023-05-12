<?php

$contrasena = "";
$usuario = "root";
$nombre_base_de_datos = "reservacion";
try{
	$conexion = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contrasena);
	$conexion->query("set names utf8;");
    $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>