<?php
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'NovaService');
    define('DB_PASS', 'Nova2022');
    define('DB_NAME', 'NovaService');
  
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($conn->connect_error){
        die('Connection Failed ' . $conn->connect_error);
    }
?>