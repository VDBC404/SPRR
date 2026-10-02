<?php
session_start();
include("Config/conexion.php");

if (empty($_SESSION['NIT_RESTAURANTE'])) {
    header("Location: INICIO_DE_SESION.php");
    exit();
}

$nit = $_SESSION['NIT_RESTAURANTE'];

// Consulta preparada: evita inyección SQL
$stmt = mysqli_prepare($conexion, "SELECT * FROM inventario WHERE NIT_RESTAURANTE = ?");
mysqli_stmt_bind_param($stmt, "s", $nit);
mysqli_stmt_execute($stmt);
$productos = mysqli_stmt_get_result($stmt);

function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventario | SPRR</title>
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
        <a href="inventario.php" class="active">Inventario</a>
        <a href="menus.php">Menús</a>
        <a href="configusuario.php">Config</a>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="wrap">
      <h2>Inventario</h2>
      <p>Productos, cantidades y proveedores al día.</p>
    </div>
  </section>

  <main class="wrap">
    <div class="cards">
      <a class="card" href="empleados.php"><div class="card-emoji">👨‍🍳</div><h3>Empleados</h3><p>Altas, bajas y datos.</p></a>
      <a class="card active" href="inventario.php"><div class="card-emoji">📦</div><h3>Inventario</h3><p>Productos y proveedores.</p></a>
      <a class="card" href="menus.php"><div class="card-emoji">🍽️</div><h3>Menús</h3><p>Platos, precios y categorías.</p></a>
    </div>

    <div class="panel">
      <h4>Agregar producto</h4>
      <form class="form-grid" action="CRUD_SPRR/insertar/insertarinventario.php" method="POST">
        <input type="hidden" name="NIT_RESTAURANTE" value="<?= e($nit) ?>">

        <div class="field">
          <label for="NOMBRE_PRODUCTO">Producto</label>
          <input id="NOMBRE_PRODUCTO" name="NOMBRE_PRODUCTO" type="text" placeholder="Ej. Tomate chonto" required>
        </div>
        <div class="field">
          <label for="CATEGORIA_PRODUCTO">Categoría</label>
          <select id="CATEGORIA_PRODUCTO" name="CATEGORIA_PRODUCTO" required>
            <option value="">Selecciona…</option>
            <option>Verduras</option><option>Carnicos</option><option>Lacteos</option>
            <option>Bebidas</option><option>Frutas</option><option>Otros</option>
          </select>
        </div>
        <div class="field">
          <label for="CANTIDAD">Cantidad</label>
          <input id="CANTIDAD" name="CANTIDAD" type="number" min="0" step="1" placeholder="Ej. 20" required>
        </div>
        <div class="field">
          <label for="UNIDAD_MEDIDA">Unidad</label>
          <select id="UNIDAD_MEDIDA" name="UNIDAD_MEDIDA">
            <option>miligramos</option><option>gramos</option><option>kilogramos</option>
            <option>mililitro</option><option>litro</option><option>unidad</option>
          </select>
        </div>
        <div class="field full">
          <label for="NOMBRE_PROVEEDOR">Proveedor</label>
          <input id="NOMBRE_PROVEEDOR" name="NOMBRE_PROVEEDOR" type="text" placeholder="Nombre del proveedor">
        </div>
        <div class="field full">
          <label for="NOTAS">Notas</label>
          <textarea id="NOTAS" name="NOTAS" rows="3" placeholder="Lote, fecha de vencimiento, condiciones de almacenamiento"></textarea>
        </div>
        <div class="actions">
          <button type="submit" class="btn btn-success">Guardar producto</button>
          <button type="reset" class="btn btn-danger">Limpiar</button>
        </div>
      </form>

      <h5 class="mt">Productos registrados</h5>
      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Producto</th><th>Categoría</th><th>Cantidad</th><th>Unidad</th>
              <th>Proveedor</th><th>Notas</th><th>Ingreso</th><th>Acciones</th>
            </tr>
          </thead>
          <tbody>
          <?php if (mysqli_num_rows($productos) === 0): ?>
            <tr><td colspan="8" class="vacio">Aún no hay productos. Agrega el primero con el formulario de arriba.</td></tr>
          <?php endif; ?>
          <?php while ($f = mysqli_fetch_assoc($productos)): ?>
            <tr>
              <td><?= e($f['NOMBRE_PRODUCTO']) ?></td>
              <td><?= e($f['CATEGORIA_PRODUCTO']) ?></td>
              <td><?= e($f['CANTIDAD']) ?></td>
              <td><?= e($f['UNIDAD_MEDIDA']) ?></td>
              <td><?= e($f['NOMBRE_PROVEEDOR']) ?></td>
              <td><?= e($f['NOTAS']) ?></td>
              <td><?= e($f['FECHA_INGRESO_PRODUCTO']) ?></td>
              <td>
                <a href="archivos_editar/editarinventario.php?id=<?= (int)$f['ID_PRODUCTO'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="CRUD_SPRR/eliminar/eliminarinventario.php?id=<?= (int)$f['ID_PRODUCTO'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
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