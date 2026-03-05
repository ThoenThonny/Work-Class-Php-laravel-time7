<?php

include "db.php";

if($_POST['action']=="fetch"){

$result=$conn->query("SELECT * FROM classes ORDER BY id DESC");

$data=[];

while($row=$result->fetch_assoc()){
$data[]=$row;
}

echo json_encode($data);
exit;

}


if(isset($_POST['course'])){

$id=$_POST['id'];
$course=$_POST['course'];
$lesson=$_POST['lesson'];
$building=$_POST['building'];
$floor=$_POST['floor'];
$room=$_POST['room'];
$status=$_POST['status'];
$term=$_POST['term'];
$class_time=$_POST['class_time'];

$imageName=$_POST['old_image'];

if(!empty($_FILES['image_logo']['name'])){

$imageName=time().$_FILES['image_logo']['name'];

move_uploaded_file($_FILES['image_logo']['tmp_name'],"upload/".$imageName);

}

if($id==""){

$conn->query("INSERT INTO classes
(course,lesson,building,floor,room,status,term,class_time,image_logo)
VALUES
('$course','$lesson','$building','$floor','$room','$status','$term','$class_time','$imageName')");

}else{

$conn->query("UPDATE classes SET
course='$course',
lesson='$lesson',
building='$building',
floor='$floor',
room='$room',
status='$status',
term='$term',
class_time='$class_time',
image_logo='$imageName'
WHERE id='$id'");

}

}


if($_POST['action']=="delete"){

$id=$_POST['id'];
$image=$_POST['image'];

$conn->query("DELETE FROM classes WHERE id='$id'");

unlink("upload/".$image);

}

?>