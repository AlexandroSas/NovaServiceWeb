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
        ["Tatyana", "Saiella", "t.saiella@novaservicesrl.com", "tatyana.saiella", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[0]],
        ["Giuseppe", "Quartuccio", "g.quartuccio@novaservicesrl.com", "giuseppe.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[0]],
        ["Elisa", "Quartuccio", "e.quartuccio@novaservicesrl.com", "elisa.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[1]],
        ["Luca","Mauriello","l.mauriello@novaservicesrl.com","luca.mauriello", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[1]],
        ["Bartolomeo","Quartuccio","amministrazione@novaservicesrl.com","bartolo.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[1]],
        ["Debora","De Angelis","assistenza@novaservicesrl.com","debora.deangelis", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[2]],
        ["Ilaria","Quartuccio","assistenza@novaservicesrl.com","ilaria.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[2]],
        ["Tommaso","Malvone","assistenza@novaservicesrl.com","tommaso.malvone", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[2]],
        ["Alexandro", "Sas", "a.sas@novaservicesrl.com", "alexandro.sas", openssl_encrypt("sweinX98", $ciphering, $encryption_key, $options, $encryption_iv), $roles[3]],
        ["Matteo", "Quartuccio", "m.quartuccio@novaservicesrl.com", "matteo.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[4]],
        ["Luigi", "Casbarra", "l.casbarra@novaservicesrl.com", "luigi.casbarra", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[4]],
        ["Flavio", "Mangiacapra", "f.mangiacapra@novaservicesrl.com", "flavio.mangiacapra", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[4]],
        ["Massimiliano", "Ferrari", "m.ferrari@novaservicesrl.com", "massimo.ferrari", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Andrea", "Montalto", "a.montalto@novaservicesrl.com", "andrea.montalto", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Angelo", "Amico", "a.amico@novaservicesrl.com", "angelo.amico", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Daniele", "Taglioni", "d.taglioni@novaservicesrl.com", "daniele.taglioni", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Fabio", "Bucella", "f.bucella@novaservicesrl.com", "fabio.bucella", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Salvatore", "Maligno", "s.maligno@novaservicesrl.com", "salvatore.maligno", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Domenico", "Gentile", "d.gentile@novaservicesrl.com", "domenico.gentile", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Danilo", "Dolci", "d.dolci@novaservicesrl.com", "danilo.dolci", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Massimiliano", "Chiari", "m.chiari@novaservicesrl.com", "massimiliano.chiari", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Nicola", "Bongiovanni", "n.bongiovanni@novaservicesrl.com", "nicola.bongiovanni", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Alessandro", "Spalvieri", "a.spalvieri@novaservicesrl.com", "alessandro.spalvieri", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[5]],
        ["Mirko", "Quartuccio", "magazzino@novaservicesrl.com", "mirko.quartuccio", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[6]],
        ["Massimo", "Stazi", "magazzino@novaservicesrl.com", "massimo.stazi", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[6]],
        ["Vincenzo", "Zambuto", "v.zambuto@novaservicesrl.com", "vincenzo.zambuto", openssl_encrypt("1234", $ciphering, $encryption_key, $options, $encryption_iv), $roles[7]],
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