<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="CSS/INICIO DE SESION ESTILO.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <header class="topbar">
    <div class="wrap">
      <img class="brand" src="IMG/sprr_logo_transparente.png" alt="" height="30px" width="60px">
      <h1 class="brand">Gestión de Restaurante</h1>
      <nav class="main-nav">
        <a href="INICIO DE SESION.php" class="active">Iniciar sesión</a>
        <a href="sprrsignup.php">Regístrate</a>
        <a href="sprrhome.php">Home</a>
      </nav>
    </div>
  </header>

    <div class="login">
        <h1>Recupera tu cuenta</h1>
        <form>
          <label for="correo">Correo</label>
          <input type="text" id="usuario" placeholder="Ingresa tu correo electrónico" required>
          <button type="submit" class="boton-siguiente">Siguiente</button>
        </form>
      </div>
</body>
</html>