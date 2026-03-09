<?php
    include './db.php';

     $id = $_POST['id'];
     // Get profile image first
    $get = $connect->query("SELECT profile FROM classes_tb WHERE id='$id'");
    $row = $get->fetch_assoc();
    $profile = $row['profile'];

    // Delete image file
    if(file_exists("upload/".$profile)){
        unlink("upload/".$profile);
    }

    // Delete from database
    $connect->query("DELETE FROM classes_tb WHERE id='$id'");

    echo json_encode(["status" => "success"]);
?>