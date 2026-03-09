<?php

include "db.php";

if(isset($_POST['id'])){

$id = $_POST['id'];
$image = $_POST['image'];

/* delete image */

if($image != "" && file_exists("upload/".$image)){
unlink("upload/".$image);
}

/* delete record */

$sql = "DELETE FROM classes WHERE id='$id'";

if($conn->query($sql)){
echo "success";
}else{
echo "error";
}

}

?>