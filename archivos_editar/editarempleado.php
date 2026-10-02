<?php
session_start(); 
include("../Config/conexion.php");

if (!isset($_SESSION['NIT_RESTAURANTE'])) {
   header("Location: INICIO_DE_SESION.php");
   exit();
}

$NIT_RESTAURANTE = $_SESSION['NIT_RESTAURANTE'];

// Validar que llegue el id
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Error: no se proporcionó el ID del empleado.";
    exit();
}

$id = intval($_GET['id']);

// Consultar los datos del empleado
$sql = "SELECT * FROM registro_empleados WHERE NIT_RESTAURANTE = '$NIT_RESTAURANTE' AND ID_EMPLEADO = '$id'";
$query = mysqli_query($conexion, $sql);

if (!$query || mysqli_num_rows($query) === 0) {
    echo "No se encontró el empleado.";
    exit();
}

$fila = mysqli_fetch_array($query); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SPRR · Editar Datos de Empleado</title>
  <link rel="stylesheet" href="../CSS/sprrinv.css" />
  <link rel="stylesheet" href="../CSS/bootstrap.min.css" />
</head>
<body>
  <header class="topbar">
    <div class="wrap">
      <img class="brand" src="../IMG/sprr_logo_transparente.png" alt="SPRR" height="30" width="60">
      <h1 class="brand">Gestión de Restaurante</h1>
      <nav class="main-nav">
        <a href="../empleados.php" class="active">Empleados</a>
        <a href="../inventario.php">Inventario</a>
        <a href="../menus.php">Menús</a>
        <a href="../index.php">Home</a>
        <a href="../configusuario.php">Config</a>
      </nav>
    </div>
  </header>

  <section class="wrap">
    <div class="inventario-box">
      <h4>Editar datos del empleado</h4>
      <p class="subtitle">Modifica los datos del empleado seleccionado.</p>

      <form class="form-grid" action="../CRUD_SPRR/actualizar/actualizarempleado.php" method="POST" enctype="multipart/form-data">
        <!-- ID oculto -->
        <input type="hidden" name="ID_EMPLEADO" value="<?php echo $fila['ID_EMPLEADO']; ?>">
        <input type="hidden" name="NIT_RESTAURANTE" value="<?php echo $NIT_RESTAURANTE; ?>">

        <div class="field full text-center mb-3">
          <label>Foto actual:</label><br>
          <?php if (!empty($fila['FOTO'])): ?>
            <img src="../<?php echo $fila['FOTO']; ?>" alt="Foto empleado" width="100" class="rounded">
          <?php else: ?>
            <p>Sin foto registrada</p>
          <?php endif; ?>
          <input type="file" name="FOTO" accept="image/*">
        </div>

          <div class="field">
            <label for="TIPO_DOCUMENTO">Tipo de documento</label>
            <select id="TIPO_DOCUMENTO" name="TIPO_DOCUMENTO" required>
              <option value="">Selecciona…</option>
              <?php
              $tiposDocumento = [
                "Cedula de Ciudadanía",
                "Cedula Extranjera",
                "permiso por protección temporal",
                "Pasaporte"
              ];
              foreach ($tiposDocumento as $tipo) {
                  $selected = ($fila['TIPO_DOCUMENTO'] == $tipo) ? 'selected' : '';
                  echo "<option value='$tipo' $selected>$tipo</option>";
              }
              ?>
            </select>
          </div>

        <div class="field">
          <label for="NUM_DOCUMENTO">Número de documento</label>
          <input id="NUM_DOCUMENTO" name="NUM_DOCUMENTO" type="text" value="<?php echo htmlspecialchars($fila['NUM_DOCUMENTO']); ?>" required>
        </div>

        <div class="field">
          <label for="NOMBRE">Nombre</label>
          <input id="NOMBRE" name="NOMBRE" type="text" value="<?php echo htmlspecialchars($fila['NOMBRE']); ?>" required>
        </div>

        <div class="field">
          <label for="APELLIDO">Apellido</label>
          <input id="APELLIDO" name="APELLIDO" type="text" value="<?php echo htmlspecialchars($fila['APELLIDO']); ?>" required>
        </div>

        <div class="field">
          <label for="CORREO">Correo</label>
          <input id="CORREO" name="CORREO" type="email" value="<?php echo htmlspecialchars($fila['CORREO']); ?>" required>
        </div>

        <div class="field">
          <label for="NUMERO_TELEFONO">Número de Teléfono</label>
          <input id="NUMERO_TELEFONO" name="NUMERO_TELEFONO" type="tel" value="<?php echo htmlspecialchars($fila['NUMERO_TELEFONO']); ?>">
        </div>

          <div class="field">
            <label for="ROL_EMPLEADO">Rol del empleado</label>
            <select id="ROL_EMPLEADO" name="ROL_EMPLEADO" required>
              <option value="">Selecciona…</option>
              <?php
              $rolesEmpleado = [
                "Cocinero",
                "Mesero",
                "Cajero",
                "Administrador",
                "Multiproposito",
                "otro"
              ];
              foreach ($rolesEmpleado as $rol) {
                  $selected = ($fila['ROL_EMPLEADO'] == $rol) ? 'selected' : '';
                  echo "<option value='$rol' $selected>$rol</option>";
              }
              ?>
            </select>
          </div>

        <div class="field">
          <label for="FECHA_INGRESO_EMPLEADO">Fecha de ingreso</label>
          <input id="FECHA_INGRESO_EMPLEADO" name="FECHA_INGRESO_EMPLEADO" type="date" value="<?php echo htmlspecialchars($fila['FECHA_INGRESO_EMPLEADO']); ?>">
        </div>

        <div class="actions d-flex justify-content-between mt-3">
          <button type="submit" class="btn btn-success">Guardar cambios</button>
          <a class="btn btn-danger" href="../empleados.php">Cancelar</a>
        </div>
      </form>
    </div>
  </section>
</body>
</html>
