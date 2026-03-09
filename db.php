<?php
    $connect = new mysqli("localhost", "root", "", "db_php", 3306);
    if($connect -> connect_error){
        echo '<h1>Fail '.$connect -> error.'</h1>';
    }
?>