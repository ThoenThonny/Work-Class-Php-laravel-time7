<?php

$conn = new mysqli("localhost","root","","db_php_time7",3306);

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

?>