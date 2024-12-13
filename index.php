<!-- Author: Daniel Benjamin Perez Morales -->
<!-- GitHub: https://github.com/DanielPerezMoralesDev13 -->
<!-- Email: danielperezdev@proton.me -->

<?php 
  if (file_exists(__DIR__ . "/contacts.json")){
  $contacts = json_decode(file_get_contents(__DIR__ . "/contacts.json"), true);
  } else {
    $contacts = [];
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible"
    content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap: Biblioteca CSS y JS para diseño y componentes frontend -->
  <!-- Bootswatch: Temas personalizados para Bootstrap -->
  <!-- Enlace a Bootswatch desde una CDN (cdnjs) -->
  <!-- https://cdnjs.com/libraries/bootswatch -->


  <!-- CDN (Content Delivery Network):

  Permite cargar recursos (como CSS o JavaScript) desde servidores distribuidos globalmente, mejorando la velocidad de carga y disponibilidad.

  Atributos adicionales en los enlaces:

  integrity: Proporciona una firma hash para garantizar la integridad del archivo descargado.
  crossorigin: Indica que el recurso proviene de otro dominio.
  referrerpolicy: Especifica cómo manejar la información de referencia (en este caso, no se envía información) 
  -->

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/darkly/bootstrap.min.css"
    integrity="sha512-HDszXqSUU0om4Yj5dZOUNmtwXGWDa5ppESlX98yzbBS+z+3HQ8a/7kcdI1dv+jKq+1V5b01eYurE7+yFjw6Rdg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

  <!-- Bootstrap JavaScript Bundle (incluye Popper.js) -->
  <!-- Enlace a Bootstrap desde jsDelivr CDN -->
  <!-- https://www.bootstrapcdn.com/ -->

  <!-- El atributo defer en una etiqueta <script> es una instrucción al navegador que indica que el script debe ser descargado en segundo plano y ejecutado solo después de que el documento HTML haya sido completamente analizado (parsing). Es útil para mejorar el rendimiento de carga de las páginas. -->
  <script defer
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <!-- Static Content -->
  <link rel="stylesheet"
    href="./static/css/index.css">

  <title>Contacts App</title>
</head>

<body>
  <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand"
        href="#">
        <img src="./static/img/logo.png"
          alt="Logo Aplication">
        ContactApp
      </a>
      <button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse"
        id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active"
              aria-current="page"
              href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
              href="./add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container pt-4 p-3">
      <div class="row">
      <?php if (count($contacts) == 0): ?>
          <div class="col-md-4 mx-auto">
            <div class="card card-body text-center">
              <p>No contacts saved yet</p>
              <a href="./add.php">Add One!</a>
            </div>
          </div>
        <?php endif ?>
        <?php foreach ($contacts as $contact): ?>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-body">
                <h3 class="card-title text-capitalize"><?=$contact["name"]?></h3>
                <p class="m-2"><?=$contact["phone_number"]?></p>
                <a href="#"
                  class="btn btn-secondary mb-2">Edit Contact</a>
                <a href="#"
                  class="btn btn-danger mb-2">Delete Contact</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </main>
</body>

</html>