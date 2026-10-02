<?php

    include_once('../Config/conexion.php');

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO cliente(dni,nombre,apellido,correo,telefono)VALUES('$dni','$nombre','$apellido','$correo','$telefono')";


    $query = mysqli_query($conexion,$sql);

    if ($query === TRUE) {
        header("location: ../index.php");
    }

?>