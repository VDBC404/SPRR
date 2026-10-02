<?php
    include_once('../Config/conexion.php');
    $id = $_REQUEST['Id'];

    $sql = "SELECT * FROM productojuegos WHERE id = '$id'";
    $query = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar jueguito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <h1 class="bg-warning p-2 text-while text-center">Editar jueguito</h1>
    <br>

    <div class="container">
         <form action="../CRUD/editar.php" method="POST">

          <input type="Hidden" name="id" value="<?php echo $fila['id']?>">
            <div class="mb-3">
                 <label class="form-label">nombre juego</label>
                 <input type="text" class="form-control" placeholder="nombre del juego" name="nombreproducto" value="<?php echo $fila['nombreproducto']?>">
            </div>
            <div class="mb-3">
                 <label class="form-label">genero del juego</label>
                 <select class="form-control" name="generojuego">
                    <option value="shooter" <?php if($fila['generojuego'] == 'shooter') echo 'selected'; ?>>Shooter</option>
                    <option value="rpg" <?php if($fila['generojuego'] == 'rpg') echo 'selected'; ?>>RPG</option>
                    <option value="tipo souls" <?php if($fila['generojuego'] == 'tipo souls') echo 'selected'; ?>>Tipo Souls</option>
                    <option value="familiar" <?php if($fila['generojuego'] == 'familiar') echo 'selected'; ?>>Familiar</option>
                 </select>
            </div>
            <div class="mb-3">
                 <label class="form-label">cantidad</label>
                 <input type="text" class="form-control" placeholder="cantidad disponible" name="cantidad" value="<?php echo $fila['cantidad']?>">
            </div>
            <div class="container texte-center">
                 <button type="submit" class="btn btn-primary">Editar juego</button>
                 <a href="../index.php" class="btn btn-dark">Regresar</a>
            </div>
         </form>

    </div>
</body>
</html>