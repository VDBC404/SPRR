<?php

session_start();

$correo = $_SESSION ['correo'];

if(!isset($correo)){
    header("location: loguin.php");
} else{


echo "<h1> bienvenido a  la mejor pagina del mundo $correo </h1>";


echo"<a href='logica/salir.php'> SALIR   </a>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/estiloindex.css">
    <title>Document</title>
</head>
    <body style="height: 100vh;">
    
    <!-- el nav -->
<div id="fondonavegacion">
  <ul class="nav justify-content-center py-2 shadow-sm mb-4">
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
</div>
    <!-- carrusel-->
    <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/miyabi1.jfif" class="d-block mx-auto" alt="..." style="max-width: 100%; height: auto;">
    </div>
    <div class="carousel-item">
      <img src="img/miyabi2.jfif" class="d-block mx-auto" alt="..." style="max-width: 100%; height: auto;">
    </div>
    <div class="carousel-item">
      <img src="img/miyabi3.jfif" class="d-block mx-auto" alt="..." style="max-width: 100%; height: auto;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<h1>TITULO</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero nihil laborum sit, odit quisquam neque, suscipit fugiat earum beatae eaque nobis numquam magnam tenetur, expedita tempora dolores est totam dolorem. Iusto error, ea suscipit provident saepe temporibus sapiente non voluptatem obcaecati quo vel labore magnam itaque alias doloribus eaque sed. Dicta at dignissimos fuga iusto placeat et molestiae possimus totam fugit exercitationem officia mollitia ex assumenda vitae eaque facere necessitatibus quia eum, numquam cum perferendis inventore magnam adipisci? Illo suscipit saepe placeat corporis distinctio! Vitae aut placeat rerum cupiditate beatae et tempora! Officia quaerat sapiente non culpa facilis, totam illo reprehenderit, ab recusandae soluta deleniti maxime dolorum, ea eligendi. Deleniti fugiat minima sapiente, ad, in esse cum minus aperiam culpa vel dolores vitae distinctio nisi, ratione debitis autem est laudantium? Quibusdam facere magni laboriosam libero ad ullam earum fuga tempore excepturi dolore ipsum, expedita totam eius in, voluptas doloremque. Quos natus distinctio qui ab facere sapiente quisquam repellendus vel reprehenderit asperiores beatae, expedita velit, cum eos nam molestias praesentium necessitatibus ea ratione id ipsa quam illum. Officiis veniam eius ex laudantium quos vel perspiciatis corporis sit earum sint ipsam libero exercitationem voluptatum in doloremque nostrum, sed doloribus alias. Possimus recusandae adipisci, in voluptatum corrupti eius tempora dolore quo fugiat suscipit aspernatur culpa impedit. Quisquam obcaecati quae necessitatibus. Magni quia corporis a vel libero eos iste, fugit recusandae delectus! Dignissimos, velit itaque laboriosam veritatis fugit rerum harum aut numquam eius repudiandae, esse quo, omnis ducimus. Ipsa, aliquid beatae! Ad unde inventore reiciendis dolores maiores. Molestiae mollitia voluptates in iure facilis, debitis alias possimus repellendus nobis enim esse ex aperiam beatae id ipsam, quod tempora, perferendis corporis? Iste soluta, culpa enim nisi earum ipsam sed rerum voluptatem quasi odit adipisci facilis aut alias, unde ipsum ad, nulla ullam eius recusandae porro ea.</p>



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