<?php
session_start(); 
include("../Config/conexion.php"); 

if (!isset($_SESSION['NIT_RESTAURANTE']) || empty($_SESSION['NIT_RESTAURANTE'])) {
    echo "Acceso denegado. Debes iniciar sesión.";
    header("Location: ../INICIO_DE_SESION.php");
    exit();
}

$nit = mysqli_real_escape_string($conexion, $_SESSION['NIT_RESTAURANTE']);

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Error: ID no proporcionado.";
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM inventario WHERE ID_PRODUCTO = '$id' AND NIT_RESTAURANTE = '$nit' LIMIT 1";
$query = mysqli_query($conexion, $sql);

if (!$query || mysqli_num_rows($query) === 0) {
    echo "No se encontró el producto seleccionado.";
    exit();
}

$fila = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Inventario</title>
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
        <a href="../inventario.php" class="active">Inventario</a>
        <a href="../menus.php">Menús</a>
        <a href="../configusuario.php">Config</a>
      </nav>
    </div>
  </header>

  <section class="tabs wrap">
    <div class="inventario-box">
      <h4>Editar Producto del Inventario</h4>

      <form class="form-grid" action="../CRUD_SPRR/actualizar/actualizarinventario.php" method="POST">
        <input type="hidden" name="ID_PRODUCTO" value="<?php echo $fila['ID_PRODUCTO']; ?>">
        <input type="hidden" name="NIT_RESTAURANTE" value="<?php echo $nit; ?>">

        <div class="field">
          <label for="NOMBRE_PRODUCTO">Producto</label>
          <input id="NOMBRE_PRODUCTO" name="NOMBRE_PRODUCTO" type="text" 
                 value="<?php echo htmlspecialchars($fila['NOMBRE_PRODUCTO']); ?>" required>
        </div>

        <div class="field">
          <label for="CATEGORIA_PRODUCTO">Categoría</label>
          <select id="CATEGORIA_PRODUCTO" name="CATEGORIA_PRODUCTO" required>
            <option value="">Selecciona…</option>
            <?php
            $categorias = ["Verduras", "Carnicos", "Lacteos", "Bebidas", "Frutas", "Otros"];
            foreach ($categorias as $categoria) {
                $selected = ($fila['CATEGORIA_PRODUCTO'] == $categoria) ? 'selected' : '';
                echo "<option $selected>$categoria</option>";
            }
            ?>
          </select>
        </div>

        <div class="field">
          <label for="CANTIDAD">Cantidad</label>
          <input id="CANTIDAD" name="CANTIDAD" type="number" min="0" step="1"
                 value="<?php echo htmlspecialchars($fila['CANTIDAD']); ?>" required>
        </div>

        <div class="field">
          <label for="UNIDAD_MEDIDA">Unidad</label>
          <select id="UNIDAD_MEDIDA" name="UNIDAD_MEDIDA">
            <?php
            $unidades = ["miligramos", "gramos", "kilogramos", "mililitro", "litro", "unidad"];
            foreach ($unidades as $unidad) {
                $selected = ($fila['UNIDAD_MEDIDA'] == $unidad) ? 'selected' : '';
                echo "<option $selected>$unidad</option>";
            }
            ?>
          </select>
        </div>

        <div class="field">
          <label for="NOMBRE_PROVEEDOR">Proveedor</label>
          <input id="NOMBRE_PROVEEDOR" name="NOMBRE_PROVEEDOR" type="text"
                 value="<?php echo htmlspecialchars($fila['NOMBRE_PROVEEDOR']); ?>">
        </div>

        <div class="field full">
          <label for="NOTAS">Notas</label>
          <textarea id="NOTAS" name="NOTAS" rows="3"><?php echo htmlspecialchars($fila['NOTAS']); ?></textarea>
        </div>

        <div class="actions">
          <button type="submit" class="btn btn-success">Actualizar</button>
          <a href="../inventario.php" class="btn btn-danger">Cancelar</a>
        </div>
      </form>
    </div>
  </section>
</body>
</html>
