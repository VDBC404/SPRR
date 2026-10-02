<?php
    include_once('../Config/conexion.php');
    $id = $_REQUEST['Id'];

    $sql = "SELECT * FROM cliente WHERE id = '$id'";
    $query = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <h1 class="bg-warning p-2 text-while text-center">Editar cliente</h1>
    <br>

    <div class="container">
         <form action="../CRUD/editar.php" method="POST">

          <input type="Hidden" name="id" value="<?php echo $fila['id']?>">
            <div class="mb-3">
                 <label class="form-label">DNI</label>
                 <input type="text" class="form-control" placeholder="DNI" name="dni" value="<?php echo $fila['dni']?>">
            </div>
            <div class="mb-3">
                 <label class="form-label">Nombre</label>
                 <input type="text" class="form-control" placeholder="Nombre Cliente" name="nombre" value="<?php echo $fila['nombre']?>">
            </div>
            <div class="mb-3">
                 <label class="form-label">Apellido</label>
                 <input type="text" class="form-control" placeholder="Apellido Cliente" name="apellido" value="<?php echo $fila['apellido']?>">
            </div>
            <div class="mb-3">
                 <label class="form-label">Correo</label>
                 <input type="text" class="form-control" placeholder="Correo" name="correo" value="<?php echo $fila['correo']?>">
            </div>
            <div class="mb-3">
                 <label class="form-label">Telefono</label>
                 <input type="text" class="form-control" placeholder="Telefono" name="telefono" value="<?php echo $fila['telefono']?>">
            </div>
            <div class="container texte-center">
                 <button type="submit" class="btn btn-primary">Editar Cliente</button>
                 <a href="../index.php" class="btn btn-dark">Regresar</a>
            </div>
         </form>

    </div>
</body>
</html>