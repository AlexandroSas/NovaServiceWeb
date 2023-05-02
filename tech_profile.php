<?php
    session_start();
    if(isset($_SESSION['IDU'])){

    } else {
        header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo - Tecnico</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="./css/tech_profile_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="./js/footer-navbar.js"></script>
</head>
<body>
    <header>
        <img src="./res/img/profile_pictures/<?php if(isset($_SESSION['Image'])){echo $_SESSION['Image'];} else {echo "default.jpg";} ?>" alt="Profile Picture">
        <div>
            <h3><?php echo $_SESSION['FirstName'] . " " . $_SESSION['LastName']; ?></h3>
            <p><?php echo $_SESSION['Role']; ?></p>
            <a href="./php/logout.php"><span class="material-icons">logout</span></a>
        </div>
    </header>
    <div class="container">
        <ul>
            <li><span class="material-icons">mail_outline</span><?php echo $_SESSION['Email']; ?></li>
            <li><span class="material-icons">stay_current_portrait</span><?php echo "+39 " . $_SESSION['Phone']; ?></li>
        </ul>
        <div><div id="btn-update"><span class="material-icons">refresh</span> Aggiorna Database Locale</div></div>
    </div>
    <?php
        include "./html_component/footer.php";
    ?>
    <script>set_active(3)</script>
</body>
</html>