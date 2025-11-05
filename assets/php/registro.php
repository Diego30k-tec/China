<?php
session_start();
require_once "conexion.php";

$nombre = trim($_POST['nombre'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$pass   = trim($_POST['pass'] ?? '');

if (!$nombre || !$correo || !$pass) {
    $_SESSION['error'] = "Faltan datos.";
    header("Location: ../../index.php");
    exit;
}

$stmt = $conexion->prepare("SELECT id_cliente FROM clientes WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute(); 
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['error'] = "El correo ya está registrado.";
    header("Location: ../../index.php");
    exit;
}

$stmt = $conexion->prepare("INSERT INTO clientes (nombre, correo, pass) VALUES (?, ?, ?)");

$stmt->bind_param("sss", $nombre, $correo, $pass);
$_SESSION['success'] = $stmt->execute() ? "Registro exitoso." : "Error al registrar usuario.";

$stmt->close();
$conexion->close();

header("Location: ../../index.php");
exit;
?>

