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
        <a href="Forms/agregarcliente.php" class="btn btn-danger">Agregar cliente</a>
    </div>
    <br>
    <div class="container bg-light p-3 border-dark rounded">
      <h1>Lista de clientes</h1>
      <table class="table">
          <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">DNI</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">CORREO</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">ACCIONES</th>
            </tr>
          </thead>
        <tbody>
            <?php
            include("Config/conexion.php");

            $sql = "SELECT * FROM cliente";
            $query = mysqli_query($conexion, $sql);

            while ($fila = mysqli_fetch_array($query)) {
             ?>
                 <tr>
                    <th scope="row"><?php echo $fila['id']?></th>
                    <th scope="row"><?php echo $fila['dni']?></th>
                    <th scope="row"><?php echo $fila['nombre']?></th>
                    <th scope="row"><?php echo $fila['apellido']?></th>
                    <th scope="row"><?php echo $fila['correo']?></th>
                    <th scope="row"><?php echo $fila['telefono']?></th>
                    <th scope="row">
                        <a href="Forms/editardato.php?Id=<?php echo $fila['id']?>" class="btn btn-warning">Editar Datos</a>
                        <a href="CRUD/eliminardato.php?Id=<?php echo $fila['id']?>" class="btn btn-danger">Eliminar Datos</a>
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