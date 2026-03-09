
<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>

<title>Class Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>

    body{
    background:#f5f6fa;
    }

    .card{
    border-radius:12px;
    border:none;
    }

    .class-img{
    height:160px;
    object-fit:cover;
    border-top-left-radius:12px;
    border-top-right-radius:12px;
    }

    .badge-id{
    background:#e0e7ff;
    color:#1e40af;
    }

    .time-green{
    color:#16a34a;
    font-weight:600;
    }

</style>

</head>
<body>

    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h1>class</h1>
            <button class="btn btn-danger" id="addClass">Add Class +</button>
        </div>
    <div class="row" id="classData"></div>
</div>
<!-- Modal -->
<div class="modal fade" id="classModal">
    <div class="modal-dialog">
    <div class="modal-content">

<form id="classForm" enctype="multipart/form-data">

    <div class="modal-header">
        <h5 class="modal-title">Class Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>

    <div class="modal-body">

        <input type="hidden" name="id" id="id">
        <input type="hidden" name="old_image" id="old_image">

<!-- Course Select -->
<select class="form-select mb-2" name="course" id="course" required>
  <option value="" disabled selected>Select Course</option>
  <option value="Web Development">Web Development</option>
  <option value="Networking">Networking</option>
  <option value="Programming">Programming</option>
  <option value="Database">Database</option>
  <option value="Cyber Security">Cyber Security</option>
</select>

<!-- Lesson Select -->
<select class="form-select mb-2" name="lesson" id="lesson" required>
  <option value="" disabled selected>Select Lesson</option>
  <option value="HTML Basics">HTML Basics</option>
  <option value="CSS Styling">CSS Styling</option>
  <option value="JavaScript Intro">JavaScript Intro</option>
  <option value="Database Fundamentals">Database Fundamentals</option>
  <option value="Networking Basics">Networking Basics</option>
</select>

<!-- Building Select -->
<select class="form-select mb-2" name="building" id="building" required>
  <option value="" disabled selected>Select Building</option>
  <option value="Main IT Building">Main IT Building</option>
  <option value="Tech Park">Tech Park</option>
  <option value="Innovation Hub">Innovation Hub</option>
</select>
<input class="form-control mb-2" name="floor" id="floor" placeholder="Floor">
<input class="form-control mb-2" name="room" id="room" placeholder="Room">
<input class="form-control mb-2" name="status" id="status" placeholder="Status">
<select class="form-select mb-2" name="term" id="term" required>
  <option value="" disabled selected>Select Term</option>
  <option value="Spring">Spring</option>
  <option value="Summer">Summer</option>
  <option value="Fall">Fall</option>
  <option value="Winter">Winter</option>
</select>
<input class="form-control mb-2" name="class_time" id="class_time" placeholder="Class Time">

<input type="file" name="image_logo" id="image_logo" class="form-control mb-2">

<img id="preview" width="120">

</div>

<div class="modal-footer">
<button class="btn btn-primary">Save</button>
</div>

</form>

</div>
</div>
</div>

<script>

$(document).ready(function(){

    loadClasses();

        function loadClasses(){

        $.ajax({    

            url:"insertcass.php",
            method:"POST",
            data:{action:"fetch"},
            dataType:"json",

        success:function(data){

        let output="";

        $.each(data,function(i,row){

        output+=`

            <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
            <img src="upload/${row.image_logo}" class="class-img">
           <div class="card-body">\
            <div class="d-flex justify-content-between">\
            <h6>${row.course}</h6>
            <div class="dropdown">
            <button class="btn btn-sm" data-bs-toggle="dropdown">⋮</button>
            <ul class="dropdown-menu">
            <li>
            <a class="dropdown-item editClass"
            data-id="${row.id}"
            data-course="${row.course}"
            data-lesson="${row.lesson}"
            data-building="${row.building}"
            data-floor="${row.floor}"
            data-room="${row.room}"
            data-status="${row.status}"
            data-term="${row.term}"
            data-time="${row.class_time}"
            data-image="${row.image_logo}"
            >Edit</a>
            </li>
            <li>
            <a class="btn dropdown-item text-danger deleteClass"
            data-id="${row.id}"
            data-image="${row.image_logo}"
            >Delete</a>
            </li>
            </ul>
            </div>
                </div>
            <p>Class ID <span class="badge badge-id">${row.id}<hr></span></p>
            <p>Lesson:${row.lesson}<hr></p>
            <p>Building:${row.building}<hr></p>
            <p>Floor:${row.floor} - ${row.room}<hr></p>
            <p>Status:${row.status}<hr></p>
            <p>Term:${row.term}<hr></p>
            <p class="time-green">Time:${row.class_time}<hr></p>

            </div>
                </div>
                    </div>
            `;
         });

    $("#classData").html(output);

}

});

}

// addclass

    $("#addClass").click(function(){

        $("#classForm")[0].reset();
        $("#preview").attr("src","");
        $("#id").val("");

    $("#classModal").modal("show");
    });
    $("#classForm").submit(function(e){

    e.preventDefault();

    let formData=new FormData(this);

    $.ajax({
        url:"insertcass.php",
        type:"POST",
        data:formData,
        contentType:false,
        processData:false,
        success:function(){
        $("#classModal").modal("hide");
        loadClasses();
}

});

});


$(document).on("click",".editClass",function(){
// model
$("#classModal").modal("show");
    $("#course").val($(this).data("course"));
    $("#lesson").val($(this).data("lesson"));
    $("#building").val($(this).data("building"));
    $("#floor").val($(this).data("floor"));
    $("#room").val($(this).data("room"));
    $("#status").val($(this).data("status"));
    $("#term").val($(this).data("term"));
    $("#id").val($(this).data("id"));
    $("#class_time").val($(this).data("time"));

let img=$(this).data("image");

$("#old_image").val(img);

$("#preview").attr("src","upload/"+img);

});


$(document).on("click",".deleteClass",function(){

if(confirm("Delete this class?")){

let id=$(this).data("id");
let image=$(this).data("image");

$.post("insertcass.php",{

action:"delete",
id:id,
image:image

},function(){
loadClasses();
});
    }
        });

            }); 
$("#image_logo").change(function(event){
    let input = event.target;

    if(input.files && input.files[0]){
        let reader = new FileReader();

        reader.onload = function(e){
            $("#preview").attr("src", e.target.result).show();
        }

        reader.readAsDataURL(input.files[0]);
    }
});

</script>

</body>
</html>