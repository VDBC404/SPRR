<?php 
    session_start();
    session_destroy();


    echo "<script> alert('Cerrando sesion. . .');
    </script>";
    header("location: ../../INICIO_DE_SESION.php");
    exit();
?>