<?php

    include_once('../CONFIG/conexion.php');

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $contraseña = $_POST['contraseña'];

    $sql = "INSERT INTO tabla_registro(nombre,correo,edad,contraseña)VALUES('$nombre','$correo','$edad','$contraseña')";


    $query = mysqli_query($conexion,$sql);

    if ($query === TRUE) {
        header("location: ../index.php");
    }

?>