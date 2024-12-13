<!-- Author: Daniel Benjamin Perez Morales -->
<!-- GitHub: https://github.com/DanielPerezMoralesDev13 -->
<!-- Email: danielperezdev@proton.me -->

<?php

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  require "./database.php";

  $name = $_POST["name"];
  $phoneNumber = $_POST["phone_number"];

  if (empty($name) || empty($phoneNumber)) {
    $error = "Please All The Fields";
  } else if (strlen($phoneNumber) < 9) {
    $error = "Phone Number Must Be At Least 9 Characters.";
  } else {
    // Inyeccion SQL'); DROP DATABASE ContactsApp; --
    // [x] PDO Connection Error: SQLSTATE[HY000] [1049] Unknown database 'ContactsApp' 

    // Manera Incorrecta De Hacerlo
    // ! $statement = $connection->prepare("INSERT INTO contacts (name, phone_number) VALUES ('$name','$phoneNumber')");

    // Consulta preparada con parámetros nombrados
    $statement = $connection->prepare("INSERT INTO contacts (name, phone_number) VALUES (:name, :phone_number)");

    // Vinculación de parámetros con valores seguros
    // Los valores se escapan automáticamente al usar consultas preparadas
    $statement = $connection->prepare("INSERT INTO contacts (name, phone_number) VALUES (:name, :phone_number)");
    $statement->bindParam(":name", $name);
    $statement->bindParam(":phone_number", $phoneNumber);
    $statement->execute();
    header("Location: ./index.php");
  }
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
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/darkly/bootstrap.min.css"
    integrity="sha512-HDszXqSUU0om4Yj5dZOUNmtwXGWDa5ppESlX98yzbBS+z+3HQ8a/7kcdI1dv+jKq+1V5b01eYurE7+yFjw6Rdg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />


  <!-- Bootstrap JavaScript Bundle (incluye Popper.js) -->
  <!-- Enlace a Bootstrap desde jsDelivr CDN -->
  <!-- https://www.bootstrapcdn.com/ -->
  <script defer
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <!-- Static Content -->
  <link rel="stylesheet"
    href="./static/css/index.css" />

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
              href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
              href="#">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <main>
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Add New Contact</div>
            <div class="card-body">
              <?php if ($error): ?>
                <p class="text-danger">
                  <?= $error ?>
                </p>
              <?php endif ?>
              <form method="post"
                action="./add.php">
                <div class="mb-3 row">
                  <label for="name"
                    class="col-md-4 col-form-label text-md-end">Name</label>

                  <div class="col-md-6">
                    <input id="name"
                      type="text"
                      class="form-control"
                      name="name"
                      required
                      placeholder="Daniel Benjamin Perez Morales"
                      autocomplete="name"
                      autofocus>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="phone_number"
                    class="col-md-4 col-form-label text-md-end">Phone Number</label>

                  <div class="col-md-6">
                    <input id="phone_number"
                      type="tel"
                      class="form-control"
                      name="phone_number"
                      required
                      placeholder="123456789"
                      autocomplete="phone_number"
                      autofocus>
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit"
                      class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>

<!-- 

method="post"

  Especifica el método HTTP que se usará para enviar los datos del formulario al servidor.
  En este caso, el método es POST, que:
    Transmite los datos en el cuerpo de la solicitud HTTP, no en la URL (a diferencia de GET).
    Es más adecuado para enviar datos sensibles o grandes volúmenes de información, ya que no expone los datos en la barra de direcciones del navegador.
    Es utilizado típicamente en operaciones como agregar, actualizar o eliminar datos.

action="./add.php"

  Define la URL o ruta a la que se enviarán los datos del formulario.
  En este caso, el fichero add.php, ubicado en el mismo directorio que la página actual (./ indica el directorio actual).
  Cuando el formulario se envíe, el servidor ejecutará el código en add.php, que probablemente procesará los datos enviados.
-->