<?php
include "../db.php";

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $image = $_POST['image'];

    // delete image
    if(file_exists("../upload/".$image)){
        unlink("../upload/".$image);
    }

    // delete data
    $conn->query("DELETE FROM class_tbl WHERE id='$id'");

}
?>