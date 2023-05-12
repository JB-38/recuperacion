<?php
session_start();
$usu=$_SESSION['usuario'];
include_once "conexion.php";
$id = $_POST["id"];
$descripcion = $_POST["descripcion"];
$limite= $_POST["limite"];
$cantidad = $_POST["cantidad"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$precio = $_POST["precio"];

if ($cantidad<=$limite){
    $sentencia = $conexion->prepare("INSERT INTO reservas(id_recurso,usuario, fecha, hora, cantidad) VALUES (?, ?, ?, ?, ?);");
    $resultado = $sentencia->execute([$id, $usu, $fecha, $hora, $cantidad]);
    $sentencia1 = $conexion->prepare("INSERT INTO presupuestos(usuario, id_reserva, monto) VALUES (?, ?, ?);");
    $resultado1 = $sentencia1->execute([$usu, $id, $precio]);

if($resultado === TRUE){
	header("Location: ./presupuesto.php?usuario=$usuario");
	exit;
}

} else echo "La cantidad de ocupantes no puede ser mayor al límite de ocupantes del recurso";

?>