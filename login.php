<?php

    $servername = "localhost";

    $username = "root";
    
    $password = "";
    
    $dbname = "testingweb";
    
    
    $pdo = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$pdo) {
    
      die("Connection failed: " . mysqli_connect_error());
    }

  
    $sql = mysqli_query($pdo, 'SELECT id FROM users WHERE email= "'.$_POST['email'].'" AND password= "'.$_POST['password'].'"');
  
    $row  = mysqli_fetch_array($sql);
    
  
    if (is_array($row)) {
  
      session_start();
      
  
      $_SESSION["id"] = $row[0];
  
      echo "true";
      
      
    } else {
  
      echo "Invalid Email ID/Password";
  
    }
