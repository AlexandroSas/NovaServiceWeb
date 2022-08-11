<?php
    require("./pages/database/db.php");
    require("./pages/database/crypt.php");

    $sql = 'SELECT ID, username, password, ruolo, nome, img FROM utenti';
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $roles = [
        "Dirigente",
        "Amministrazione",
        "Assistenza",
        "Software Developer",
        "Commerciale",
        "Tecnico",
        "Magazziniere",
        "Ufficio Legale"
    ];

    if(isset($_POST['submit'])){
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);
        foreach($users as &$user){
            if($user['username'] == $username && $user['password'] == $encryption){
                session_start();
                $_SESSION['ID'] = $user['ID'];
                $_SESSION['img'] = $user['img'];
                $_SESSION['name'] = $user['nome'];
                $_SESSION['role'] = $roles[$user['ruolo']];

                // if($user['ruolo'] == 0)
                //     header("Location: ./pages/users/dirigenza.php");
                // else if($user['ruolo'] == 1)
                //     header("Location: ./amministrazione.php");
                // else if($user['ruolo'] == 2)
                //     header("Location: ./assistenza.php");
                // else if($user['ruolo'] == 3)
                //     header("Location: ./sviluppo.php");
                // else if($user['ruolo'] == 4)
                //     header("Location: ./commerciale.php");
                // else if($user['ruolo'] == 5)
                //     header("Location: ./tecnico.php");                
                // else if($user['ruolo'] == 6)
                //     header("Location: ./magazzino.php");                
                // else if($user['ruolo'] == 7)
                //     header("Location: ./ufficiolegale.php");

                header("Location: ./pages/users/profile.php");
            }
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
            <h1><img src="./res/img/Logo_.png">Nova Service SRL</h1>
        </div>
        <div class="form">
            <p>Effettua il Log In</p>
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
            <img src="./res/img/Novaservice_.png" />
            <p>Piccola Descrizione dell'azienda: Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nemo rerum, reprehenderit reiciendis totam, dignissimos optio asperiores esse delectus quo veritatis blanditiis perspiciatis nisi voluptatem culpa laboriosam animi repudiandae aperiam?</p>
        </div>
    </div>
</body>
</html>