<?php
    require("./crypt.php");
    require("./db.php");

    $roles = [
        0,  // Dirigente
        1,  // Amministrazione
        2,  // Assistenza
        3,  // Software Developer
        4,  // Commerciale
        5,  // Tecnico
        6,  // Magazziniere
        7   // Ufficio Legale
    ];

    $new_users = [
        ["Alexandro", "Sas", "a.sas@novaservicesrl.com", "alexandro.sas", openssl_encrypt("sweinX98", $ciphering, $encryption_key, $options, $encryption_iv), $roles[3]],
        ["Tatyana", "Saiealla", "t.saiella@novaservicesrl.com", "tatyana.saiella", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[0]],
        ["Giuseppe", "Quartuccio", "g.quartuccio@novaservicesrl.com", "giuseppe.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[0]],
        ["Matteo", "Quartuccio", "e.quartuccio@novaservicesrl.com", "elisa.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[4]],
        ["Elisa", "Quartuccio", "e.quartuccio@novaservicesrl.com", "elisa.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[1]],
        ["Luigi", "Casbarra", "l.casbarra@novaservicesrl.com", "luigi.casbarra", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[4]],
        ["Massimo", "Ferrari", "m.ferrari@novaservicesrl.com", "massimo.ferrari", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Mirko", "Quartuccio", "magazzino@novaservicesrl.com", "mirko.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[6]],
        ["Vincenzo", "Zambuto", "v.zambuto@novaservicesrl.com", "vincenzo.zambuto", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[7]],
        ["Luca","Mauriello","l.mauriello@novaservicesrl.com","luca.mauriello", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[1]],
        ["Bartolo","Quartuccio","b.quartuccio@novaservicesrl.com","bartolo.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[1]],
        ["Debora","De Angelis","assistenza@novaservicesrl.com","debora.deangelis", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[2]]
    ];
    $new_users = [];
    foreach ($new_users as &$new_user){

        $sql = "INSERT INTO utenti (
            nome,
            cognome,
            email,
            username,
            password,
            ruolo
        ) VALUES (
            \"$new_user[0]\",    
            \"$new_user[1]\",    
            \"$new_user[2]\",    
            \"$new_user[3]\",    
            \"$new_user[4]\",    
            $new_user[5]
        )";
        if(mysqli_query($conn, $sql)){
            echo "<p>Insert: ".$new_user[3]." Success</p>";
        } else {
            echo "<p>Error: ". mysqli_error($conn)."</p>";
        }

    }
?>