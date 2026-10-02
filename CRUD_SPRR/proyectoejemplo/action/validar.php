<?php  

    include_once('../CONFIG/conexion.php');

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña']; 

    $sql = "SELECT COUNT(*) as contar from datos where correo = '$correo' and '$contraseña'";
    $consulta = mysqli_query($conexion, $sql);
    $array = mysqli_fetch_array($consulta);

    $query = mysqli_query($conexion, $sql);

    if ($query === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conexion);
    }

?>

