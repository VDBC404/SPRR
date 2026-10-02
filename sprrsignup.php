<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro | SPRR</title>
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
        <a href="INICIO_DE_SESION.php">Iniciar sesión</a>
        <a href="sprrsignup.php" class="active">Regístrate</a>
        <a href="sprrhome.php">Home</a>
      </nav>
    </div>
  </header>

  <main class="auth-box">
    <h2>Crea tu cuenta</h2>
    <p class="subtitle">Registra tu restaurante y empieza a administrarlo.</p>

    <form action="CRUD_SPRR/insertar/insertarregistro.php" method="POST">
      <label for="email">Correo electrónico</label>
      <input type="email" id="email" name="CORREO" placeholder="ejemplo@correo.com" autocomplete="email" required>

      <label for="name">Nombre del dueño</label>
      <input type="text" id="name" name="NOMBRE_DUEÑO" required>

      <label for="password">Contraseña</label>
      <input type="password" id="password" name="CONTRASEÑA" autocomplete="new-password" required>

      <label for="nit">NIT del negocio</label>
      <input type="text" id="nit" name="NIT_RESTAURANTE" placeholder="123456789-0" required>

      <label for="phone">Teléfono</label>
      <input type="tel" id="phone" name="TELEFONO" placeholder="300 123 4567" required>

      <label for="restaurant">Nombre del restaurante</label>
      <input type="text" id="restaurant" name="NOMBRE_RESTAURANTE" required>

      <label for="address">Dirección del restaurante</label>
      <input type="text" id="address" name="DIRECCION_UBICACION" placeholder="Calle 123 #45-67, Medellín" required>

      <button type="submit">Crear cuenta</button>
    </form>

    <p class="login-link">¿Ya tienes cuenta? <a href="INICIO_DE_SESION.php">Inicia sesión</a></p>
  </main>
</body>
</html>