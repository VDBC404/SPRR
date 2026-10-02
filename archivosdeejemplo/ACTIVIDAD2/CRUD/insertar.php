<?php

    include_once('../Config/conexion.php');

    $nombreproducto = $_POST['nombreproducto'];
    $generojuego = $_POST['generojuego'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO productojuegos(nombreproducto,generojuego,cantidad)VALUES('$nombreproducto','$generojuego','$cantidad')";


    $query = mysqli_query($conexion,$sql);

    if ($query === TRUE) {
        header("location: ../index.php");
    }

?>