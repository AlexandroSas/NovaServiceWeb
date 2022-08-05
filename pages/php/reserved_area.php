<?php
    session_start();
    if(isset($_SESSION['FirstName']) && isset($_SESSION['LastName']) && isset($_SESSION['Email'])){
        $fname = $_SESSION['FirstName'];
        $lname = $_SESSION['LastName'];
        $email = $_SESSION['Email'];
        
        echo "<h1>Hello ${fname}</h1>";
        echo "Name: ${fname} ${lname}";
        echo "Email: ${email}";
    } else {
        echo "Welcome Guest";
    }
?>