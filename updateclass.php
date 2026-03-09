
<?php
    
    include './db.php';
    $id = $_POST['id'];
    $course= $_POST['course'];
    $lesson = $_POST['lesson'];
    $building= $_POST['building'];
    $floor  = $_POST['floor '];
    $room = $_POST['room'];
    $term = $_POST['term'];
    $class_time= $_POST['class_time'];
    $image_logo = $_POST['image_logo'];
    $created_at =$_POST['created_at'];

    $image_logo= $image_logo;

    if(!empty($_FILES['prf']['course'])){
        if(file_exists('/uploads'.$old_profile)){
            unlink('/uploads'.$old_profile);
        }
        $profile = time()."_".$_FILES['prf']['course'];
        move_uploaded_file($_FILES['prf']['tmp_course'], "uploads/".$profile);
    }

    $sql = "UPDATE classes SET 
    course='$course',
    lesson='$lesson',
    building='$building',
    floor='$floor',
    room='$room',
    term='$term',
    class_time='$class_time',
    image_logo='$image',
    class_time='$class_time',
    created_at='$created',
    WHERE id=$id ";

    if($conn->query($sql)){
        echo json_encode([
            'course'=>$course,
            'lesson'=>$lesson,
            'building'=>$building,
            'floor'=>$floor,
            'term'=>$term,
            'class_time'=>$class_time,
            'image_logo'=>$image_logo,
            'class_time'=>$class_time,
            'created_at'=>$created_at
        ]);
    }else{
        echo json_encode(['error' => $conn->error]);
    }

?>