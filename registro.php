<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "testingweb";


$pdo = mysqli_connect($servername, $username, $password, $dbname);

if (!$pdo) {

  die("Connection failed: " . mysqli_connect_error());
}

if (true) {
  try {
    $stmt = $pdo->prepare("INSERT INTO `users` (`name`, `apellidos`, `email`,`password`) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['contraseña']);

    $rest = $stmt->execute();

    if ($rest) {

      echo 'true';
    } else {

      echo 'false';
    }
  } catch (Exception $ex) {
    $error = $ex->getMessage("No conecta en la base de datos.");
  }
}





