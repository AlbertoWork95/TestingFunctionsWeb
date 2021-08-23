<?php
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "testingweb";


$pdo = mysqli_connect($servername, $username, $password, $dbname);

if (!$pdo) {

    die("Connection failed: " . mysqli_connect_error());
}

session_start();

$stmt = $pdo->prepare("SELECT link, id FROM links WHERE iduser = ?");

$stmt->bind_param('s',$_SESSION['id']);

$rest = $stmt->execute();

$result = $stmt->get_result();

$contentLinks = $result->fetch_all();

if (count($contentLinks) > 0) {

   echo json_encode($contentLinks);

  } else {

    echo "0 results";

  }

  $pdo->close();

?>