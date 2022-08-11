<?php
    session_start();
    if(!isset($_SESSION['ID'])){
        header("Location: ../../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/sidebar.css">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div><img src="../../res/img/Logo_.png" alt=""></div>
                <div class="logo_name">NovaService - Menu</div>
            </div>
            <div id="sb_btn"><span class="material-icons">menu</span></div>
        </div>

        <ul class="nav_list">
            <li><a href=""><span class="material-icons">person</span> Profilo <span class="active material-icons" style="margin-left: auto;">person</span></a><span class="tooltip">Profilo</span></li>
            <li><a href=""><span class="material-icons">notifications</span> Notifiche<span class="active material-icons" style="margin-left: auto;">notifications</span></a><span class="tooltip">Notifiche</span></li></li>
            <li><a href=""><span class="material-icons">home</span> Home<span class="active material-icons" style="margin-left: auto;">home</span></a><span class="tooltip">Home</span></li></li>
            <li><a href=""><span class="material-icons">settings</span> Impostazioni<span class="active material-icons" style="margin-left: auto;">settings</span></a><span class="tooltip">Impostazioni</span></li></li>
            <li><a href=""><span class="material-icons">dark_mode</span> Tema<span class="active material-icons" style="margin-left: auto;">dark_mode</span></a><span class="tooltip">Impostazioni</span></li></li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <div><img src="../../res/img/profile_pictures/<?php if($_SESSION['img']) echo $_SESSION['img']; else echo 'default.jpg';?>" alt=""></div>
                    <div class="name_job">
                        <div class="name"><?php echo $_SESSION["name"]; ?></div>
                        <div class="job"><?php echo $_SESSION["role"]; ?></div>
                    </div>
                    <div id="lo_btn"><span class="material-icons">logout</span></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        sidebar = document.getElementById("sidebar")
        btn_menu = document.getElementById("sb_btn")
        btn_logoff = document.getElementById("lo_btn")
        li = document.getElementsByTagName("li")

        btn_menu.onclick = () => {
            sidebar.classList.toggle("active")
            
            for(let i=0; i<li.length; i++){
                li[i].children[0].children[1].classList.toggle("active")
                li[i].children[0].children[0].classList.toggle("active")
            };
        }

        btn_logoff.onclick = () => {
            window.location.href = "../../index.php";
        }
    </script>
</body>
</html>