<?php  

    include_once('../CONFIG/conexion.php');

    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña']; 
    $edad = $_POST['edad'];

    $sql = "INSERT INTO tabla_registro(correo, nombre, contraseña, edad) VALUES ('$correo', '$nombre', '$contraseña', '$edad')";

    $query = mysqli_query($conexion, $sql);

    if ($query === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conexion);
    }

?>
