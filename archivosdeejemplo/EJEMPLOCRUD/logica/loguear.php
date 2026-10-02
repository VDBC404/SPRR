<!-- donde recibo las variables del formularios para validar  -->
<?php
require'../Config/conexion.php';
session_start();
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

$q="SELECT COUNT(*) as contar from tabla_inicio where
 correo = '$correo' and contraseña ='$contraseña'";
$consulta = mysqli_query($conexion,$q);
$array = mysqli_fetch_array($consulta);

if ($array['contar']>0){
    $_SESSION['correo'] = $correo;
    header("location: ../index.php");
}else{
    echo "Datos incorrectos";
}
?>
