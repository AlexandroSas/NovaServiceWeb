<?php
    require("./db.php");

    $new_client = [""];
    print_r($new_client);

    $sql = "INSERT INTO clienti (
        intestazione,
        agenzia,
        via,
        civico,
        citta,
        provincia,
        cap,
        responsabile,
        telefono,
        cellulare,
        email,
        orario,
        ztl,
        moroso,
        id_sede_legale
    ) VALUES (
        \"$new_client[0]\",    
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
        $new_client[12],    
        $new_client[13],    
        $new_client[14]
    )";
    if(mysqli_query($conn, $sql)){
        echo "<p>Insert: ".$new_client." Success</p>";
    } else {
        echo "<p>Error: ". mysqli_error($conn)."</p>";
    }
?>