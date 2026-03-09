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
        <div class="row g-4">
            <!-- CARD 1 -->
            <div class="col-md-4">
                <div class="class-card bg-light">

                    <!-- Image Top (30%) -->
                    <div class="card-img">
                        <img src="https://i.pinimg.com/736x/52/44/79/5244796fec46e7e8c6759fc6eb34024b.jpg" alt="class image">
                    </div>

                    <!-- Content -->
                    <div class="pt-3">

                        <div class="d-flex justify-content-between">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                <path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>

                            <h4>Web Design + React.js</h4>

                            <svg class="menuButton" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="5" r="1" />
                                <circle cx="12" cy="19" r="1" />
                            </svg>
                        </div>

                        <p>Class id: <span class="class-id">236</span></p>

                        <div class="class-info"><strong>Class Lessons:</strong> <span class="badge-lesson">Animation</span></div>
                        <div class="class-info"><strong>Building:</strong> Building B</div>
                        <div class="class-info"><strong>Floor & Room:</strong> Floor-2 - <span class="text-primary">(ETEC B205)</span></div>
                        <div class="class-info"><strong>Status:</strong> <span class="status">Physical Class</span></div>
                        <div class="class-info"><strong>Term:</strong> Mon & Thu</div>
                        <div class="class-info"><strong>Time:</strong> <span class="time">11:00 am - 12:15 pm</span></div>
                        <div class="class-info"><strong>Total Stu:</strong> 10</div>

                        <button class="btn btn-outline-primary w-100 mt-3">View Class</button>

                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-md-4">
                <div class="class-card bg-light">

                    <!-- Image Top (30%) -->
                    <div class="card-img">
                        <img src="https://i.pinimg.com/736x/52/44/79/5244796fec46e7e8c6759fc6eb34024b.jpg" alt="class image">
                    </div>

                    <!-- Content -->
                    <div class="pt-3">

                        <div class="d-flex justify-content-between">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                <path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>

                            <h4>Web Design + React.js</h4>

                            <svg class="menuButton" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="5" r="1" />
                                <circle cx="12" cy="19" r="1" />
                            </svg>
                        </div>

                        <p>Class id: <span class="class-id">236</span></p>

                        <div class="class-info"><strong>Class Lessons:</strong> <span class="badge-lesson">Animation</span></div>
                        <div class="class-info"><strong>Building:</strong> Building B</div>
                        <div class="class-info"><strong>Floor & Room:</strong> Floor-2 - <span class="text-primary">(ETEC B205)</span></div>
                        <div class="class-info"><strong>Status:</strong> <span class="status">Physical Class</span></div>
                        <div class="class-info"><strong>Term:</strong> Mon & Thu</div>
                        <div class="class-info"><strong>Time:</strong> <span class="time">11:00 am - 12:15 pm</span></div>
                        <div class="class-info"><strong>Total Stu:</strong> 10</div>

                        <button class="btn btn-outline-primary w-100 mt-3">View Class</button>

                    </div>
                </div>
            </div>

            <!-- Card 3 -->

            <div class="col-md-4">
                <div class="class-card bg-light">
                    <!-- Image Top (30%) -->
                    <div class="card-img">
                        <img src="https://i.pinimg.com/736x/52/44/79/5244796fec46e7e8c6759fc6eb34024b.jpg" alt="class image">
                    </div>

                    <!-- Content -->
                    <div class="pt-3">

                        <div class="d-flex justify-content-between">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                <path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>

                            <h4>Web Design + React.js</h4>

                            <svg class="menuButton" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="5" r="1" />
                                <circle cx="12" cy="19" r="1" />
                            </svg>
                        </div>

                        <p>Class id: <span class="class-id">236</span></p>

                        <div class="class-info"><strong>Class Lessons:</strong> <span class="badge-lesson">Animation</span></div>
                        <div class="class-info"><strong>Building:</strong> Building B</div>
                        <div class="class-info"><strong>Floor & Room:</strong> Floor-2 - <span class="text-primary">(ETEC B205)</span></div>
                        <div class="class-info"><strong>Status:</strong> <span class="status">Physical Class</span></div>
                        <div class="class-info"><strong>Term:</strong> Mon & Thu</div>
                        <div class="class-info"><strong>Time:</strong> <span class="time">11:00 am - 12:15 pm</span></div>
                        <div class="class-info"><strong>Total Stu:</strong> 10</div>

                        <button class="btn btn-outline-primary w-100 mt-3">View Class</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="opacity"></div>
    <!-- Modal Menu -->
    <div id="modalMenu" class="modal-menu p-2 rounded bg-light border-2 border-danger shadow" style="width: 120px;">
        <button class="btn btn-outline-warning btn-sm w-100 mb-1 text-dark fw-bold">Edit</button>
        <button class="btn btn-outline-danger btn-sm w-100 text-dark fw-bold">Delete</button>
    </div>

    <!-- Modal Add Class -->
    <div id="addClassModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4 rounded-4 shadow-lg" style="max-width: 500px; background: #f8f9fa;">

                <!-- Modal Header -->
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Add New Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body pt-2">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <form id="addClassForm">

                                <!-- Class Name -->
                                <div class="mb-3">
                                    <label class="form-label">Class Name</label>
                                    <select class="form-select" id="className" required>
                                        <option value="">Select Class</option>
                                        <option value="Web Design">Web Design</option>
                                        <option value="React.js">React.js</option>
                                        <option value="Python">Python</option>
                                        <option value="Database">Database</option>
                                    </select>
                                </div>

                                <!-- Building -->
                                <div class="mb-3">
                                    <label class="form-label">Building</label>
                                    <select class="form-select" id="building" required>
                                        <option value="">Select Building</option>
                                        <option value="Building A">Building A</option>
                                        <option value="Building B">Building B</option>
                                        <option value="Building C">Building C</option>
                                    </select>
                                </div>

                                <!-- Floor & Room -->
                                <div class="mb-3">
                                    <label class="form-label">Floor & Room</label>
                                    <select class="form-select" id="floor" required>
                                        <option value="">Select Room</option>
                                        <option value="Floor-1 (ETEC B101)">Floor-1 (ETEC B101)</option>
                                        <option value="Floor-2 (ETEC B205)">Floor-2 (ETEC B205)</option>
                                        <option value="Floor-3 (ETEC B305)">Floor-3 (ETEC B305)</option>
                                    </select>
                                </div>

                                <!-- Term -->
                                <div class="mb-3">
                                    <label class="form-label">Term</label>
                                    <select class="form-select" id="term" required>
                                        <option value="">Select Term</option>
                                        <option value="Mon & Wed">Mon & Wed</option>
                                        <option value="Tue & Thu">Tue & Thu</option>
                                        <option value="Sat & Sun">Sat & Sun</option>
                                    </select>
                                </div>

                                <!-- Time -->
                                <div class="mb-3">
                                    <label class="form-label">Time</label>
                                    <select class="form-select" id="time" required>
                                        <option value="">Select Time</option>
                                        <option value="08:00 am - 09:15 am">08:00 am - 09:15 am</option>
                                        <option value="09:30 am - 10:45 am">09:30 am - 10:45 am</option>
                                        <option value="11:00 am - 12:15 pm">11:00 am - 12:15 pm</option>
                                        <option value="01:30 pm - 02:45 pm">01:30 pm - 02:45 pm</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    Add Class
                                </button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(".menuButton").click(function(e) {
        // position modal relative to clicked button
        let offset = $(this).offset();
        $('#modalMenu').css({
            top: offset.top + 40 + "px",
            left: offset.left - 100 + "px",
            display: "block"
        });
        $('.opacity').fadeIn(300);
    });

    $(".opacity").click(function() {
        $('#modalMenu').fadeOut(300);
        $('.opacity').fadeOut(300);
    });


    $(document).ready(function() {
        $("#addClassBtn").click(function() {
            $("#addClassModal").modal('show');
        });

        // AJAX Form Submission
        $("#addClassForm").submit(function(e) {
            e.preventDefault(); // Prevent default form submit

            const classData = {
                name: $("#className").val(),
                building: $("#building").val(),
                floor: $("#floor").val(),
                term: $("#term").val(),
                time: $("#time").val()
            };

            $.ajax({
                url: 'add_class.php',
                method: 'POST',
                data: classData,
                success: function(response) {
                    alert('Class added successfully!');
                    $("#addClassModal").modal('hide');
                },
                error: function() {
                    alert('Something went wrong!');
                }
            });
        });

    });
</script>