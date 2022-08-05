<?php
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'NovaService');
    define('DB_PASS', 'Nova2022');
    define('DB_NAME', 'NovaService');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
    if($conn->connect_error){
        die('Connection Failed ' . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS NovaService";
    if(mysqli_query($conn, $sql)){
        echo "Database NovaService Creata Correttamente";
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    mysqli_close($conn);

    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($conn->connect_error){
        die('Connection Failed ' . $conn->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS utenti (
        ID INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255) NOT NULL,
        cognome VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        ruolo INT NOT NULL
    )";
    if(mysqli_query($conn, $sql)){
        echo "Tabella Utenti Creata Correttamente";
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    $sql = "CREATE TABLE IF NOT EXISTS clienti (
        ID INT NOT NULL AUTO_INCREMENT,
        intestazione VARCHAR(255) NOT NULL,
        agenzia VARCHAR(255) NOT NULL,
        via VARCHAR(255) NOT NULL,
        civico VARCHAR(255) NOT NULL,
        citta VARCHAR(255) NOT NULL,
        provincia VARCHAR(2) NOT NULL,
        cap VARCHAR(5) NOT NULL,
        responsabile VARCHAR(255),
        telefono VARCHAR(255),
        cellulare VARCHAR(255),
        email VARCHAR(255),
        orario VARCHAR(255),
        ztl BOOLEAN,
        moroso BOOLEAN,
        id_sede_legale INT
    )";
    if(mysqli_query($conn, $sql)){
        echo "Tabella Clienti Creata Correttamente";
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    $sql = "CREATE TABLE IF NOT EXISTS sedi_legali (
        ID INT NOT NULL AUTO_INCREMENT,
        intestazione VARCHAR(255) NOT NULL,
        via VARCHAR(255) NOT NULL,
        civico VARCHAR(255) NOT NULL,
        citta VARCHAR(255) NOT NULL,
        provincia VARCHAR(2) NOT NULL,
        cap VARCHAR(5) NOT NULL,
        responsabile VARCHAR(255),
        telefono VARCHAR(255),
        cellulare VARCHAR(255),
        email VARCHAR(255),
        partita_iva VARCHAR(255),
        codice_sdi VARCHAR(255),
        pec VARCHAR(255)
    )";
    if(mysqli_query($conn, $sql)){
        echo "Tabella Sedi Legali Creata Correttamente";
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    mysqli_close($conn);


?>