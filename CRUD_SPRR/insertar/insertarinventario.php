<?php  
include_once('../../Config/conexion.php');

$NIT_RESTAURANTE    = $_POST['NIT_RESTAURANTE'];
$NOMBRE_PRODUCTO    = $_POST['NOMBRE_PRODUCTO'];
$CANTIDAD           = $_POST['CANTIDAD'];
$UNIDAD_MEDIDA      = $_POST['UNIDAD_MEDIDA'];
$CATEGORIA_PRODUCTO = $_POST['CATEGORIA_PRODUCTO'];
$NOMBRE_PROVEEDOR   = $_POST['NOMBRE_PROVEEDOR'];
$NOTAS              = $_POST['NOTAS'];

$sql = "INSERT INTO inventario 
        (NIT_RESTAURANTE, NOMBRE_PRODUCTO, CANTIDAD, UNIDAD_MEDIDA, CATEGORIA_PRODUCTO, NOMBRE_PROVEEDOR, NOTAS) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexion, $sql);


mysqli_stmt_bind_param($stmt, "ssissss", 
    $NIT_RESTAURANTE, 
    $NOMBRE_PRODUCTO, 
    $CANTIDAD, 
    $UNIDAD_MEDIDA, 
    $CATEGORIA_PRODUCTO, 
    $NOMBRE_PROVEEDOR, 
    $NOTAS
);

$query = mysqli_stmt_execute($stmt);

if ($query) {
    header("Location: ../../inventario.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conexion);
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
