<?php  
include_once('../../Config/conexion.php');

$NIT_RESTAURANTE = $_POST['NIT_RESTAURANTE'];
$NOMBRE = $_POST['NOMBRE'];
$CATEGORIA = $_POST['CATEGORIA'];
$INGREDIENTES = $_POST['INGREDIENTES'];
$PRECIO = $_POST['PRECIO'];


$IMAGEN = null;
if (isset($_FILES['IMAGEN']) && $_FILES['IMAGEN']['error'] == 0) {
    $carpetaDestino = "../../IMG/";
    $nombreArchivo = time() . "_" . basename($_FILES["IMAGEN"]["name"]);
    $rutaArchivo = $carpetaDestino . $nombreArchivo;

    if (move_uploaded_file($_FILES["IMAGEN"]["tmp_name"], $rutaArchivo)) {
        $IMAGEN = "IMG/" . $nombreArchivo;
    }
}

$sql = "INSERT INTO menus (NIT_RESTAURANTE, NOMBRE, CATEGORIA, INGREDIENTES, PRECIO, IMAGEN) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "ssssds", $NIT_RESTAURANTE, $NOMBRE, $CATEGORIA, $INGREDIENTES, $PRECIO, $IMAGEN);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../../menus.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conexion);
}
?>



