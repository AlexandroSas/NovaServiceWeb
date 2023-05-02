<?php
    $sql = "SELECT Nome, Cognome FROM utenti WHERE ID=$id_user";
    $result = mysqli_query($conn, $sql);
    $info = mysqli_fetch_row($result);
    $image = strtolower($info[0]).strtolower($info[1]).".jpg";
?>