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
    <title>Ricambi - Tecnico</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="./css/tech_replacement_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="./js/footer-navbar.js"></script>
</head>
<body>
    <header>
        <img src="./res/img/icons/NovaService.svg" alt="Logo">
    </header>
    <div class="search-bar">
        <span class="material-icons">search</span>
        <input autocomplete="off" type="search" id="search-input" placeholder="Cerca il Cespite" />
    </div>
    <div class="container">
        <ul>
            <?php
                require "./php/start_connection.php";

                $ID = $_SESSION['IDU'];
                $sql = "SELECT * FROM ricambi WHERE ID_Tecnico=$ID";
                $result = mysqli_query($conn, $sql);
                $replacements = mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach($replacements as &$rep){
            ?>
                    <li class="list-group-item" id="<?php echo $rep['IDN']; ?>">
                        <div class="replacement">
                            <h3><?php echo $rep['IDN']; ?></h3>
                            <p><?php echo $rep['SN']; ?></p>
                            <p><?php echo $rep['Nome']; ?></p>
                        </div>
                    </li>
            <?php
                }

                mysqli_close($conn)
            ?>
        </ul>
    </div>
    <?php
        include "./html_component/footer.php";
    ?>

    <script>set_active(1)</script>
    <script src="./js/live-search.js"></script>

</body>
</html>