<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "testingweb";


$pdo = mysqli_connect($servername, $username, $password, $dbname);

if (!$pdo) {

    die("Connection failed: " . mysqli_connect_error());
}

$borrarLinks = $pdo->prepare("DELETE FROM links WHERE iduser = ? AND id = ?");

session_start();

$borrarLinks->bind_param("ss", $_SESSION['id'], $_POST['idLink']);

$rest = $borrarLinks->execute();

if ($rest) {

    echo 'true';
    
} else {

    echo 'false';
}
?>