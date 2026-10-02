<?php
    include_once("../Config/conexion.php"); 

    $id = $_POST['id'];
    $nombreproducto = $_POST['nombreproducto'];
    $generojuego = $_POST['generojuego'];
    $cantidad = $_POST['cantidad'];


    $sql = "UPDATE productojuegos SET nombreproducto='$nombreproducto', generojuego='$generojuego', cantidad='$cantidad' WHERE id='$id'";



    $query = mysqli_query($conexion, $sql);

    if ($query) {
        header('Location: ../index.php');
    }

?>