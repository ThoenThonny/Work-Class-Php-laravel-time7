
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

/* CARD DESIGN */

.card{
border-radius:12px;
border:none;
transition:0.3s;
}

.card:hover{
transform:translateY(-5px);
box-shadow:0 10px 20px rgba(0,0,0,0.15);
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

/* MODAL FORM DESIGN */

.custom-input{
border-radius:10px;
padding:10px;
border:1px solid #dcdcdc;
transition:0.2s;
}

.custom-input:focus{
border-color:#2563eb;
box-shadow:0 0 0 0.1rem rgba(37,99,235,.25);
}

.form-label{
font-weight:600;
font-size:14px;
color:#333;
}

.modal-content{
border-radius:15px;
}

.modal-header{
border-bottom:none;
}

.modal-footer{
border-top:none;
}

</style>

</head>
<body>

<div class="container mt-4">

<div class="d-flex justify-content-between mb-3">
<h2>Class Dashboard</h2>
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

<div class="mb-3">
<label class="form-label">Course</label>
<select class="form-select custom-input" name="course" id="course" required>
<option value="">Select Course</option>
<option>Web Development</option>
<option>Networking</option>
<option>Programming</option>
<option>Database</option>
<option>Cyber Security</option>
</select>
</div>

<div class="mb-3">
<label class="form-label">Lesson</label>
<select class="form-select custom-input" name="lesson" id="lesson" required>
<option value="">Select Lesson</option>
<option>HTML Basics</option>
<option>CSS Styling</option>
<option>JavaScript Intro</option>
<option>Database Fundamentals</option>
<option>Networking Basics</option>
</select>
</div>

<div class="mb-3">
<label class="form-label">Building</label>
<select class="form-select custom-input" name="building" id="building">
<option value="">Select Building</option>
<option>Main IT Building</option>
<option>Tech Park</option>
<option>Innovation Hub</option>
</select>
</div>

<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label">Floor</label>
<input class="form-control custom-input" name="floor" id="floor" placeholder="Floor">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Room</label>
<input class="form-control custom-input" name="room" id="room" placeholder="Room">
</div>
</div>

<div class="mb-3">
<label class="form-label">Status</label>
<input class="form-control custom-input" name="status" id="status" placeholder="Status">
</div>

<div class="mb-3">
<label class="form-label">Term</label>
<select class="form-select custom-input" name="term" id="term">
<option value="">Select Term</option>
<option>Spring</option>
<option>Summer</option>
<option>Fall</option>
<option>Winter</option>
</select>
</div>

<div class="mb-3">
<label class="form-label">Class Time</label>
<input class="form-control custom-input" name="class_time" id="class_time" placeholder="Class Time">
</div>

<div class="mb-3">
<label class="form-label">Upload Image</label>
<input type="file" name="image_logo" id="image_logo" class="form-control custom-input">
</div>

<div class="text-center">
<img id="preview" width="120" class="img-thumbnail mt-2">
</div>

</div>

<div class="modal-footer">
<button class="btn btn-primary px-4 py-2">💾 Save Class</button>
</div>

</form>

</div>
</div>
</div>

<script>

$(document).ready(function(){

loadClasses();

/* LOAD CLASSES */

function loadClasses(){

$.ajax({
url:"insertcass.php",
method:"POST",
data:{action:"fetch"},
dataType:"json",

success:function(data){

let output="";

$.each(data,function(i,row){

output += `
<div class="col-md-4 mb-4">

<div class="card shadow-sm">

<img src="upload/${row.image_logo}" class="class-img" onerror="this.src='upload/default.png'">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center mb-2">

<h6 class="fw-bold">${row.course}</h6>

<div class="dropdown">

<button class="btn btn-sm btn-light" data-bs-toggle="dropdown">⋮</button>

<ul class="dropdown-menu dropdown-menu-end">

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
data-image="${row.image_logo}">
Edit
</a>
</li>

<li>
<a class="dropdown-item text-danger deleteClass"
data-id="${row.id}"
data-image="${row.image_logo}">
Delete
</a>
</li>

</ul>

</div>

</div>

<p>Class ID <span class="badge badge-id">${row.id}</span></p>
<hr>

<p><strong>Lesson:</strong> ${row.lesson}</p>
<hr>

<p><strong>Building:</strong> ${row.building}</p>
<hr>

<p><strong>Room:</strong> Floor ${row.floor} - ${row.room}</p>
<hr>

<p><strong>Status:</strong> ${row.status}</p>
<hr>

<p><strong>Term:</strong> ${row.term}</p>
<hr>

<p class="time-green"><strong>Time:</strong> ${row.class_time}</p>

</div>
</div>
</div>
`;

});

$("#classData").html(output);

}

});

}

/* ADD CLASS */

$("#addClass").click(function(){

$("#classForm")[0].reset();
$("#preview").attr("src","");
$("#id").val("");

$("#classModal").modal("show");

});

/* SAVE CLASS */

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

/* EDIT CLASS */

$(document).on("click",".editClass",function(){

$("#classModal").modal("show");

$("#course").val($(this).data("course"));
$("#lesson").val($(this).data("lesson"));
$("#building").val($(this).data("building"));
$("#floor").val($(this).data("floor"));
$("#room").val($(this).data("room"));
$("#status").val($(this).data("status"));
$("#term").val($(this).data("term"));
$("#class_time").val($(this).data("time"));
$("#id").val($(this).data("id"));

let img=$(this).data("image");

$("#old_image").val(img);
$("#preview").attr("src","upload/"+img);

});

/* DELETE CLASS */

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

/* IMAGE PREVIEW */

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

});

</script>

</body>
</html>
```
