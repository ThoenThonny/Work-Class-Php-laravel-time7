<?php
    include './db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Class Cards</title>

    <style>
        .class-card {
            width: 360px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 18px;
            background: white;
            transition: 0.3s;
        }

        .class-id {
            background: #5c6ac4;
            color: white;
            padding: 2px 8px;
            border-radius: 6px;
            font-size: 13px;
        }

        .badge-lesson {
            background: #eee;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 13px;
        }

        .class-info {
            border-bottom: 1px solid #eee;
            padding: 6px 0;
            font-size: 14px;
        }

        .status {
            color: #3f51b5;
            font-weight: 500;
        }

        .time {
            color: green;
            font-weight: 500;
        }

        .calss-card {
            position: relative;
        }

        /* #card{
            width:1;
            height: auto;
        } */

        #modalMenu {
            top: 0%;
            left: 0%;
            position: absolute;
            z-index: 100;
            display: none;
        }

        .opacity {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: rgba(0, 0, 0, 0.5); */
            z-index: 50;
            display: none;
        }

        .class-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-img {
            height: 150px;
            /* around 30% */
        }

        .card-img img {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            object-fit: cover;
        }
    </style>

</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top">
        <div class="container">
            <svg xmlns="http://www.w3.org/2000/svg" style="color: #1c0693; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-warehouse-icon lucide-warehouse">
                <path d="M18 21V10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v11" />
                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 1.132-1.803l7.95-3.974a2 2 0 0 1 1.837 0l7.948 3.974A2 2 0 0 1 22 8z" />
                <path d="M6 13h12" />
                <path d="M6 17h12" />
            </svg>

            <a class="navbar-brand fw-bold" href="#">
                ETEC CENTER
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">My Classes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Schedule</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>

                    <li class="nav-item">
                        <button class="btn btn-light ms-2">Logout</button>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <div>
        <div class="d-flex justify-content-between align-items-center px-4">
            <div>
                <h3 class="mt-4 mb-0">ETEC CENTER</h3>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary" id="addClassBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                        <path d="M12 8v8" />
                    </svg>
                    Add Class
                </button>
            </div>
        </div>
    </div>

    <div class="container mt-5" id="container">
        <div id="cards" class="row g-4">
            <?php
                $result = $connect -> query("SELECT * FROM classes_tb");
                while ($card = $result -> fetch_assoc()):
            ?>
                <div class="col-md-4"
                    id="card-<?= $card['id'] ?>" 
                    data-id="<?= $card['id'] ?>"
                    data-course="<?= $card['course'] ?>"
                    data-building="<?= $card['building'] ?>"
                    data-floor="<?= $card['floor'] ?>"
                    data-room="<?= $card['room'] ?>"
                    data-term="<?= $card['term'] ?>"
                    data-time="<?= $card['class_time'] ?>"
                    data-profile="<?= $card['profile'] ?>"
                >
                    <div class="class-card bg-light">
                        <div class="card-img">
                            <img src="upload/<?= $card['profile'] ?>" alt="class image">
                        </div>
                        <div class="pt-3">
                            <div class="d-flex justify-content-between">
                                <h4><?= $card['course'] ?></h4>
                                <svg class="menuButton" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="1" />
                                    <circle cx="12" cy="5" r="1" />
                                    <circle cx="12" cy="19" r="1" />
                                </svg>
                            </div>

                            <p>Class id: <span class="class-id"><?= $card['id']?></span></p>

                            <div class="class-info"><strong>Building : </strong><?= $card['building'] ?></div>
                            <div class="class-info"><strong>Floor & Room : </strong><?= $card['floor'] ?><span class="text-primary">-(<?= $card['room'] ?>)</span></div>
                            <div class="class-info"><strong>Term : </strong><?= $card['term'] ?></div>
                            <div class="class-info"><strong>Time : </strong> <span class="time"><?= $card['class_time'] ?></span></div>
                            <button class="btn btn-outline-primary w-100 mt-3">View Class</button>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
    </div>

    <div class="opacity"></div>

    <!-- Modal Menu -->
    <div id="modalMenu" class="modal-menu p-2 rounded bg-light border-2 border-danger shadow" style="width: 120px;">
        <button id="btn-edit" class="btn btn-outline-warning btn-sm w-100 mb-1 text-dark fw-bold">Edit</button>
        <button id="btn-delete" class="btn btn-outline-danger btn-sm w-100 text-dark fw-bold">Delete</button>
    </div>

    <!-- Modal -->
    <div id="addClassModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-lg" style="background:#f8f9fa;">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <h5 id="title" class="modal-title fw-bold">Add New Class</h5>
                    <button id="btn-close" type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body pt-2">
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body p-4">
                            <form method="POST" id="addClassForm" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" id="class_id" name="class_id">
                                    <input type="hidden" id="form_mode" name="form_mode" value="add"> <!-- "add" or "edit" -->
                                    <!-- Class Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Course</label>
                                        <select class="form-select" name="course" id="course" required>
                                            <option value="">Select Class</option>
                                            <option value="Web Design">Web Design</option>
                                            <option value="React.js">React.js</option>
                                            <option value="Python">Python</option>
                                            <option value="Database">Database</option>
                                        </select>
                                    </div>
                                    <!-- Building -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Building</label>
                                        <select class="form-select" name="building" id="building" required>
                                            <option value="">Select Building</option>
                                            <option value="Building A">Building A</option>
                                            <option value="Building B">Building B</option>
                                            <option value="Building C">Building C</option>
                                        </select>
                                    </div>
                                    <!-- Floor -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Floor</label>
                                        <select class="form-select" name="floor" id="floor" required>
                                            <option value="">Select Floor</option>
                                            <option value="Floor-1">Floor-1</option>
                                            <option value="Floor-2">Floor-2</option>
                                            <option value="Floor-3">Floor-3</option>
                                        </select>
                                    </div>
                                    <!-- Time -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Room</label>
                                        <select class="form-select" name="room" id="room" required>
                                            <option value="">Select Room</option>
                                            <option value="ETEC B101">ETEC B101</option>
                                            <option value="ETEC B205">ETEC B205</option>
                                            <option value="ETEC B305">ETEC B305</option>
                                        </select>
                                    </div>
                                    <!-- Term -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Term</label>
                                        <select class="form-select" name="term" id="term" required>
                                            <option value="">Select Term</option>
                                            <option value="Mon & Wed">Mon & Wed</option>
                                            <option value="Tue & Thu">Tue & Thu</option>
                                            <option value="Sat & Sun">Sat & Sun</option>
                                        </select>
                                    </div>
                                    <!-- Time -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Time</label>
                                        <select class="form-select" name="time" id="time" required>
                                            <option value="">Select Time</option>
                                            <option value="08:00 am - 09:15 am">08:00 am - 09:15 am</option>
                                            <option value="09:30 am - 10:45 am">09:30 am - 10:45 am</option>
                                            <option value="11:00 am - 12:15 pm">11:00 am - 12:15 pm</option>
                                            <option value="01:30 pm - 02:45 pm">01:30 pm - 02:45 pm</option>
                                        </select>
                                    </div>

                                </div>

                                <input type="hidden" id="old_profile" name="old_profile">

                                <!-- Profile Image -->
                                <div class="mb-3 text-center">
                                    <label class="form-label fw-semibold">Profile Image</label>
                                    <input type="file" id="prf" name="prf" class="form-control">

                                    <img id="preview"
                                        class="mt-3 shadow object-fit-cover"
                                        style="width:120px;height:120px;"
                                        src="">
                                </div>
                                <!-- Submit -->
                                <button id="btn-submit" type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                                    Add Class
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div id="deleteModal" class="p-4 bg-white shadow rounded-4" 
        style="width:400px; display:none; position:fixed; top:50%; left:50%; transform:translate(-50%,-50%); z-index:1000;">
        
        <h4 class="text-danger">Delete Employee</h4>
        <p>Are you sure you want to delete this employee?</p>

        <input type="hidden" id="delete_id">

        <div class="d-flex justify-content-end gap-2">
            <button id="confirmDelete" class="btn btn-danger">Yes, Delete</button>
            <button id="cancelDelete" class="btn btn-secondary">Cancel</button>
        </div>
    </div>
