<?php
    require "../php/database/db.php";
    
    $sql = "SELECT * FROM chiamate_test";
    $query = mysqli_query($conn, $sql);
    $chiamate = mysqli_fetch_all($query, MYSQLI_ASSOC);

    foreach($chiamate as $chiamata){
        
        $id_user = $chiamata['id_tecnico'];
        $sql = "SELECT nome, cognome FROM utenti WHERE ID=$id_user";
        $query = mysqli_query($conn, $sql);
        $utenti = mysqli_fetch_row($query);
        $autore = "$utenti[0] $utenti[1]";

?>
    <li class="source <?php echo $chiamata['status']; ?>" draggable="true" id="<?php echo $chiamata['ID']; ?>">
        <div class="chiamata" >
            <span class="material-icons">menu</span>
            <div>
                <h3><?php echo $chiamata['titolo']; ?></h3>
                <h6>Via Elba 21</h6>
            </div>
            <div>
                <p><?php echo $chiamata['ID']; ?></p>
                <ul>
                    <li><span class="material-icons">cached</span></li>
                    <li><span class="material-icons">done</span></li>
                    <li><span class="material-icons">close</span></li>
                </ul>
            </div>
        </div>         
    </li>   
<?php
    }
?> 