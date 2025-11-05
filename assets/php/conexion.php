<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "restaurante";

$conexion = new mysqli($host, $usuario, $contrasena, $basedatos);
if ($conexion->connect_error) die("Error de conexión: " . $conexion->connect_error);
$conexion->set_charset("utf8mb4");
?>

