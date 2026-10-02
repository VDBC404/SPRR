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
  <title>Editar configuración | SPRR</title>
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
      <h2>Editar datos</h2>
      <p>Actualiza la información de tu restaurante y guarda los cambios.</p>
    </div>
  </section>

  <main class="wrap">
    <div style="margin-top:-2rem"></div>


    <div class="panel">
      <h4>Editar datos del restaurante</h4>
      <form class="form-grid" action="CRUD_SPRR/actualizar/actualizarregistro.php" method="post">
        <input type="hidden" name="NIT_RESTAURANTE" value="<?= e($fila['NIT_RESTAURANTE']) ?>">

        <div class="field full"><label for="email">Correo electrónico</label>
          <input type="email" id="email" name="CORREO" value="<?= e($fila['CORREO']) ?>" required></div>
        <div class="field"><label for="name">Nombre del dueño</label>
          <input type="text" id="name" name="NOMBRE_DUEÑO" value="<?= e($fila['NOMBRE_DUEÑO']) ?>" required></div>
        <div class="field"><label for="password">Contraseña nueva</label>
          <input type="password" id="password" name="CONTRASEÑA" placeholder="Déjala vacía para no cambiarla" autocomplete="new-password"></div>
        <div class="field"><label for="nit">NIT del negocio (no editable)</label>
          <input type="text" id="nit" value="<?= e($fila['NIT_RESTAURANTE']) ?>" disabled></div>
        <div class="field"><label for="phone">Teléfono</label>
          <input type="tel" id="phone" name="TELEFONO" value="<?= e($fila['TELEFONO']) ?>" required></div>
        <div class="field full"><label for="restaurant">Nombre del restaurante</label>
          <input type="text" id="restaurant" name="NOMBRE_RESTAURANTE" value="<?= e($fila['NOMBRE_RESTAURANTE']) ?>" required></div>
        <div class="field full"><label for="address">Dirección</label>
          <input type="text" id="address" name="DIRECCION_UBICACION" value="<?= e($fila['DIRECCION_UBICACION']) ?>" required></div>
        <div class="actions" style="align-items:center">
          <button type="submit" class="btn btn-success">Guardar cambios</button>
          <a href="configusuario.php" class="btn btn-secondary">Cancelar</a>
          <a href="CRUD_SPRR/eliminar/eliminarrestaurante.php" class="btn btn-danger" style="margin-left:auto" onclick="return confirm('Esto borra tu cuenta y no se puede deshacer. ¿Continuar?')">Borrar cuenta</a>
        </div>
      </form>
    </div>
  </main>
</body>
</html>