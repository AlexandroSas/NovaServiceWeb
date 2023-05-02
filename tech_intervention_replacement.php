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
    <title>Homepage - Tecnico</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="./css/tech_intervention_replacement_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="./js/footer-navbar.js"></script>
</head>
<body>
    <form action="./tech_intervention.php" method="POST">
        <h1><span class="material-icons">build</span> RICAMBI UTILIZZATI</h1>
        <hr>
        <div class="container">
            <ul id="selected">
                <h2>Ricambi Selezionati</h2>
            </ul>
            <ul id="available">
                <h2>Ricambi Disponibili</h2>
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
                                <span class="material-icons hidden">check_circle</span>
                            </div>
                            <input class="hidden-pro" type="checkbox" name="replacement[]" id="<?php echo $rep['IDN']; ?>" >
                        </li>
                <?php
                    }

                    mysqli_close($conn)
                ?>    
            </ul>
        </div>

        <div class="search-bar">
            <span class="material-icons">search</span>
            <input autocomplete="off" type="search" id="search-input" placeholder="Cerca il Cespite" />
        </div>
        <input type="submit" name="submit" id="submit" value="PROSEGUI">
    </form>
    
    <script src="./js/live-search.js"></script>
    <script>
        document.querySelectorAll('.list-group-item').forEach(function(ele){
            ele.addEventListener('click', function() {

                const uls = document.getElementsByTagName("ul")
                const parent_id = ele.parentNode.id
                const check = ele.children[1]
                const span = ele.children[0].children[3]

                if(parent_id == "available"){
                    check.checked = true
                    check.value = check.id
                    span.classList.remove("hidden")
                    uls[0].appendChild(ele)
                } else {
                    check.checked = false
                    span.classList.add("hidden")
                    uls[1].appendChild(ele)
                }

            })
        })
    </script>
</body>
</html>