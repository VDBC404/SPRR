<?php
    include_once("../Config/conexion.php"); 

    $id = $_POST['id'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE cliente SET dni='$dni', nombre='$nombre', apellido='$apellido', correo='$correo', Telefono='$telefono' WHERE id='$id'";



    $query = mysqli_query($conexion, $sql);

    if ($query) {
        header('Location: ../index.php');
    }

?>