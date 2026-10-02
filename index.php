<?php
session_start();
if (!isset($_SESSION['NIT_RESTAURANTE'])) {
    header("Location: INICIO_DE_SESION.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio | SPRR</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/sprr.css">
</head>
<body>
  <header class="topbar">
    <div class="wrap">
      <a class="brand-box" href="index.php">
        <img src="IMG/sprr_logo_transparente.png" alt="SPRR">
        <span class="brand">Gestión de Restaurante</span>
      </a>
      <nav class="main-nav">
        <a href="index.php" class="active">Home</a>
        <a href="empleados.php">Empleados</a>
        <a href="inventario.php">Inventario</a>
        <a href="menus.php">Menús</a>
        <a href="configusuario.php">Config</a>
      </nav>
    </div>
  </header>

  <main class="wrap inicio">
    <h1>¿Qué quieres hacer hoy?</h1>
    <p class="subtitle">Administra tu equipo, tu despensa y tu carta desde un solo lugar.</p>
    <div class="cards">
      <a class="card" href="empleados.php">
        <div class="card-emoji">👨‍🍳</div>
        <h3>Empleados</h3>
        <p>Registra y actualiza a tu equipo.</p>
      </a>
      <a class="card" href="inventario.php">
        <div class="card-emoji">📦</div>
        <h3>Inventario</h3>
        <p>Controla productos y proveedores.</p>
      </a>
      <a class="card" href="menus.php">
        <div class="card-emoji">🍽️</div>
        <h3>Menús</h3>
        <p>Organiza platos, precios y fotos.</p>
      </a>
    </div>
  </main>

  <footer class="pie">
    <div class="wrap">
      <div>
        <h5>Contáctanos</h5>
        <p>bernalvictor410@gmail.com<br>julianes2008@gmail.com<br>jacobojlucena@gmail.com</p>
      </div>
      <div>
        <h5>¿Quiénes somos?</h5>
        <p>Tres estudiantes que aplican lo aprendido para ayudar a restaurantes a administrar empleados, inventario y menús.</p>
      </div>
      <div>
        <h5>Síguenos</h5>
        <p><a href="https://www.instagram.com/nouaccz_/" target="_blank" rel="noopener">Instagram 1</a><br>
        <a href="https://www.instagram.com/jjuli_nes/" target="_blank" rel="noopener">Instagram 2</a><br>
        <a href="https://www.instagram.com/jkronos51/" target="_blank" rel="noopener">Instagram 3</a></p>
      </div>
    </div>
    <p class="wrap" style="margin-top:1.5rem">© 2025 SPRR. Todos los derechos reservados.</p>
  </footer>
</body>
</html>