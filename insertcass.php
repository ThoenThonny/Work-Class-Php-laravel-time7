<?php
    include './db.php';

    $course = $_POST['course'];
    $building = $_POST['building'];
    $floor = $_POST['floor'];
    $room = $_POST['room'];
    $term = $_POST['term'];
    $time = $_POST['time'];

    $profile = "";
    if(!empty($_FILES['prf']['name'])){
        $profile = time()."_".$_FILES['prf']['name'];
        move_uploaded_file($_FILES['prf']['tmp_name'], "upload/".$profile);
    }

    $sql = "INSERT INTO classes_tb (course, building, floor, room, term, class_time, profile) VALUES ('$course', '$building', '$floor', '$room', '$term', '$time', '$profile')";
    
    if($connect->query($sql)){
        $id = $connect->insert_id;
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