</div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let selectedCard = null;

    $(".menuButton").click(function(e) {
        selectedCard = $(this).closest(".col-md-4");
        let offset = $(this).offset();
        $('#modalMenu').css({
            top: offset.top + 40 + "px",
            left: offset.left - 100 + "px",
            display: "block"
        });
        $('.opacity').fadeIn(300);
    });

    $("#btn-close").click(function(){
        $('#modalMenu').fadeOut(300);
        $('.opacity').fadeOut(300);
        $("#addClassForm")[0].reset();
        $("#preview").attr("src","")
        $("#title").text("");
    })

    $("#btn-edit").click(function(){
        $("#title").text("Edite Class");
        $("#btn-submit").text("Edit")
    }) 
    
    $("#addClassBtn").click(function(){
        $("#title").text("Add New Class");
        $("#btn-submit").text("Add")
    })

    $(".opacity").click(function() {
        $('#modalMenu').fadeOut(300);
        $('.opacity').fadeOut(300);
        $("#addClassForm")[0].reset();
        $("#preview").attr("src","")
        $("#title").text("");
    });

    $("#prf").change(function(e){
        const file = e.target.files[0]
        const readfile = new FileReader()
        readfile.onload = function(){
             $("#preview").attr("src",readfile.result)
        }
        readfile.readAsDataURL(file)
    })
    
    $("#addClassBtn").click(function() {
        $("#addClassModal").modal('show');
    });

    $("#addClassForm").submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        let id = $("#class_id").val();
        let url = (id === "") ? 'insertcass.php' : 'updateclass.php';

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
                // Append new class card dynamically
                if ( id === ""){
                    $("#cards").append(`
                        <div class="col-md-4"
                            data-id="${data.id}"
                            data-course="${data.course}"
                            data-building="${data.building}"
                            data-floor="${data.floor}"
                            data-room="${data.room}"
                            data-term="${data.term}"
                            data-time="${data.class_time}"
                            data-profile="${data.profile}"
                        >
                            <div class="class-card bg-light">
                                <div class="card-img">
                                    <img src="upload/${data.profile}" alt="class image">
                                </div>
                                <div class="pt-3">
                                    <div class="d-flex justify-content-between">
                                        <h4>${data.course}</h4>
                                        <svg class="menuButton" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="1" />
                                            <circle cx="12" cy="5" r="1" />
                                            <circle cx="12" cy="19" r="1" />
                                        </svg>
                                    </div>

                                    <p>Class id: <span class="class-id">${data.id}</span></p>
                                    <div class="class-info"><strong>Building : </strong>${data.building}</div>
                                    <div class="class-info"><strong>Floor & Room : </strong>${data.floor}<span class="text-primary">-(${data.room})</span></div>
                                    <div class="class-info"><strong>Term : </strong>${data.term}</div>
                                    <div class="class-info"><strong>Time : </strong> <span class="time">${data.class_time}</span></div>
                                    <button class="btn btn-outline-primary w-100 mt-3">View Class</button>
                                </div>
                            </div>
                        </div>
                    `);
                    alert("Class added successfully!");
                }else{
                    selectedCard.data("course", data.course);
                    selectedCard.data("building", data.building);
                    selectedCard.data("floor", data.floor);
                    selectedCard.data("room", data.room);
                    selectedCard.data("term", data.term);
                    selectedCard.data("time", data.class_time);
                    selectedCard.data("profile", data.profile);

                    selectedCard.find(".card-img img").attr("src","upload/"+data.profile);
                    selectedCard.find("h4").text(data.course);
                    selectedCard.find(".class-info:eq(0)").html("<strong>Building : </strong>"+data.building);
                    selectedCard.find(".class-info:eq(1)").html("<strong>Floor & Room : </strong>"+data.floor+"<span class='text-primary'>-("+data.room+")</span>");
                    selectedCard.find(".class-info:eq(2)").html("<strong>Term : </strong>"+data.term);
                    selectedCard.find(".class-info:eq(3)").html("<strong>Time : </strong> <span class='time'>"+data.class_time+"</span>");

                    alert("Class updated successfully!");
                }

                // Hide modal and reset form
                $("#addClassModal").modal("hide");
                $("#addClassForm")[0].reset();
                $("#preview").attr("src","");
            },
            error: function() {
                alert("Upload failed!");
            }
        });
    });
    
    $(document).on("click","#btn-edit",function(){
        let id = selectedCard.data("id");
        let course = selectedCard.data("course");
        let building = selectedCard.data("building");
        let floor = selectedCard.data("floor");
        let room = selectedCard.data("room");
        let term = selectedCard.data("term");
        let time = selectedCard.attr("data-time"); // use attr for full string
        let profile = selectedCard.data("profile");

        // fill modal form
        $("#course").val(course);
        $("#building").val(building);
        $("#floor").val(floor);
        $("#room").val(room);
        $("#term").val(term);
        $("#time").val(time);
        $("#old_profile").val(profile);
        $("#class_id").val(id);
        $("#form_mode").val("edit"); // mark as edit mode

        $("#preview").attr("src","upload/"+profile);
        $("#title").text("Edit Class");
        $("#addClassModal").modal("show");
        $("#modalMenu").hide();
        $(".opacity").hide();
    });

    $(document).on("click", "#btn-delete", function () {
        let id = selectedCard.data("id");
        $("#delete_id").val(id);

        $(".opacity").fadeIn(300);
        $("#deleteModal").fadeIn(300);

        $("#modalMenu").fadeOut(200); // hide menu
    });

    $("#cancelDelete").click(function(){
        $(".opacity").fadeOut(300);
        $("#deleteModal").fadeOut(300);
    })

    $("#confirmDelete").click(function () {
        let id = $("#delete_id").val();
        $.ajax({
            url: "deleteclass.php",
            method: "POST",
            data: { id: id },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    $("#card-" + id).remove();
                }

                $(".opacity").fadeOut(300);
                $("#deleteModal").fadeOut(300);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });
    
</script>