<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "testingweb";


$pdo = mysqli_connect($servername, $username, $password, $dbname);

if (!$pdo) {

    die("Connection failed: " . mysqli_connect_error());
}


$target_path = "links/";

if (true) {
    try {

        $stmt = $pdo->prepare("INSERT INTO `links` (`iduser`, `link`, `name`) VALUES (?,?,?)");

        // if (mysqli_query($pdo, $stmt)) {
        //     echo "Records inserted successfully.";
        // } else {
        //     echo "ERROR: Could not able to execute $stmt. " . mysqli_error($pdo);
        // }

        session_start();

        $stmt->bind_param("sss", $_SESSION['id'], $_POST['guardarLink'], $target_path);

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
