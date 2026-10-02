<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Document</title>
</head>
    <body class="bg-light" style="height: 100vh;">
    
    <!-- el nav -->
  <ul class="nav justify-content-center bg-white py-2 shadow-sm mb-4">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
</ul>
    <!-- Formlario-->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="col-md-5">
    <div class="card shadow-lg">
      <div class="card-body p-4">
        <h3 class="card-title text-center mb-4">Iniciar Sesión</h3>
        <form action="../logica/loguear.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="correo" id="email" placeholder="ejemplo@correo.com" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contraseña" id="password" placeholder="Ingresa tu contraseña" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="recordar">
            <label class="form-check-label" for="recordar">Recordarme</label>
          </div>
          <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
        <div class="mt-3 text-center">
          <a href="#">¿Olvidaste tu contraseña?</a>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Footer -->
       <footer class="bg-dark text-white pt-4 pb-3 mt-auto">
  <div class="container text-center text-md-start">
    <div class="row">
      <div class="col-md-6 mb-3">
        <h5>MiEmpresa S.A.S</h5>
        <p>© 2025 MiEmpresa. Todos los derechos reservados.</p>
        <p>Correo: contacto@miempresa.com</p>
        <p>Teléfono: +57 300 123 4567</p>
      </div>
      <div class="col-md-6 mb-3 text-md-end">
        <h5>Síguenos</h5>
        <a href="#" class="text-white me-3">
          <i class="fab fa-facebook fa-lg"></i>
        </a>
        <a href="#" class="text-white me-3">
          <i class="fab fa-twitter fa-lg"></i>
        </a>
        <a href="#" class="text-white me-3">
          <i class="fab fa-instagram fa-lg"></i>
        </a>
        <a href="#" class="text-white">
          <i class="fab fa-linkedin fa-lg"></i>
        </a>
      </div>
    </div>
  </div>
</footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>