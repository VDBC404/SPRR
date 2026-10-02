<?php
session_start();
include("../Config/conexion.php");

if (!isset($_SESSION['NIT_RESTAURANTE'])) {
    header("Location: ../INICIO_DE_SESION.php");
    exit();
}

$nit = mysqli_real_escape_string($conexion, $_SESSION['NIT_RESTAURANTE']);

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Error: ID del menú no especificado.";
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM menus WHERE ID_MENU = '$id' AND NIT_RESTAURANTE = '$nit' LIMIT 1";
$query = mysqli_query($conexion, $sql);

if (!$query || mysqli_num_rows($query) === 0) {
    echo "No se encontró el plato seleccionado.";
    exit();
}

$fila = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Menú</title>
  <link rel="stylesheet" href="../CSS/sprrinv.css" />
  <link rel="stylesheet" href="../CSS/bootstrap.min.css">
</head>
<body>
  <header class="topbar">
    <div class="wrap">
      <a href="../index.php"><img class="brand" src="../IMG/sprr_logo_transparente.png" alt="" height="30px" width="60px"></a>
      <h1 class="brand">Gestión de Restaurante</h1>
      <nav class="main-nav">
        <a href="../index.php">Home</a>
        <a href="../empleados.php">Empleados</a>
        <a href="../inventario.php">Inventario</a>
        <a href="../menus.php" class="active">Menús</a>
        <a href="../configusuario.php">Config</a>
      </nav>
    </div>
  </header>

  <section class="tabs wrap">
    <div class="inventario-box">
      <h4>Editar Plato</h4>

      <form class="form-grid" action="../CRUD_SPRR/actualizar/actualizarmenu.php" method="POST" enctype="multipart/form-data">
        <!-- IDs ocultos -->
        <input type="hidden" name="ID_MENU" value="<?php echo $fila['ID_MENU']; ?>">
        <input type="hidden" name="NIT_RESTAURANTE" value="<?php echo $nit; ?>">
        <input type="hidden" name="IMAGEN_ACTUAL" value="<?php echo htmlspecialchars($fila['IMAGEN']); ?>">

        <div class="field">
          <label for="NOMBRE">Nombre del plato</label>
          <input id="NOMBRE" name="NOMBRE" type="text" 
                 value="<?php echo htmlspecialchars($fila['NOMBRE']); ?>" required>
        </div>

        <div class="field">
          <label for="CATEGORIA">Categoría</label>
          <select id="CATEGORIA" name="CATEGORIA" required>
            <option value="">Selecciona…</option>
            <?php
            $categorias = ["Entrada", "Plato fuerte", "Bebida", "Postre", "Otro"];
            foreach ($categorias as $cat) {
                $selected = ($fila['CATEGORIA'] == $cat) ? 'selected' : '';
                echo "<option $selected>$cat</option>";
            }
            ?>
          </select>
        </div>

        <div class="field full">
          <label for="INGREDIENTES">Ingredientes</label>
          <textarea id="INGREDIENTES" name="INGREDIENTES" rows="3" required><?php echo htmlspecialchars($fila['INGREDIENTES']); ?></textarea>
        </div>

        <div class="field">
          <label for="PRECIO">Precio</label>
          <input id="PRECIO" name="PRECIO" type="number" min="0" 
                 value="<?php echo htmlspecialchars($fila['PRECIO']); ?>" required>
        </div>

        <div class="field">
          <label for="IMAGEN">Foto actual</label><br>
          <?php if (!empty($fila['IMAGEN'])): ?>
            <img src="../<?php echo $fila['IMAGEN']; ?>" alt="Plato" width="120" class="rounded mb-2">
          <?php else: ?>
            <p>Sin imagen disponible</p>
          <?php endif; ?>
          <input id="IMAGEN" name="IMAGEN" type="file" accept="image/*">
        </div>

        <div class="actions">
          <button type="submit" class="btn btn-success">Actualizar</button>
          <a href="../menus.php" class="btn btn-danger">Cancelar</a>
        </div>
      </form>
    </div>
  </section>
</body>
</html>
