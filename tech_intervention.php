<?php
    session_start();
    if(isset($_SESSION['IDU'])){
        if(isset($_POST['submit'])){
            if(!empty($_POST['replacement'])){
                foreach($_POST['replacement'] as $value){
                    echo "value:". $value. "<br/>";
                }
            } else {
                echo "run";
            }
        } else {
            header("Location: ./tech_home.php");
        }
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
    <link rel="stylesheet" href="./css/tech_intervention_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="./js/footer-navbar.js"></script>
</head>
<body>
    <form action="">
        <h1><span class="material-icons">build</span> RICAMBI UTILIZZATI</h1>
        <hr>
        <div class="container">

        </div>

        <div class="search-bar">
            <span class="material-icons">search</span>
            <input autocomplete="off" type="search" id="search-input" placeholder="Cerca il Cespite" />
        </div>
        <input type="submit" value="PROSEGUI">
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