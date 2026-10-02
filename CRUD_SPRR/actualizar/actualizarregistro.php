<?php
session_start();
include_once("../../Config/conexion.php");

if (!isset($_SESSION['NIT_RESTAURANTE'])) {
    header("Location: ../../INICIO_DE_SESION.php");
    exit();
}

$NIT_RESTAURANTE = $_SESSION['NIT_RESTAURANTE'];
$NOMBRE_DUEÑO = $_POST['NOMBRE_DUEÑO'] ?? '';
$CORREO = $_POST['CORREO'] ?? '';
$CONTRASEÑA = $_POST['CONTRASEÑA'] ?? '';
$TELEFONO = $_POST['TELEFONO'] ?? '';
$NOMBRE_RESTAURANTE = $_POST['NOMBRE_RESTAURANTE'] ?? '';
$DIRECCION_UBICACION = $_POST['DIRECCION_UBICACION'] ?? '';

if (empty($CONTRASEÑA)) {
    $sql = "UPDATE registro 
            SET NOMBRE_DUEÑO = ?, CORREO = ?, TELEFONO = ?, 
                NOMBRE_RESTAURANTE = ?, DIRECCION_UBICACION = ? 
            WHERE NIT_RESTAURANTE = ?";
    
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", 
        $NOMBRE_DUEÑO, $CORREO, $TELEFONO, $NOMBRE_RESTAURANTE, $DIRECCION_UBICACION, $NIT_RESTAURANTE);
} else {
    $sql = "UPDATE registro 
            SET NOMBRE_DUEÑO = ?, CORREO = ?, CONTRASEÑA = ?, TELEFONO = ?, 
                NOMBRE_RESTAURANTE = ?, DIRECCION_UBICACION = ? 
            WHERE NIT_RESTAURANTE = ?";
    
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", 
        $NOMBRE_DUEÑO, $CORREO, $CONTRASEÑA, $TELEFONO, $NOMBRE_RESTAURANTE, $DIRECCION_UBICACION, $NIT_RESTAURANTE);
}

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../../configusuario.php");
    exit();
} else {
    echo "Error al actualizar: " . mysqli_error($conexion);
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
