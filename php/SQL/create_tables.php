<?php 
    require "../start_connection.php";
    $dir = new DirectoryIterator("./Create");
    foreach($dir as $fileinfo){
        if(!$fileinfo->isDot()){
            $path = $fileinfo->getFilename();
            $sql = file_get_contents("./Create/$path");
            $result = mysqli_query($conn, $sql);
        }
    }

?>