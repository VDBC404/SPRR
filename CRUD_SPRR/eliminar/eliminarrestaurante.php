<?php
include_once("../../Config/conexion.php");
session_start();

if (!isset($_SESSION['NIT_RESTAURANTE'])) {
    header("Location: ../../INICIO_DE_SESION.php");
    exit();
}

$nit = $_SESSION['NIT_RESTAURANTE'];

mysqli_query($conexion, "DELETE FROM registro_empleados WHERE NIT_RESTAURANTE = '$nit'");
mysqli_query($conexion, "DELETE FROM inventario WHERE NIT_RESTAURANTE = '$nit'");
mysqli_query($conexion, "DELETE FROM menus WHERE NIT_RESTAURANTE = '$nit'");
mysqli_query($conexion, "DELETE FROM registro WHERE NIT_RESTAURANTE = '$nit'");

session_destroy();

header("Location: ../../INICIO_DE_SESION.php");
exit();

?>