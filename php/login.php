<?php
    require "./start_connection.php";

    $sql = 'SELECT * FROM utenti';
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $ciphering = "AES-256-CBC";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "i-yNS4ykNyHelKKnyENovaServiceKVTQeI_TjtDFSg=";

    if(isset($_POST['submit'])){
        $username = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        //$password = htmlspecialchars($_POST['password']);

        
        $error = "Utente non Presente";
        $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);
        foreach($users as &$user){
            if($user['Username']==$username){
                $error = "Password Errata";
                if($user['Username']==$username && $user['Password']==$encryption){
                    session_start();
                    $_SESSION['IDU'] = $user['ID'];
                    $_SESSION['FirstName'] = $user['Nome'];				
                    $_SESSION['LastName'] = $user['Cognome'];
                    $_SESSION['Email'] = $user['Email'];
                    $_SESSION['Phone'] = $user['Cellulare'];
                    $_SESSION['Role'] = $user['Ruolo'];
                    $_SESSION['Image'] = strtolower($user['Nome']).strtolower($user['Cognome']).".jpg";
                    header("Location: ../tech_home.php");
                }
            }
        }
        header("Location: ../index.php?user=$username&error=$error");
    }
    mysqli_close($conn);

?>