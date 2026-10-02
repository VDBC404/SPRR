<?php
session_start();
include("Config/conexion.php");

if (empty($_SESSION['NIT_RESTAURANTE'])) {
    header("Location: INICIO_DE_SESION.php");
    exit();
}
$nit = $_SESSION['NIT_RESTAURANTE'];
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

$stmt = mysqli_prepare($conexion, "SELECT * FROM registro_empleados WHERE NIT_RESTAURANTE = ?");
mysqli_stmt_bind_param($stmt, "s", $nit);
mysqli_stmt_execute($stmt);
$empleados = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Empleados | SPRR</title>
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
        <a href="empleados.php" class="active">Empleados</a>
        <a href="inventario.php">Inventario</a>
        <a href="menus.php">Menús</a>
        <a href="configusuario.php">Config</a>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="wrap">
      <h2>Empleados</h2>
      <p>Registra y actualiza a tu equipo de trabajo.</p>
    </div>
  </section>

  <main class="wrap">
    <div class="cards">
      <a class="card active" href="empleados.php"><div class="card-emoji">👨‍🍳</div><h3>Empleados</h3><p>Altas, bajas y datos.</p></a>
      <a class="card" href="inventario.php"><div class="card-emoji">📦</div><h3>Inventario</h3><p>Productos y proveedores.</p></a>
      <a class="card" href="menus.php"><div class="card-emoji">🍽️</div><h3>Menús</h3><p>Platos, precios y categorías.</p></a>
    </div>


    <div class="panel">
      <h4>Registrar empleado</h4>
      <form class="form-grid" action="CRUD_SPRR/insertar/insertarempleado.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="NIT_RESTAURANTE" value="<?= e($nit) ?>">

        <div class="field"><label for="emp-nombre">Nombre</label>
          <input id="emp-nombre" name="NOMBRE" type="text" placeholder="Ej. Juan" required></div>
        <div class="field"><label for="emp-apellido">Apellido</label>
          <input id="emp-apellido" name="APELLIDO" type="text" placeholder="Ej. Pérez" required></div>
        <div class="field"><label for="emp-rol">Rol</label>
          <select id="emp-rol" name="ROL_EMPLEADO" required>
            <option value="">Selecciona…</option>
            <option>Cocinero</option><option>Mesero</option><option>Cajero</option>
            <option>Administrador</option><option>Multipropósito</option><option>Otro</option>
          </select></div>
        <div class="field"><label for="emp-telefono">Teléfono</label>
          <input id="emp-telefono" name="NUMERO_TELEFONO" type="tel" placeholder="Ej. 3001234567"></div>
        <div class="field"><label for="emp-correo">Correo</label>
          <input id="emp-correo" name="CORREO" type="email" placeholder="ejemplo@email.com"></div>
        <div class="field"><label for="emp-tipo-doc">Tipo de documento</label>
          <select id="emp-tipo-doc" name="TIPO_DOCUMENTO" required>
            <option value="">Selecciona…</option>
            <option>Cédula de ciudadanía</option><option>Cédula extranjera</option>
            <option>Permiso por protección temporal</option><option>Pasaporte</option>
          </select></div>
        <div class="field"><label for="emp-doc">Número de documento</label>
          <input id="emp-doc" name="NUM_DOCUMENTO" type="number" min="0" placeholder="Ej. 1027123465"></div>
        <div class="field"><label for="emp-fecha">Fecha de ingreso</label>
          <input id="emp-fecha" name="FECHA_INGRESO_EMPLEADO" type="date"></div>
        <div class="field full"><label for="emp-foto">Foto del empleado</label>
          <input id="emp-foto" name="FOTO" type="file" accept="image/*"></div>
        <div class="actions">
          <button type="submit" class="btn btn-success">Guardar empleado</button>
          <button type="reset" class="btn btn-danger">Limpiar</button>
        </div>
      </form>

      <h5 class="mt">Equipo registrado</h5>
      <div class="table-wrap">
        <table>
          <thead>
            <tr><th>Foto</th><th>Nombre</th><th>Apellido</th><th>Tipo doc.</th><th>Documento</th>
                <th>Rol</th><th>Teléfono</th><th>Correo</th><th>Ingreso</th><th>Acciones</th></tr>
          </thead>
          <tbody>
          <?php if (mysqli_num_rows($empleados) === 0): ?>
            <tr><td colspan="10" class="vacio">Aún no hay empleados. Registra el primero con el formulario de arriba.</td></tr>
          <?php endif; ?>
          <?php while ($f = mysqli_fetch_assoc($empleados)): ?>
            <tr>
              <td><?php if (!empty($f['FOTO'])): ?><img src="<?= e($f['FOTO']) ?>" alt="Foto de <?= e($f['NOMBRE']) ?>"><?php else: ?>Sin foto<?php endif; ?></td>
              <td><?= e($f['NOMBRE']) ?></td>
              <td><?= e($f['APELLIDO']) ?></td>
              <td><?= e($f['TIPO_DOCUMENTO']) ?></td>
              <td><?= e($f['NUM_DOCUMENTO']) ?></td>
              <td><?= e($f['ROL_EMPLEADO']) ?></td>
              <td><?= e($f['NUMERO_TELEFONO']) ?></td>
              <td><?= e($f['CORREO']) ?></td>
              <td><?= !empty($f['FECHA_INGRESO_EMPLEADO']) ? e(date("d-m-Y", strtotime($f['FECHA_INGRESO_EMPLEADO']))) : '—' ?></td>
              <td>
                <a href="archivos_editar/editarempleado.php?id=<?= (int)$f['ID_EMPLEADO'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="CRUD_SPRR/eliminar/eliminarempleado.php?id=<?= (int)$f['ID_EMPLEADO'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar a este empleado?')">Eliminar</a>
              </td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>