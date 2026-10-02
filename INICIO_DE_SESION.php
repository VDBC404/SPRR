<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión | SPRR</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/sprr.css">
</head>
<body class="auth">
  <header class="topbar">
    <div class="wrap">
      <a class="brand-box" href="sprrhome.php">
        <img src="IMG/sprr_logo_transparente.png" alt="SPRR">
        <span class="brand">Gestión de Restaurante</span>
      </a>
      <nav class="main-nav">
        <a href="INICIO_DE_SESION.php" class="active">Iniciar sesión</a>
        <a href="sprrsignup.php">Regístrate</a>
        <a href="sprrhome.php">Home</a>
      </nav>
    </div>
  </header>

  <main class="auth-box">
    <h2>Inicia sesión</h2>
    <p class="subtitle">Entra para administrar empleados, inventario y menús.</p>

    <form action="CRUD_SPRR/validar/validariniciosesion.php" method="POST">
      <label for="email">Correo electrónico</label>
      <input type="email" id="email" name="CORREO" placeholder="ejemplo@correo.com" autocomplete="email" required>

      <label for="password">Contraseña</label>
      <input type="password" id="password" name="CONTRASEÑA" autocomplete="current-password" required>

      <label for="nit">NIT del negocio</label>
      <input type="text" id="nit" name="NIT_RESTAURANTE" placeholder="123456789-0" required>

      <button type="submit">Iniciar sesión</button>
    </form>

    <p class="login-link">¿No tienes cuenta? <a href="sprrsignup.php">Regístrate</a></p>
  </main>
</body>
</html>