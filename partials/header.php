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

  integrity: Proporciona una firma hash para garantizar la integridad del fichero descargado.
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
  
  <!-- La diferencia entre **URL** (Uniform Resource Locator) y **URI** (Uniform Resource Identifier) es una cuestión de especificidad.

  - **URL (Localizador Uniforme de Recursos)**: Es un tipo específico de URI que no solo identifica un recurso, sino que también proporciona la forma de localizarlo en internet. Incluye el protocolo (por ejemplo, HTTP, FTP) y la dirección del recurso (por ejemplo, `www.ejemplo.com`).

  - **URI (Identificador Uniforme de Recursos)**: Es un término más amplio que hace referencia a cualquier cadena de caracteres que identifica de manera única un recurso. Un URI puede ser una URL o un URN (Nombre Uniforme de Recurso). Un URI no especifica necesariamente cómo localizar el recurso, a diferencia de una URL.

  En resumen:
  - **URL** es un tipo específico de **URI** que incluye detalles para localizar un recurso.
  - **URI** es un término más amplio que incluye tanto URLs como otros tipos de identificadores, como los URNs.
  -->

  <?php $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) ?>
  <?php if ($uri == "/contacts-app/" || $uri == "/contacts-app/index.php"): ?>
    <script defer src="./static/js/welcome.js"></script>
  <?php endif ?>

  <title>Contacts App</title>
</head>

<body>
  <?php require "./partials/navbar.php"?>
  <!-- Link: https://getbootstrap.com/docs/5.3/components/alerts/#examples -->
  <?php if (isset($_SESSION["flash"])): ?>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
    </svg>

    <div class="container mt-4">
      <div class="alert alert-<?=$_SESSION["flash"]["type"]?> d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div class="ml-2">
          <?= $_SESSION["flash"]["message"] ?>
        </div>
      </div>
    </div>
    <?php unset($_SESSION["flash"]) ?>
  <?php endif ?>
  <main>
<!-- Content Here -->