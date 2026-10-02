<?php
    include_once('../Config/conexion.php');

    $id = $_REQUEST['Id'];
    $sql = "DELETE FROM productojuegos WHERE id = '$id'";
    $query = mysqli_query($conexion, $sql);

    if ($query) {
        header('location: ../index.php');
    }
?>