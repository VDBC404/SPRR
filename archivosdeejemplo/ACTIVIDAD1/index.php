<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD MYSQLI</title>
    <link rel="stylesheet" href="BOOSTRAP/boostrap.css">
</head>
<body>
    <h1 class="bg-warning p-2 text-white text-center">CRUD MYSQLI</h1>
    <br>
    <div class="container">
        <a href="Forms/agregarcliente.php" class="btn btn-danger">Agregar productos</a>
    </div>
    <br>
    <div class="container bg-light p-3 border-dark rounded">
      <h1>Lista de productos</h1>
      <table class="table">
          <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantiad en KG</th>
                <th scope="col">Tipo producto</th>
            </tr>
          </thead>
        <tbody>
            <?php
            include("Config/conexion.php");

            $sql = "SELECT * FROM tabla_productos";
            $query = mysqli_query($conexion, $sql);

            while ($fila = mysqli_fetch_array($query)) {
             ?>
                 <tr>
                    <th scope="row"><?php echo $fila['ID_PRODUCTO']?></th>
                    <th scope="row"><?php echo $fila['NOMBRE_PRODUCTO']?></th>
                    <th scope="row"><?php echo $fila['PRECIO_PRODUCTO']?></th>
                    <th scope="row"><?php echo $fila['CANTIDAD_EN_KILOGRAMOS']?></th>
                    <th scope="row"><?php echo $fila['TIPO_PRODUCTO']?></th>
                    <th scope="row">
                        <a href="Forms/editar.php?Id=<?php echo $fila['ID_PRODUCTO']?>" class="btn btn-warning">Editar Datos</a>
                        <a href="CRUD/eliminardato.php?Id=<?php echo $fila['ID_PRODUCTO']?>" class="btn btn-danger">Eliminar Datos</a>
                    </th>
                 </tr>
            <?php
            }
            ?>

        </tbody>
      </table>
    </div>
    <br>
    <script src="BOOSTRAP/boostrap2.js"></script>
</body>
</html>