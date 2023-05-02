<?php 
    require "../start_connection.php";
    $dir = new DirectoryIterator("./Insert/Fake");
    foreach($dir as $fileinfo){
        if(!$fileinfo->isDot()){
            $path = $fileinfo->getFilename();
            $sql = file_get_contents("./Insert/Fake/$path");
            $result = mysqli_query($conn, $sql);
        }
    }

?>