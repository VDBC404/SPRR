<?php
include_once("../../Config/conexion.php");
session_start();

if (!isset($_SESSION['NIT_RESTAURANTE'])) {
    header("Location: ../../INICIO_DE_SESION.php");
    exit();
}

$id = $_POST['ID_PRODUCTO'];
$nombre = $_POST['NOMBRE_PRODUCTO'];
$cantidad = $_POST['CANTIDAD'];
$unidad = $_POST['UNIDAD_MEDIDA'];
$categoria = $_POST['CATEGORIA_PRODUCTO'];
$proveedor = $_POST['NOMBRE_PROVEEDOR'];
$notas = $_POST['NOTAS'];
$nit_restaurante = $_SESSION['NIT_RESTAURANTE'];

$sql = "UPDATE inventario 
        SET 
            NOMBRE_PRODUCTO = '$nombre', 
            CANTIDAD = '$cantidad', 
            UNIDAD_MEDIDA = '$unidad', 
            CATEGORIA_PRODUCTO = '$categoria', 
            NOMBRE_PROVEEDOR = '$proveedor', 
            NOTAS = '$notas'
        WHERE ID_PRODUCTO = '$id' AND NIT_RESTAURANTE = '$nit_restaurante'";

$query = mysqli_query($conexion, $sql);

if ($query) {
    header('Location: ../../inventario.php');
    exit();
} else {
    echo "Error al actualizar el inventario: " . mysqli_error($conexion);
}
?>
