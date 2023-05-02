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
    <link rel="stylesheet" href="./css/tech_home_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="./js/footer-navbar.js"></script>
</head>
<body>
    <header>
        <img src="./res/img/NovaService_.png" alt="Logo">
    </header>
    <div class="container">
        <ul id="active">
            <h3>Chiamate In Corso...</h3>
            <?php
                require "./php/start_connection.php";

                $ID = $_SESSION['IDU'];
                $sql = "SELECT chiamate.*, macchine_reali.*, macchine.* 
                        FROM chiamate INNER JOIN macchine_reali ON chiamate.ID_Macchina = macchine_reali.ID 
                        INNER JOIN macchine ON macchine_reali.ID_Macchina = macchine.ID 
                        WHERE chiamate.ID_Tecnico=$ID";
                $result = mysqli_query($conn, $sql);
                $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);
                
                foreach($tickets as &$ticket){

                    #print_r($ticket);

                    $IDN = $ticket['IDN'];
                    $sql = "SELECT periodo_possesso.*, sedi.*, indirizzi.*
                            FROM periodo_possesso INNER JOIN sedi ON periodo_possesso.ID_Sede = sedi.ID
                            INNER JOIN indirizzi ON sedi.ID_Indirizzo = indirizzi.ID
                            WHERE ID_MacchinaReale = $IDN
                            ORDER BY Data DESC";
                    $result = mysqli_query($conn, $sql);
                    $history = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $h = $history[0];
                    #print_r($h);
                    
                    $ID_Sede = $h['ID_Sede'];
                    $sql = "SELECT rubrica_clienti.*, rubrica.*
                            FROM rubrica_clienti INNER JOIN rubrica ON rubrica_clienti.ID_Rubrica = rubrica.ID
                            WHERE rubrica_clienti.ID_Sede = $ID_Sede
                            AND rubrica_clienti.Referente = 1";
                    $result = mysqli_query($conn, $sql);
                    $rubrica = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $referente = $rubrica[0];

                    #print_r($rubrica);

                    $sql = "SELECT *
                            FROM orari WHERE ID_Sede = $ID_Sede
                            ORDER BY Chiusura DESC";
                    $result = mysqli_query($conn, $sql);
                    $orari = mysqli_fetch_all($result, MYSQLI_ASSOC);

            ?>
                <li class="<?php echo $ticket['Status']; ?>">
                    <div class="intervention-item">
                        <div class="intervention">
                            <div class="upper-row">
                                <h3><span class="material-icons">corporate_fare</span><?php echo $h['Intestazione']; ?></h3>
                                <p><?php if($ticket['Appuntamento']!="0000-00-00 00:00:00"){echo $ticket['Appuntamento'];}?></p>
                            </div>
                            <div class="lower-row">
                                <p><?php echo $h['Indirizzo'] . ", ". $h['Città'] . ", " . $h['Provincia'] . ", " . $h['CAP'];?></p>
                                <h3 class="priority"><span class="material-icons <?php if($ticket['Priorità']==1){echo 'low';} elseif($ticket['Priorità']==2){echo 'medium';} elseif($ticket['Priorità']==3){echo 'high';} ?>">fiber_manual_record</span><?php echo $ticket['ID']; ?></h3>
                            </div>
                        </div>
                        <div class="extra hidden-pro">
                            <hr>
                            <div class="info">
                                <h5>Committente:</h5>
                                <p></p>
                            </div>
                            <div class="grid-2">
                                <div class="info">
                                    <h5>Orario Mattina:</h5>
                                    <p class="txt-ico"><span class="material-icons">light_mode</span><?php echo $orari[1]["Apertura"] . " - " . $orari[1]["Chiusura"]; ?></p>
                                </div>
                                <div class="info">
                                    <h5>Orario Sera:</h5>
                                    <p class="txt-ico"><span class="material-icons">dark_mode</span><?php echo $orari[0]["Apertura"] . " - " . $orari[0]["Chiusura"]; ?></p>
                                </div>
                            </div>
                            <div class="grid-3">
                                <div class="info">
                                    <h5>Modello:</h5>
                                    <p><?php echo $ticket['Modello']; ?></p>
                                </div>
                                <div class="grid-2">
                                    <div class="info">
                                        <h5>Cespite:</h5>
                                        <p><?php echo $ticket['IDN']; ?></p>
                                    </div>
                                    <div class="info">
                                        <h5>Matricola:</h5>
                                        <p><?php echo $ticket['Matricola']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-bg"><div class="btn"><span class="material-icons">manage_history</span>STORICO</div></div>
                            <div class="grid-3">
                                <div class="info des">
                                    <h5>Descrizione:</h5> 
                                    <p><?php echo $ticket['Descrizione']; ?></p>
                                </div>
                                <div class="info des">
                                    <h5>Note Intervento Precedente:</h5>
                                    <p></p>
                                </div>
                                <div class="info des">
                                    <h5>Note Cliente:</h5>
                                    <p></p>
                                </div>
                            </div>
                            <div class="grid-3">
                                <div class="info">
                                    <h5>Referente:</h5>
                                    <p><?php echo $referente['Nome'] . " " . $referente['Cognome']; ?></p>
                                </div>
                                <div class="grid-2">
                                    <div class="info">
                                        <h5>Cellulare:</h5>
                                        <p class="txt-ico"><span class="material-icons">smartphone</span><?php echo $referente['Cellulare']; ?></p>
                                    </div>
                                    <div class="info">
                                        <h5>Telefono:</h5>
                                        <p class="txt-ico"><span class="material-icons">call</span><?php echo $referente['Telefono']; ?></p>
                                    </div>
                                </div>                            
                            </div>
                            <div id="<?php echo $ticket['ID']; ?>" class="btn-bg start"><div class="btn"><span class="material-icons">play_circle</span>INIZIA INTERVENTO</div></div>
                            <h3 class="priority"><span class="material-icons <?php if($ticket['Priorità']==1){echo 'low';} elseif($ticket['Priorità']==2){echo 'medium';} elseif($ticket['Priorità']==3){echo 'high';} ?>">fiber_manual_record</span><?php echo $ticket['ID']; ?></h3>
                        </div>
                    </div>
                </li>
            <?php
                }

                mysqli_close($conn)
            ?>    
        </ul>
        <ul id="passive">
            <h3>Chiamate Completate</h3>
        </ul>
    </div>
    <?php
        include "./html_component/footer.php";
    ?>
    <script>set_active(2)</script>
    <script>
        const active = document.getElementById("active")
        const passive = document.getElementById("passive")

        document.querySelectorAll('.C').forEach(function(ele){
            passive.appendChild(ele)
        })
    </script>
    <script>
        document.querySelectorAll('.intervention').forEach(function(ele){
            ele.addEventListener('click', function() {
                
                const div = this.parentElement

                const upper = ele.children[0]
                const upper_icon = upper.children[1]

                const lower = ele.children[1]
                const lower_priority = lower.children[1]

                const extra = div.children[1]
                

                if(div.classList == "intervention-item-open"){
                    div.classList = "intervention-item"
                    lower_priority.classList.remove("hidden")
                    extra.classList.add("hidden-pro")
                }
                else{
                    div.classList = "intervention-item-open"
                    upper_icon.classList.remove("hidden")
                    lower_priority.classList.add("hidden")
                    extra.classList.remove("hidden-pro")
                }
            })
        })

        document.getElementById
    </script>

    <script>
        document.querySelectorAll('.start').forEach(function(ele){
            ele.addEventListener('click', function() {
                const ID = ele.id
                const now = new Date()
                
                ele.classList.remove('start')
                ele.classList.add('end')

                div = ele.childNodes[0]

                const link = document.createElement("a")
                link.setAttribute("href", "./tech_intervention_replacement.php?id="+ID+"?time_start="+ now)

                ele.appendChild(link)
                link.appendChild(div)
                
                const SPAN = document.createElement("span")
                SPAN.classList.add("material-icons")
                SPAN.textContent = "schedule"
                ele.parentElement.parentElement.children[0].children[0].children[1].innerHTML = ""
                ele.parentElement.parentElement.children[0].children[0].children[1].appendChild(SPAN)

            })
        })
    </script>
</body>
</html>