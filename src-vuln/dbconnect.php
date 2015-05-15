<?php
    $db = new mysqli('localhost', 'root', 'root', 'guestbook' );
    
    if(mysqli_connect_errno() == 0){
    } else {
        echo 'sorry, an error occured';
        print mysqli_error($db);
    }
?>
