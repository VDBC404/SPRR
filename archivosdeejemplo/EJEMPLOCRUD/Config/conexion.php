<?php
$host ="localhost";
$usuario = "root";
$clave = "";
$bd = "ejemplocrud";

$conexion = mysqli_connect($host,$usuario,$clave,$bd);

 if($conexion){
    echo "conectado correcto";
}else{
    echo "No se pudo conectar";
}
 

?>