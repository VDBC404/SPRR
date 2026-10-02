<?php
include_once("../../Config/conexion.php");
session_start();

if (!isset($_SESSION['NIT_RESTAURANTE'])) {
    header("Location: ../../INICIO_DE_SESION.php");
    exit();
}

$id = $_POST['ID_MENU'];
$nombre = $_POST['NOMBRE'];
$categoria = $_POST['CATEGORIA'];
$ingredientes = $_POST['INGREDIENTES'];
$precio = $_POST['PRECIO'];

$nit_restaurante = $_POST['NIT_RESTAURANTE'];

$sql_foto = "SELECT IMAGEN FROM menus WHERE ID_MENU = '$id'";
$result_foto = mysqli_query($conexion, $sql_foto);
$menu = mysqli_fetch_assoc($result_foto);
$foto_actual = $menu['IMAGEN'];

if (isset($_FILES['IMAGEN']) && $_FILES['IMAGEN']['error'] === 0) {
    $carpeta_servidor = "../../IMG/";
    $carpeta_web = "IMG/";

    $nombre_imagen = time() . "_" . basename($_FILES['IMAGEN']['name']);
    $ruta_servidor = $carpeta_servidor . $nombre_imagen;
    $ruta_web = $carpeta_web . $nombre_imagen;

    if (move_uploaded_file($_FILES['IMAGEN']['tmp_name'], $ruta_servidor)) {
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
$sql = "UPDATE menus 
        SET NOMBRE='$nombre',
            CATEGORIA='$categoria',
            INGREDIENTES='$ingredientes',
            PRECIO='$precio',
            IMAGEN='$nueva_foto'
        WHERE ID_MENU='$id'";

$query = mysqli_query($conexion, $sql);

if ($query) {
    header('Location: ../../menus.php');
    exit();
} else {
    echo "Error al actualizar el registro: " . mysqli_error($conexion);
}
?>

