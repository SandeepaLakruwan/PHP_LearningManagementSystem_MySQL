<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Teacher | Assignments</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />
</head>

<body>
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
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- Session start and check if user log or not -->
                            <?php session_start();
                            if (!isset($_SESSION["u"])) {
                                header("Location: SignIn.php");
                                exit;
                            }
                            ?>
                            <label class="fs-6"><?php echo ($_SESSION["u"]) ?></label>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="ProfileTeacher.php">Profile</a>
                            <a class="dropdown-item" href="TeacherDash.php">Dashboard</a>
                            <a class="dropdown-item" href="NoteAdd.php">Lesson Notes</a>
                            <a class="dropdown-item" href="AddAssignment.php">Assignments</a>
                            <a class="dropdown-item" href="ResultView.php">Answers</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="SignOut.php">Sign Out</a>
                        </div>
                    </div>

                    <!-- End Dropdown -->
                </div>
            </nav>


            <!-- Menu Bar-->
            <div class="col-4 col-lg-3 mt-5">
                <div class="row bg-primary bg-opacity-10 mt-5">


                    <div class="col-12 mt-4">
                        <form action="TeacherDash.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Dashboard</button>
                        </form>

                    </div>
                    <div class="col-12 mt-3">
                        <form action="ProfileTeacher.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Profile</button>
                        </form>

                    </div>

                    <div class="col-12 mt-3">
                        <form action="NoteAdd.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Lesson Notes</button>
                        </form>

                    </div>

                    <div class="col-12 mt-3 mb-4">
                        <form action="AddAssignment.php">
                            <button class="btn btn-outline-dark col-12 active" type="submit">Assignments</button>
                        </form>

                    </div>
                    <div class="col-12 mt-3 mb-4">
                        <form action="ResultView.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Assignment Marks</button>
                        </form>

                    </div>

                    <div class="col-12 mt-3 mb-3">

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
                        <label class="fs-2">Assignments</label>
                    </div>
                    <div class="">
                        <label class="fs-6 text-secondary">Teacher . Assignments</label>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-4 mt-3">
                                <!-- Grade loading part for dropdown -->
                                <label class="form-label text-black">Grade</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="grade">
                                    <option selected value="0">Select</option>
                                    <?php

                                    $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
                                    $table = $connection->query("SELECT * FROM `grade` INNER JOIN `user_has_grade_has_subject` ON 
                                    `grade`.`id`=`user_has_grade_has_subject`.`grade_has_subject_grade_id` WHERE 
                                    `user_has_grade_has_subject`.`user_username`='" . $_SESSION["u"] . "'");
                                    // Create array to add grade
                                    $gradeid = array();

                                    for ($i = 0; $i < $table->num_rows; $i++) {
                                        # code...
                                        $row = $table->fetch_assoc();
                                        // Check array haven't given grade to stop duplicate
                                        if (!in_array($row["id"], $gradeid)) {
                                    ?>
                                            <option value="<?php echo ($row["id"]) ?>"><?php echo ($row["name"]) ?></option>
                                    <?php
                                            array_push($gradeid, $row["id"]);
                                        }
                                    }

                                    ?>

                                </select>
                            </div>

                            <!-- Subject loading to the dropdown -->
                            <div class="col-12 col-lg-4 mt-3">
                                <label class="form-label text-black">Subject</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="subject">
                                    <option selected value="0">Select</option>
                                    <?php

                                    $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
                                    $table2 = $connection->query("SELECT * FROM `subject` INNER JOIN `user_has_grade_has_subject` ON 
                                    `subject`.`id`=`user_has_grade_has_subject`.`grade_has_subject_subject_id` WHERE 
                                    `user_has_grade_has_subject`.`user_username`='" . $_SESSION["u"] . "'");
                                    // Creating array to store subjects
                                    $subjectid = array();

                                    for ($i = 0; $i < $table2->num_rows; $i++) {
                                        # code...
                                        $row2 = $table2->fetch_assoc();
                                        // Stop duplicating subject while loading
                                        if (!in_array($row2["id"], $subjectid)) {
                                    ?>
                                            <option value="<?php echo ($row2["id"]) ?>"><?php echo ($row2["name"]) ?></option>
                                    <?php
                                            array_push($subjectid, $row2["id"]);
                                        }
                                    }

                                    ?>

                                </select>
                            </div>
                            <!-- Add assignment details here -->
                            <div class="col-6 col-lg-3 mt-3">
                                <label class="form-label text-black">Id</label>
                                <input type="text" class="form-control" id="id" onkeyup="LoadAssignment();" />
                            </div>
                            <div class="col-6 col-lg-1 mt-4">
                                <label class="form-label text-black"></label>
                                <button class="btn btn-info col-12" onclick="GenerateAssId();">...</button>
                            </div>

                            <div class="col-12 col-lg-4 mt-3">
                                <label class="form-label text-black">Name</label>
                                <input type="text" class="form-control" id="name" />
                            </div>

                            <div class="col-lg-4 col-12 mt-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="file">
                            </div>

                            <div class="col-12 col-lg-4 mt-3">
                                <label class="form-label text-black">Year</label>
                                <input type="text" class="form-control" id="year" value="<?php echo (date("Y")) ?>" readonly />
                            </div>

                            <div class="mb-3 col-lg-4 col-12 mt-3">
                                <label for="formFile" class="form-label">From</label>
                                <input class="form-control" type="date" id="from" value="<?php echo (date("Y-m-d")) ?>">
                            </div>

                            <div class="mb-3 col-lg-4 col-12 mt-3">
                                <label for="formFile" class="form-label">To</label>
                                <input class="form-control" type="date" id="to">
                            </div>
                            <!-- Add assignment -->
                            <div class="col-12 col-lg-2 mt-4">
                                <label class="form-label text-black"></label>
                                <button class="btn btn-primary col-12" onclick="AddAssignment();" id="add">Add</button>
                            </div>
                            <!-- Update assignment -->
                            <div class="col-12 col-lg-2 mt-4">
                                <label class="form-label text-black"></label>
                                <button class="btn btn-danger col-12" onclick="UpdateAssignment();">Update</button>
                            </div>

                            <!-- Previous assignment loading here-->
                            <div class="mt-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Assignment Id</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Assignment</th>
                                            <th scope="col">Answers</th>

                                        </tr>
                                    </thead>
                                    <tbody id="container1">

                                        <?php
                                        // show all assignments of loged teacher in current year
                                        $table2 = $connection->query("SELECT * FROM `assignment` WHERE `user_username`='" . $_SESSION["u"] . "' AND `from` LIKE '" . date("Y") . "%'");
// for loop to load table
                                        for ($i = 0; $i < $table2->num_rows; $i++) {
                                            # code...
                                            $row = $table2->fetch_assoc();

                                            $table3 = $connection->query("SELECT * FROM `grade` WHERE `id`='" . $row["grade_has_subject_grade_id"] . "'");
                                            $row3 = $table3->fetch_assoc();
                                            $gradeName = $row3["name"];

                                            $table4 = $connection->query("SELECT * FROM `subject` WHERE `id`='" . $row["grade_has_subject_subject_id"] . "'");
                                            $row4 = $table4->fetch_assoc();
                                            $subjectName = $row4["name"];
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo ($row["id"]) ?></th>
                                                <td><?php echo ($subjectName) ?></td>
                                                <td><?php echo ($gradeName) ?></td>
                                                <td><?php echo ($row["name"]) ?></td>
                                                <td>
                                                    <!-- In this button created in the table to load assignment answers view show in the below table -->
                                                    <div class="answerViewButton" data-id="<?php echo ($row["id"]) ?>"><button class="btn btn-info">View</button></div>
                                                </td>

                                            </tr>
                                        <?php
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Student Id</th>
                                            <th scope="col">Submitted Date</th>
                                            <th scope="col">Answers</th>
                                            <th scope="col">Marks</th>

                                        </tr>
                                    </thead>
                                    <tbody id="container2">
<!-- View students who enroll for the assignment and this table can view answers as well as -->

                                    </tbody>
                                </table>
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