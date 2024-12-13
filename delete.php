<?php 

require "./database.php";

session_start();
if (!isset($_SESSION["user"])) {
  header("Location: ./login.php");
  return;
}

$id = $_GET["id"];

$statement = $connection->prepare("SELECT * FROM contacts WHERE id IN (:id)");
$statement->execute([":id" => $id]);

if ($statement->rowCount() == 0) {
    http_response_code(404);
    echo("[x] HTTP 404 NOT FOUND");
    return;
}

// $statement = $connection->prepare("DELETE FROM contacts WHERE id = :id");
// $statement->bindParam(":id", $id);
// $statement->execute();

// Forma Abreviada
// $statement->execute([":id" => $id]);

$connection->prepare("DELETE FROM contacts WHERE id = :id")->execute([":id" => $id]);
header("Location: ./home.php");

# Validacion
// curl -X GET http://172.17.0.2/contacts-app/delete.php?id=10

// El query string: ?id=10 envía un parámetro llamado id con el valor 10 al script.
// Un query string (cadena de consulta) es una parte de una URL que se utiliza para enviar datos adicionales al servidor como parámetros. Generalmente, contiene claves y valores en formato clave=valor, separados por el signo & si hay múltiples parámetros. El query string siempre va precedido por el signo ? en la URL.
// Esta URL podría ser usada para realizar una búsqueda en el servidor. El servidor recibiría los parámetros producto=libro y categoria=ficcion, procesaría esta información, y devolvería resultados relacionados.
?>