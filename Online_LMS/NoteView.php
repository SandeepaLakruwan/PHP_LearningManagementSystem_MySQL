<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Student | Lesson Notes</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />
</head>

<body>
    <!-- View lesson notes by student -->
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-light navbar-expand-lg bg-dark fixed-top">
                <div class="container-fluid">
                    <div class="col-4">
                        <a href="#" class="navbar-brand text-white"><img src="system.png" class="icon2" />Learning
                            Management System</a>
                    </div>


                    <!-- Dropdown -->


                    <div class="btn-group col-lg-4">
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
<!-- check if user log in or not -->
                            <?php session_start();
                            if (!isset($_SESSION["u"])) {
                                header("Location: SignIn.php");
                                exit;
                            }
                            ?>
                            <label class="fs-6"><?php echo($_SESSION["u"])?></label>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="ProfileStu.php">Profile</a>
                            <a class="dropdown-item" href="StudentDash.php">Dashboard</a>
                            <a class="dropdown-item" href="UploadAssignment.php">Assignments</a>
                            <a class="dropdown-item" href="NoteView.php">Lesson Notes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="SignOut.php">Sign Out</a>
                        </div>
                    </div>

                    <!-- End Dropdown -->
                </div>
            </nav>


            <!-- Menu -->
            <div class="col-4 col-lg-3 mt-5">
                <div class="row bg-primary bg-opacity-10 mt-5">


                    <div class="col-12 mt-4">
                        <form action="StudentDash.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Dashboard</button>
                        </form>

                    </div>
                    <div class="col-12 mt-3">
                        <form action="ProfileStu.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Profile</button>
                        </form>

                    </div>

                    <div class="col-12 mt-3">
                        <form action="NoteView.php">
                            <button class="btn btn-outline-dark col-12 active" type="submit">Lesson Notes</button>
                        </form>

                    </div>

                    <div class="col-12 mt-3">
                        <form action="UploadAssignment.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Assignments</button>
                        </form>

                    </div>

                    <div class="col-12 mt-5 mb-2">
                        <form action="SignOut.php">
                            <button class="btn btn-outline-success col-12" type="submit">Sign Out</button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Menu end -->

            <div class="col-8 col-lg-9 mt-5">
                <div class="row">
                    <div class="col-8 col-lg-9 mt-5"></div>
                    <div class="">
                        <label class="fs-2">Lesson Notes</label>
                    </div>
                    <div class="">
                        <label class="fs-6 text-secondary">Student . Lesson Notes</label>
                    </div>

                    <div class="col-12">
                        <div class="row">
<!-- In here you can select subject and you can see your grade notes for selected subject -->
                            <div class="col-12 col-lg-12 mt-3">
                                <label class="form-label text-black">Subject</label>
                                <!-- subject load for the dropdown -->
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="subject" onchange="LoadNotes();">
                                    <option selected value="0">Select</option>
                                    <?php 
                                    
                                    $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
                                    $table2 = $connection->query("SELECT * FROM `subject` INNER JOIN `user_has_grade_has_subject` ON 
                                    `subject`.`id`=`user_has_grade_has_subject`.`grade_has_subject_subject_id` WHERE 
                                    `user_has_grade_has_subject`.`user_username`='".$_SESSION["u"]."'");

                                    $subjectid = array();
// using array to stop duplicate subject list
                                    for ($i=0; $i < $table2->num_rows; $i++) { 
                                        # code...
                                        $row2 = $table2->fetch_assoc();

                                        if(!in_array( $row2["id"], $subjectid)){
                                        ?>
                                            <option value="<?php echo($row2["id"])?>"><?php echo($row2["name"])?></option>
                                        <?php
                                        array_push($subjectid,$row2["id"]);
                                        }
                                    }
                                    
                                    ?>
                                </select>
                            </div>

                            <div id="loadnote" class="mt-3">
<!-- In here you can see card of notes with download option (code for card is in backend)-->
                            </div>
                          </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 text-center text-black-50 mt-4 mb-2">
            <label>Learning.lk | Solution by Sandeepa&copy; 2023</label>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>