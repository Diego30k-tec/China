<?php
session_start();
require_once "conexion.php";

$correo = trim($_POST['correo'] ?? '');
$pass   = trim($_POST['pass'] ?? '');

if (!$correo || !$pass) {
    $_SESSION['error'] = "Faltan datos.";
    header("Location: ../../index.php");
    exit;
}

$stmt = $conexion->prepare("SELECT id_cliente, nombre, pass FROM clientes WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $nombre, $hashPass);
$stmt->fetch();

if ($stmt->num_rows == 0 || !password_verify($pass, $hashPass)) {
    $_SESSION['error'] = "Correo o contraseña incorrecta.";
    header("Location: ../../index.php");
    exit;
}

$_SESSION['user_id'] = $id;
$_SESSION['user_name'] = $nombre;

$stmt->close();
$conexion->close();

header("Location: ../../index.php");
exit;
?>

