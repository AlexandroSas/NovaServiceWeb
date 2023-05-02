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
    <title>Veicoli - Tecnico</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="./css/tech_vehicles_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="./js/footer-navbar.js"></script>
</head>
<body>
    <header>
        <img src="./res/img/icons/NovaService.svg" alt="Logo">
    </header>
    <div class="container">
        <ul>
            <?php
                require "./php/start_connection.php";

                $ID = $_SESSION['IDU'];
                $sql = "SELECT * FROM veicoli ORDER BY ID_Tecnico";
                $result = mysqli_query($conn, $sql);
                $vehicles = mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach($vehicles as &$veh){
            ?>
            <li <?php if($veh['ID_Tecnico'] == $_SESSION['IDU']){ echo "class='my-vehicle'"; } else if($_SESSION['IDU'] != $veh['ID_Tecnico'] && $veh['ID_Tecnico'] != NULL){ echo "class='taken-vehicle'";} ?>>
                <img src="./res/img/vehicles/<?php echo $veh['Targa']; ?>.png" alt="">
                <h3>
                    <?php
                        if($_SESSION['IDU'] == $veh['ID_Tecnico']){ 
                            echo "<span><img src=\"./res/img/profile_pictures/" . $_SESSION['Image'] . "\" alt=\"\"></span>";
                        }
                        else if($_SESSION['IDU'] != $veh['ID_Tecnico'] && $veh['ID_Tecnico'] != NULL){
                            
                            $id_user = $veh['ID_Tecnico'];
                            include "./php/get_image.php";
                            
                            if($image != NULL){
                                echo "<span><img src=\"./res/img/profile_pictures/". $image . "\" alt=\"\"></span>";
                            } else {
                                echo "<span><img src=\"./res/img/profile_pictures/default.jpg\" alt=\"\"></span>";
                            }
                        }
                        echo $veh['Targa']; 
                    ?> 
                </h3>
            </li>
            <?php
                }

                mysqli_close($conn);
            ?>
        </ul>
    </div>
    <?php
        include "./html_component/footer.php";
    ?>

    <script>set_active(0)</script>
</body>
</html>