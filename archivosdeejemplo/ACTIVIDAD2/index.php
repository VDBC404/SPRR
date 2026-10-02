<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tienda de juegos</title>
    <link rel="stylesheet" href="BOOSTRAP/boostrap.css">
</head>
<body>
    <h1 class="bg-warning p-2 text-white text-center">tienda de jueguitos</h1>
    <br>
    <br>
<div class="container">
    <p class="lead">
        Bienvenido a nuestra tienda de juegos. Aquí encontrarás una gran variedad de títulos para todos los gustos: desde shooters intensos hasta aventuras tipo souls. ¡Explora, edita, agrega y gestiona tu catálogo de jueguitos!
    </p>
</div>
<br>
<div class="container my-4">
  <div class="row text-center">
    <div class="col-md-4">
      <img src="img/descarga1.jfif" class="img-fluid rounded" alt="Juego 1">
      <p class="mt-2">Shooter Épico</p>
    </div>
    <div class="col-md-4">
      <img src="img/descarga3.jfif" class="img-fluid rounded" alt="Juego 2">
      <p class="mt-2">RPG de Fantasía</p>
    </div>
    <div class="col-md-4">
      <img src="img/descarga2.jfif" class="img-fluid rounded" alt="Juego 3">
      <p class="mt-2">Souls-like Intenso</p>
    </div>
  </div>
</div>

<br>
    <div class="container">
        <a href="Forms/agregarcliente.php" class="btn btn-danger">Agregar jueguito</a>
    </div>
    <br>
    <div class="container bg-light p-3 border-dark rounded">
      <h1>Lista de juegos</h1>
      <table class="table">
          <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre juego</th>
                <th scope="col">Genero del juego</th>
                <th scope="col">Cantidad disponible</th>
            </tr>
          </thead>
        <tbody>
            <?php
            include("Config/conexion.php");

            $sql = "SELECT * FROM productojuegos";
            $query = mysqli_query($conexion, $sql);

            while ($fila = mysqli_fetch_array($query)) {
             ?>
                 <tr>
                    <th scope="row"><?php echo $fila['id']?></th>
                    <th scope="row"><?php echo $fila['nombreproducto']?></th>
                    <th scope="row"><?php echo $fila['generojuego']?></th>
                    <th scope="row"><?php echo $fila['cantidad']?></th>
                    <th scope="row">
                        <a href="Forms/editardato.php?Id=<?php echo $fila['id']?>" class="btn btn-warning">Editar jueguito</a>
                        <a href="CRUD/eliminardato.php?Id=<?php echo $fila['id']?>" class="btn btn-danger">Eliminar jueguito</a>
                    </th>
                 </tr>
            <?php
            }
            ?>

        </tbody>
      </table>
    </div>
    <br>
    <br>
    <div class="container bg-light p-3 border-dark rounded">
      <h1>ventas de juegos</h1>
      <table class="table">
          <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre juego vendido</th>
                <th scope="col">cantidad vendida</th>
                <th scope="col">precio en pesos colombianos</th>
            </tr>
          </thead>
        <tbody>
            <?php
            include("Config/conexion.php");

            $sql = "SELECT * FROM ventajuegos";
            $query = mysqli_query($conexion, $sql);

            while ($fila = mysqli_fetch_array($query)) {
             ?>
                 <tr>
                    <th scope="row"><?php echo $fila['ids']?></th>
                    <th scope="row"><?php echo $fila['nombreproductos']?></th>
                    <th scope="row"><?php echo $fila['cantidadvendida']?></th>
                    <th scope="row"><?php echo $fila['preciopesos']?></th>
                    <th scope="row">
                        <a href="CRUD/eliminardato2.php?Ids=<?php echo $fila['ids']?>" class="btn btn-danger">Eliminar venta</a>
                    </th>
                 </tr>
            <?php
            }
            ?>

        </tbody>
      </table>
    </div>
    <script src="BOOSTRAP/boostrap2.js"></script>
</body>
<footer class="bg-dark text-white text-center p-3">
    <p>&copy; 2025 Tienda de Jueguitos. Todos los derechos reservados.</p>
    <p>Explora, administra y disfruta del mejor catálogo de videojuegos en un solo lugar.</p>
    <div>
        <a href="#" class="text-white me-3">Facebook: @TiendaJueguitos</a> |
        <a href="#" class="text-white me-3">Instagram: @jueguitos_online</a> |
        <a href="#" class="text-white">Twitter/X: @GameTienda</a>
    </div>
</footer>
</html>