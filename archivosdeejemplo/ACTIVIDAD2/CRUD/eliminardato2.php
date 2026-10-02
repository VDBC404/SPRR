<?php
    include_once('../Config/conexion.php');

    $ids = $_REQUEST['Ids'];
    $sql = "DELETE FROM ventajuegos WHERE ids = '$ids'";
    $query = mysqli_query($conexion, $sql);

    if ($query) {
        header('location: ../index.php');
    }
?>