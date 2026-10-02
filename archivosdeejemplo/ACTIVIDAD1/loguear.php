<?php
require 'Config/conexion.php';
session_start();
$correo = $_POST['CORREO'];
$contraseña = $_POST['CONTRASEÑA'];

$q="SELECT COUNT(*) as contar from tabla_inicio_sesion where CORREO = '$correo' and CONTRASEÑA ='$contraseña'";
$consulta = mysqli_query($conexion,$q);
$array = mysqli_fetch_array($consulta);

if ($array['contar']>0){
    $_SESSION['CORREO'] = $correo;
    header('location: index.php');
}else{
    echo "Datos incorrectos";
}
    
?>