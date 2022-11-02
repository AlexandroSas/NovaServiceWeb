<?php
    // session_start();
    // if(!isset($_SESSION['ID'])){
    //     header("Location: ../../index.php");
    // }
?>

<div class="sidebar" id="sidebar">
    <div class="logo_content">
        <div class="logo">
            <div><img src="../../res/img/Logo_.png" alt=""></div>
            <div class="logo_name">NovaService - Menu</div>
        </div>
        <div id="sb_btn"><span class="material-icons">menu</span></div>
    </div>
    <ul class="nav_list">
        <li>
            <a href="../users/profile.php">
                <span class="material-icons" style="<?php if($_SESSION['page'] == 0){ echo 'color: #196aa8;';} ?>">person</span> 
                Profilo 
                <span class="active material-icons" style="margin-left: auto; <?php if($_SESSION['page'] == 0){ echo 'color: #196aa8;';} ?>">person</span>
            </a>
            <span class="tooltip">Profilo</span>
        </li>
        <li>
            <a href="">
                <span class="material-icons" style="<?php if($_SESSION['page'] == 1){ echo 'color: #196aa8;';} ?>">notifications</span> 
                Notifiche
                <span class="active material-icons" style="margin-left: auto; <?php if($_SESSION['page'] == 1){ echo 'color: #196aa8;';} ?>">notifications</span>
            </a>
            <span class="tooltip">Notifiche</span>
        </li>
        <li>
            <a href="">
                <span class="material-icons" style="<?php if($_SESSION['page'] == 2){ echo 'color: #196aa8;';} ?>">home</span> 
                Home
                <span class="active material-icons" style="margin-left: auto; <?php if($_SESSION['page'] == 2){ echo 'color: #196aa8;';} ?>">home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="">
                <span class="material-icons" style="<?php if($_SESSION['page'] == 3){ echo 'color: #196aa8;';} ?>">settings</span> 
                Impostazioni
                <span class="active material-icons" style="margin-left: auto; <?php if($_SESSION['page'] == 3){ echo 'color: #196aa8;';} ?>">settings</span>
            </a>
            <span class="tooltip">Impostazioni</span>
        </li>
        <li>
            <a href="">
                <span class="material-icons" style="<?php if($_SESSION['page'] == 4){ echo 'color: #196aa8;';} ?>">dark_mode</span> 
                Tema
                <span class="active material-icons" style="margin-left: auto; <?php if($_SESSION['page'] == 4){ echo 'color: #196aa8;';} ?>">dark_mode</span>
            </a>
            <span class="tooltip">Tema</span>
        </li>
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

