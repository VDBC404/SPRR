<?php
session_start();
include_once('../../Config/conexion.php');

$CORREO = $_POST['CORREO'];
$CONTRASEÑA = $_POST['CONTRASEÑA'];
$NIT_RESTAURANTE = $_POST['NIT_RESTAURANTE'];

$sql = "SELECT * FROM registro 
        WHERE CORREO = '$CORREO' 
        AND CONTRASEÑA = '$CONTRASEÑA' 
        AND NIT_RESTAURANTE = '$NIT_RESTAURANTE'";
$consulta = mysqli_query($conexion, $sql);
$array = mysqli_fetch_array($consulta);


if ($array) {

    session_regenerate_id(true);
    $_SESSION['NIT_RESTAURANTE'] = $array['NIT_RESTAURANTE'];


    header("Location: ../../index.php");
    exit();
} else {
    echo "<script> alert('Datos incorrectos');
    location.href = '../../INICIO_DE_SESION.php';
    </script>";
}
?>
