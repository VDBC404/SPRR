<?php
session_start();
include_once('../../Config/conexion.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../sprrsignup.php");
    exit();
}

$CORREO              = trim($_POST['CORREO']);
$NOMBRE_DUEÑO        = trim($_POST['NOMBRE_DUEÑO']);
$CONTRASEÑA          = $_POST['CONTRASEÑA'];
$NIT_RESTAURANTE     = trim($_POST['NIT_RESTAURANTE']);
$TELEFONO            = trim($_POST['TELEFONO']);
$NOMBRE_RESTAURANTE  = trim($_POST['NOMBRE_RESTAURANTE']);
$DIRECCION_UBICACION = trim($_POST['DIRECCION_UBICACION']);

$sql = "INSERT INTO registro
        (CORREO, NOMBRE_DUEÑO, CONTRASEÑA, NIT_RESTAURANTE, TELEFONO, NOMBRE_RESTAURANTE, DIRECCION_UBICACION)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param(
    $stmt, "sssssss",
    $CORREO, $NOMBRE_DUEÑO, $CONTRASEÑA, $NIT_RESTAURANTE,
    $TELEFONO, $NOMBRE_RESTAURANTE, $DIRECCION_UBICACION
);

try {
    $ok = mysqli_stmt_execute($stmt);
} catch (mysqli_sql_exception $e) {
    $ok = false;
}

if ($ok) {
    $_SESSION['NIT_RESTAURANTE'] = $NIT_RESTAURANTE;
    header("Location: ../../index.php");
    exit();
}

if (mysqli_errno($conexion) == 1062) {
    echo "Ya existe un restaurante registrado con ese NIT o correo. <a href='../../sprrsignup.php'>Volver</a>";
} else {
    echo "No se pudo completar el registro. <a href='../../sprrsignup.php'>Volver</a>";
}