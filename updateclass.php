<?php
    include './db.php';

    $id = $_POST['class_id']; // FIXED
    $course = $_POST['course'];
    $building = $_POST['building'];
    $floor = $_POST['floor'];
    $room = $_POST['room'];
    $term = $_POST['term'];
    $time = $_POST['time'];
    $old_profile = $_POST['old_profile'];

    $profile = $old_profile;

    if(!empty($_FILES['prf']['name'])){
        if(!empty($old_profile) && file_exists("upload/".$old_profile)){
            unlink("upload/".$old_profile);
        }
        $profile = time()."_".$_FILES['prf']['name'];
        move_uploaded_file($_FILES['prf']['tmp_name'], "upload/".$profile);
    }

    $sql = "UPDATE classes_tb SET course = '$course', building = '$building', floor = '$floor', room = '$room', term = '$term', class_time = '$time', profile = '$profile' WHERE id = $id";

    if($connect->query($sql)){
        echo json_encode([
            'id' => $id,
            'course' => $course,
            'building' => $building,
            'floor' => $floor,
            'room' => $room,
            'term' => $term,
            'class_time' => $time,
            'profile' => $profile
        ]);
    }else{
        echo json_encode(['error' => $connect->error]);
    }
?>