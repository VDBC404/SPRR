<?php
session_start();
include_once('../../Config/conexion.php');

if (!isset($_SESSION['NIT_RESTAURANTE'])) {
    header('Location: ../../INICIO_DE_SESION.php');
    exit();
}


if (!isset($_GET['id'])) {
    echo "Error: ID de empleado no proporcionado.";
    exit();
}

$id = intval($_GET['id']); 
$nit = mysqli_real_escape_string($conexion, $_SESSION['NIT_RESTAURANTE']);


$sql = "DELETE FROM registro_empleados WHERE ID_EMPLEADO = '$id' AND NIT_RESTAURANTE = '$nit'";
$query = mysqli_query($conexion, $sql);

if ($query) {
    header('Location: ../../empleados.php');
    exit();
} else {
    echo "Error al eliminar: " . mysqli_error($conexion);
}
?>
