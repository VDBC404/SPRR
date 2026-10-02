<?php
session_start();
include("Config/conexion.php");

if (empty($_SESSION['NIT_RESTAURANTE'])) {
    header("Location: INICIO_DE_SESION.php");
    exit();
}
$nit = $_SESSION['NIT_RESTAURANTE'];
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

$stmt = mysqli_prepare($conexion, "SELECT * FROM menus WHERE NIT_RESTAURANTE = ?");
mysqli_stmt_bind_param($stmt, "s", $nit);
mysqli_stmt_execute($stmt);
$platos = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menús | SPRR</title>
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
        <a href="menus.php" class="active">Menús</a>
        <a href="configusuario.php">Config</a>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="wrap">
      <h2>Menús</h2>
      <p>Organiza los platos, precios y fotos de tu carta.</p>
    </div>
  </section>

  <main class="wrap">
    <div class="cards">
      <a class="card" href="empleados.php"><div class="card-emoji">👨‍🍳</div><h3>Empleados</h3><p>Altas, bajas y datos.</p></a>
      <a class="card" href="inventario.php"><div class="card-emoji">📦</div><h3>Inventario</h3><p>Productos y proveedores.</p></a>
      <a class="card active" href="menus.php"><div class="card-emoji">🍽️</div><h3>Menús</h3><p>Platos, precios y categorías.</p></a>
    </div>


    <div class="panel">
      <h4>Registrar plato</h4>
      <form class="form-grid" action="CRUD_SPRR/insertar/insertarmenus.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="NIT_RESTAURANTE" value="<?= e($nit) ?>">

        <div class="field"><label for="menu-nombre">Nombre del plato</label>
          <input id="menu-nombre" name="NOMBRE" type="text" placeholder="Ej. Bandeja paisa" required></div>
        <div class="field"><label for="menu-categoria">Categoría</label>
          <select id="menu-categoria" name="CATEGORIA" required>
            <option value="">Selecciona…</option>
            <option>Entrada</option><option>Plato fuerte</option><option>Bebida</option>
            <option>Postre</option><option>Otro</option>
          </select></div>
        <div class="field full"><label for="menu-ingredientes">Ingredientes</label>
          <textarea id="menu-ingredientes" name="INGREDIENTES" rows="3" placeholder="Ej. Arroz, frijoles, carne molida, huevo, arepa" required></textarea></div>
        <div class="field"><label for="menu-precio">Precio (COP)</label>
          <input id="menu-precio" name="PRECIO" type="number" min="0" placeholder="Ej. 25000" required></div>
        <div class="field"><label for="menu-foto">Foto del plato</label>
          <input id="menu-foto" name="IMAGEN" type="file" accept="image/*"></div>
        <div class="actions">
          <button type="submit" class="btn btn-success">Guardar plato</button>
          <button type="reset" class="btn btn-danger">Limpiar</button>
        </div>
      </form>

      <h5 class="mt">Platos registrados</h5>
      <div class="table-wrap">
        <table>
          <thead>
            <tr><th>Foto</th><th>Nombre</th><th>Categoría</th><th>Ingredientes</th><th>Precio</th><th>Acciones</th></tr>
          </thead>
          <tbody>
          <?php if (mysqli_num_rows($platos) === 0): ?>
            <tr><td colspan="6" class="vacio">Aún no hay platos. Agrega el primero con el formulario de arriba.</td></tr>
          <?php endif; ?>
          <?php while ($f = mysqli_fetch_assoc($platos)): ?>
            <tr>
              <td><?php if (!empty($f['IMAGEN'])): ?><img src="<?= e($f['IMAGEN']) ?>" alt="<?= e($f['NOMBRE']) ?>"><?php else: ?>Sin foto<?php endif; ?></td>
              <td><?= e($f['NOMBRE']) ?></td>
              <td><?= e($f['CATEGORIA']) ?></td>
              <td><?= e($f['INGREDIENTES']) ?></td>
              <td>$<?= number_format((float)$f['PRECIO'], 0, ',', '.') ?></td>
              <td>
                <a href="archivos_editar/editarmenu.php?id=<?= (int)$f['ID_MENU'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="CRUD_SPRR/eliminar/eliminarmenu.php?id=<?= (int)$f['ID_MENU'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este plato?')">Eliminar</a>
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