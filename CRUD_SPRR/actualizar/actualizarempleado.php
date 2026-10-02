<?php
include_once("../../Config/conexion.php");

$id = $_POST['ID_EMPLEADO'];
$nombre = $_POST['NOMBRE'];
$apellido = $_POST['APELLIDO'];
$correo = $_POST['CORREO'];
$telefono = $_POST['NUMERO_TELEFONO'];


$sql_foto = "SELECT FOTO FROM registro_empleados WHERE ID_EMPLEADO = '$id'";
$result_foto = mysqli_query($conexion, $sql_foto);
$empleado = mysqli_fetch_assoc($result_foto);
$foto_actual = $empleado['FOTO'];
n
if (isset($_FILES['FOTO']) && $_FILES['FOTO']['error'] === 0) {
    $carpeta_servidor = "../../IMG/"; 
    $carpeta_web = "IMG/";            
    $nombre_imagen = time() . "_" . basename($_FILES['FOTO']['name']);
    $ruta_servidor = $carpeta_servidor . $nombre_imagen;
    $ruta_web = $carpeta_web . $nombre_imagen;

    if (move_uploaded_file($_FILES['FOTO']['tmp_name'], $ruta_servidor)) {
        if (!empty($foto_actual) && file_exists("../../" . $foto_actual) && $foto_actual != "IMG/default.png") {
            unlink("../../" . $foto_actual);
        }
        $nueva_foto = $ruta_web;
    } else {
        $nueva_foto = $foto_actual;
    }
} else {
    $nueva_foto = $foto_actual;
}

$sql = "UPDATE registro_empleados
        SET NOMBRE='$nombre', 
            APELLIDO='$apellido', 
            CORREO='$correo', 
            NUMERO_TELEFONO='$telefono', 
            FOTO='$nueva_foto'
        WHERE ID_EMPLEADO='$id'";

$query = mysqli_query($conexion, $sql);

if ($query) {
    header('Location: ../../empleados.php');
    exit();
} else {
    echo "Error al actualizar el empleado: " . mysqli_error($conexion);
}
?>
