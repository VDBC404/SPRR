<?php

include_once('../../Config/conexion.php');

if (isset($_POST['NIT_RESTAURANTE']) && !empty($_POST['NIT_RESTAURANTE'])) {
    $NIT_RESTAURANTE = $_POST['NIT_RESTAURANTE'];
} elseif (isset($_SESSION['NIT_RESTAURANTE'])) {
    $NIT_RESTAURANTE = $_SESSION['NIT_RESTAURANTE'];
}

if (empty($NIT_RESTAURANTE)) {
    die("Error: NIT del restaurante no proporcionado.");
}

$TIPO_DOCUMENTO = $_POST['TIPO_DOCUMENTO'] ?? '';
$NUM_DOCUMENTO = $_POST['NUM_DOCUMENTO'] ?? '';
$NOMBRE = $_POST['NOMBRE'] ?? '';
$APELLIDO = $_POST['APELLIDO'] ?? '';
$CORREO = $_POST['CORREO'] ?? '';
$ROL_EMPLEADO = $_POST['ROL_EMPLEADO'] ?? '';
$NUMERO_TELEFONO = $_POST['NUMERO_TELEFONO'] ?? '';
$FECHA_INGRESO_EMPLEADO = $_POST['FECHA_INGRESO_EMPLEADO'] ?? null;

$FOTO = null;
if (isset($_FILES['FOTO']) && $_FILES['FOTO']['error'] === UPLOAD_ERR_OK) {
    $carpetaDestino = "../../IMG/";
    if (!is_dir($carpetaDestino)) {
        mkdir($carpetaDestino, 0755, true);
    }
    $nombreArchivo = time() . "_" . basename($_FILES["FOTO"]["name"]);
    $rutaArchivo = $carpetaDestino . $nombreArchivo;

    if (move_uploaded_file($_FILES["FOTO"]["tmp_name"], $rutaArchivo)) {
        $FOTO = "IMG/" . $nombreArchivo;
    } else {
        $FOTO = null;
    }
}

$sql = "INSERT INTO registro_empleados 
        (NIT_RESTAURANTE, TIPO_DOCUMENTO, NUM_DOCUMENTO, NOMBRE, APELLIDO, CORREO, ROL_EMPLEADO, NUMERO_TELEFONO, FOTO, FECHA_INGRESO_EMPLEADO) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexion, $sql);
if (!$stmt) {
    die("Error en la preparación: " . mysqli_error($conexion));
}


mysqli_stmt_bind_param($stmt, "ssisssssss",
    $NIT_RESTAURANTE,
    $TIPO_DOCUMENTO,
    $NUM_DOCUMENTO,
    $NOMBRE,
    $APELLIDO,
    $CORREO,
    $ROL_EMPLEADO,
    $NUMERO_TELEFONO,
    $FOTO,
    $FECHA_INGRESO_EMPLEADO
);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../../empleados.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conexion);
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>

