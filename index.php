<?php
    session_start();
    if(isset($_SESSION['IDU'])){
        header("Location: tech_home.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaService</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img src="./res/img/Novaservice_.png" alt="LogoNova">
        <form action="./php/login.php" method="post">
            <div>
                <label for="user"><span class="material-icons">person</span></label>
                <input type="text" name="user" id="user" placeholder="Username..." value="<?php if(isset($_GET['user'])) echo $_GET['user'] ?>" />
            </div>
            <div>
                <label for="password"><span class="material-icons">lock</span></label>
                <input type="password" name="password" id="password" placeholder="Password...">
            </div>
            <?php if(isset($_GET['error'])) echo "<div class='error'>".$_GET['error']."</div>" ?>
            <input type="submit" name="submit" id="submit" value="ACCEDI">
        </form>
    </div>
</body>
<script>
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
    window.addEventListener('resize', () => {
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    });
</script>
</html>