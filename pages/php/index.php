<?php
    //3saRo9#1

    define('DB_HOST', 'localhost');
    define('DB_USER', 'alexandro.sas');
    define('DB_PASS', 'nm37llA_98!');
    define('DB_NAME', 'dbtest');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($conn->connect_error){
        die('Connection Failed ' . $conn->connect_error);
    }

    $sql = 'SELECT * FROM users';
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $ciphering = "AES-256-CBC";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "i-yNS4ykNyHelKKnyENovaServiceKVTQeI_TjtDFSg=";

    if(isset($_POST['submit'])){
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        //$password = htmlspecialchars($_POST['password']);

        $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);
        foreach($users as &$user){
            echo $user;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Riservata - Nova Service SRL</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Staatliches&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login">
        <div class="titles">
            <h3>Benvenuto In</h3>
            <h1><img src="./res/Logo.png">Nova Service SRL</h1>
        </div>
        <div class="form">
            <p>Effettua il Log In</p>
            <p><?php echo $lol; ?></p>
            <form action="./index.php" method="POST">
                <input type="text" name="username" id="username">
                <input type="password" name="password" id="password">
                <input type="submit" name="submit" id="submit" value="LOG IN">
            </form>
            <p>Non hai ancora un Account? <a href="">Registrati Ora</a></p>
        </div>
    </div>
    <div class="container">
        <div class="info">
            <img src="./res/Novaservice.png" />
            <p>Piccola Descrizione dell'azienda: Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nemo rerum, reprehenderit reiciendis totam, dignissimos optio asperiores esse delectus quo veritatis blanditiis perspiciatis nisi voluptatem culpa laboriosam animi repudiandae aperiam?</p>
        </div>
    </div>
</body>
</html>