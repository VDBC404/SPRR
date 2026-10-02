<?php
session_start();
include("Config/conexion.php");

if (empty($_SESSION['NIT_RESTAURANTE'])) {
    header("Location: INICIO_DE_SESION.php");
    exit();
}
$nit = $_SESSION['NIT_RESTAURANTE'];
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

$stmt = mysqli_prepare($conexion, "SELECT * FROM registro WHERE NIT_RESTAURANTE = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "s", $nit);
mysqli_stmt_execute($stmt);
$fila = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if (!$fila) { header("Location: INICIO_DE_SESION.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Configuración | SPRR</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/sprr.css">
</head>
<body>
  <header class="topbar">
    <div class="wrap">
      <a class="brand-box" href="index.php">
        <img src="IMG/sprr_logo_transparente.png" alt="SPRR">
        <span class="brand">Gestión de Restaurante</span>
      </a>
      <nav class="main-nav">
        <a href="index.php">Home</a>
        <a href="empleados.php">Empleados</a>
        <a href="inventario.php">Inventario</a>
        <a href="menus.php">Menús</a>
        <a href="configusuario.php" class="active">Config</a>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="wrap">
      <h2>Configuración</h2>
      <p>Los datos registrados de tu restaurante.</p>
    </div>
  </section>

  <main class="wrap">
    <div style="margin-top:-2rem"></div>


    <div class="panel">
      <h4>Datos del restaurante</h4>
      <form class="form-grid">
        <div class="field full"><label for="conf-email">Correo electrónico</label>
          <input id="conf-email" type="email" value="<?= e($fila['CORREO']) ?>" disabled></div>
        <div class="field"><label for="conf-name">Nombre del dueño</label>
          <input id="conf-name" type="text" value="<?= e($fila['NOMBRE_DUEÑO']) ?>" disabled></div>
        <div class="field"><label for="conf-nit">NIT del negocio</label>
          <input id="conf-nit" type="text" value="<?= e($fila['NIT_RESTAURANTE']) ?>" disabled></div>
        <div class="field"><label for="conf-phone">Teléfono</label>
          <input id="conf-phone" type="tel" value="<?= e($fila['TELEFONO']) ?>" disabled></div>
        <div class="field"><label for="conf-restaurant">Nombre del restaurante</label>
          <input id="conf-restaurant" type="text" value="<?= e($fila['NOMBRE_RESTAURANTE']) ?>" disabled></div>
        <div class="field full"><label for="conf-address">Dirección</label>
          <input id="conf-address" type="text" value="<?= e($fila['DIRECCION_UBICACION']) ?>" disabled></div>
        <div class="actions" style="justify-content:space-between">
          <a href="configusuario_editar.php" class="btn btn-success">Editar datos</a>
          <a href="CRUD_SPRR/eliminar/salir.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
      </form>
    </div>
  </main>
</body>
</html>