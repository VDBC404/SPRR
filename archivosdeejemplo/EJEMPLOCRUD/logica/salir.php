<?php
session_start();

session_destroy();

header("location: ../Formularios/formulario_inicio.php");
exit();
?>