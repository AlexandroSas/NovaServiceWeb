<?php
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'NovaService');
    define('DB_PASS', 'Nova2022');
    define('DB_NAME', 'test');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($conn->connect_error){
        die('Connection Failed ' . $conn->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS clienti (
        ID INT NOT NULL AUTO_INCREMENT, 
        Intestazione VARCHAR(255), 
        Agenzia VARCHAR(255), 
        Indirizzo VARCHAR(255), 
        Citta VARCHAR(255), 
        Provincia VARCHAR(255),
        Responsabile VARCHAR(255),
        Telefono VARCHAR(255),
        Telefono1 VARCHAR(255),
        Cellulare VARCHAR(255),
        Fax VARCHAR(255),
        Email VARCHAR(255),
        Partita_Iva VARCHAR(255),
        Orari VARCHAR(255),
        Note_Cliente VARCHAR(255),
        CAP VARCHAR(255),
        Codice_Fiscale VARCHAR(255),
        Indirizzo_Sede_Legale VARCHAR(255),
        CAP_Sede_Legale VARCHAR(255),
        Citta_Sede_Legale VARCHAR(255),
        Provincia_Sede_Legale VARCHAR(255),
        Moroso BOOLEAN DEFAULT 0,
        Zona VARCHAR(255),
        ZTL BOOLEAN DEFAULT 0,
        TotaleToner VARCHAR(255),
        ScortaMinima INT DEFAULT 0,
        Intestazione_Sede_Legale VARCHAR(255),
        Codice_SDI VARCHAR(255),
        Pec_Invio_Fatture VARCHAR(255),
        PRIMARY KEY (ID)
    )";
    
    if(mysqli_query($conn, $sql)){
        echo "Table Created Successfully";
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    $csv = array_map('str_getcsv', file('./Clienti.csv'));
    foreach ($csv as $line) {
        //print_r($line);
        $new_client = [];
        for($i=0; $i<32; $i++){
            if($i==15 || $i==23 || $i==24){
                continue;
            }
            $line[$i] = str_replace("\"","'",$line[$i]);
            array_push($new_client, $line[$i]);
        }
        
        if ($new_client[21] == ''){
            $new_client[21] = 0;
        }
        if ($new_client[23] == ''){
            $new_client[23] = 0;
        }
        if ($new_client[24] == ''){
            $new_client[24] = '0';
        }
        if($new_client[25] == ''){
            $new_client[25] = 0;
        }

        print_r($new_client);
        $sql = "INSERT INTO clienti (
            ID,
            Intestazione, 
            Agenzia, 
            Indirizzo, 
            Citta, 
            Provincia,
            Responsabile,
            Telefono,
            Telefono1,
            Cellulare,
            Fax,
            Email,
            Partita_Iva,
            Orari,
            Note_Cliente,
            CAP,
            Codice_Fiscale,
            Indirizzo_Sede_Legale,
            CAP_Sede_Legale,
            Citta_Sede_Legale,
            Provincia_Sede_Legale,
            Moroso,
            Zona,
            ZTL,
            TotaleToner,
            ScortaMinima,
            Intestazione_Sede_Legale,
            Codice_SDI,
            Pec_Invio_Fatture
        ) VALUES (
            $new_client[0],
            \"$new_client[1]\",    
            \"$new_client[2]\",    
            \"$new_client[3]\",    
            \"$new_client[4]\",    
            \"$new_client[5]\",    
            \"$new_client[6]\",    
            \"$new_client[7]\",    
            \"$new_client[8]\",    
            \"$new_client[9]\",    
            \"$new_client[10]\",    
            \"$new_client[11]\",    
            \"$new_client[12]\",    
            \"$new_client[13]\",    
            \"$new_client[14]\",    
            \"$new_client[15]\",    
            \"$new_client[16]\",    
            \"$new_client[17]\",    
            \"$new_client[18]\",    
            \"$new_client[19]\",    
            \"$new_client[20]\",    
            $new_client[21],    
            \"$new_client[22]\",    
            $new_client[23],    
            \"$new_client[24]\",    
            $new_client[25],    
            \"$new_client[26]\",    
            \"$new_client[27]\",    
            \"$new_client[28]\"    
        )";
        if(mysqli_query($conn, $sql)){
            echo "<p>Insert: ".$new_client[0]." Success</p>";
        } else {
            echo "<p>Error: ". mysqli_error($conn)."</p>";
        }
    }






?>