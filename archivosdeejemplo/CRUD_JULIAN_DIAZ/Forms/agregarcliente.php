<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <h1 class="bg-warning p-2 text-while text-center">Agregar cliente</h1>
    <br>

    <div class="container">
         <form action="../CRUD/insertar.php" method="POST">
            <div class="mb-3">
                 <input type="text" class="form-control" placeholder="DNI" name="dni">
            </div>
            <div class="mb-3">
                 <input type="text" class="form-control" placeholder="Nombre Cliente" name="nombre">
            </div>
            <div class="mb-3">
                 <input type="text" class="form-control" placeholder="Apellido Cliente" name="apellido">
            </div>
            <div class="mb-3">
                 <input type="text" class="form-control" placeholder="Correo" name="correo">
            </div>
            <div class="mb-3">
                 <input type="text" class="form-control" placeholder="Telefono" name="telefono">
            </div>
            <div class="container texte-center">
                 <button type="submit" class="btn btn-primary">Agregar Cliente</button>
                 <a href="../index.php" class="btn btn-dark">Regresar</a>
            </div>
         </form>

    </div>
</body>
</html>