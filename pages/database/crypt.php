<?php
    $ciphering = "AES-256-CBC";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "i-yNS4ykNyHelKKnyENovaServiceKVTQeI_TjtDFSg=";
?>