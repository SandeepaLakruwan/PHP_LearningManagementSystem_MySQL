<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Results</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />
</head>

<body>
    <!-- Result View page -->
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-light navbar-expand-lg bg-dark fixed-top">
                <div class="container-fluid">
                    <div class="col-4">
                        <a href="#" class="navbar-brand text-white"><img src="system.png" class="icon2" />Learning
                            Management System</a>
                    </div>


                    <!-- Dropdown -->


                    <div class="btn-group col-lg-2">
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- check if user log in or not -->
                            <?php session_start(); 
                            if (!isset($_SESSION["u"])) {
                                header("Location: SignIn.php");
                                exit;
                            }
                            ?>
                            <label class="fs-6"><?php echo ($_SESSION["u"]) ?></label>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Dashboard</a>
                            <a class="dropdown-item" href="#">Requests</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Sign Out</a>
                        </div>
                    </div>

                    <!-- End Dropdown -->
                </div>
            </nav>

            <div class="col-12 col-lg-12 mt-5">
                <div class="row">
                    <div class="col-8 col-lg-9 mt-5"></div>
                    <div class="text-center col-12">
                        <label class="fs-2">Result View</label>
                    </div>


                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 col-lg-12 mt-3 mb-4">
                                <label class="form-label text-black">Assignment Id</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="assignmentId" onchange="LoadAssignmentTable();">
                                    <option selected value="0">Select</option>
                                    <?php
// load assignments to the dropdown in the current year
                                    $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
                                    $table = $connection->query("SELECT * FROM `assignment` WHERE 
                                    `from` LIKE '" . date("Y") . "%'");

                                    for ($i = 0; $i < $table->num_rows; $i++) {
                                        # code...
                                        $row = $table->fetch_assoc();

                                        if ($row) {
                                    ?>
                                            <option value="<?php echo ($row["id"]) ?>"><?php echo ($row["id"]) ?> (<?php echo ($row["name"]) ?>)</option>
                                    <?php

                                        }
                                    }

                                    ?>
                                </select>
                            </div>

                            <?php

                            $table2 = $connection->query("SELECT * FROM `user` WHERE `username`='" . $_SESSION["u"] . "'");
// check which user type log in
                            if ($table2->num_rows) {
                                $row2 = $table2->fetch_assoc();
                                if ($row2["user_type_id"] == "2") {
                                ?>
                                    <!-- Teacher View -if user type is teacher -->
                                    <div class="col-12 col-lg-4 mt-3 mb-2">
                                        <label class="form-label text-black">Student Id</label>
                                        <input type="text" class="form-control col-4" id="sid" />
                                    </div>
                                    <div class="col-12 col-lg-4 mt-3 mb-2">
                                        <label class="form-label text-black">Marks</label>
                                        <input type="text" class="form-control col-4" id="marks" />
                                    </div>
                                    <div class="col-12 col-lg-4 mt-3 mb-2">
                                        <label class="form-label text-black"></label>
                                        <!-- can add marks to the student for selected assignment -->
                                        <button class="btn btn-info col-12 mt-2" onclick="AddMarks();">Add Marks</button>
                                    </div>
                                    <div id="message" class="col-12 text-center"></div>
                                <?php
                                } else if ($row2["user_type_id"] == "4") {
                                ?>
                                    <!-- Accademic officer view - if user type is officer-->
                                    <div class="col-12 col-lg-12 mt-3 mb-2 text-center">
                                        <label class="form-label text-black"></label>
                                        <!-- can release marks to the students after all student marks were added -->
                                        <button class="btn btn-warning col-4" onclick="ReleaseMarks();">Release Marks</button>
                                    </div>
                                    <div id="message" class="col-12 text-center"></div>
                                <?php
                                }
                            }
                            ?>



                        </div>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Student Id</th>
                                    <th scope="col">Submitted Time</th>
                                    <th scope="col">Answers</th>
                                    <th scope="col">Marks</th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody id="container">
                                <!-- load selected assignment answers that student provide when assignment select -->
                            </tbody>
                        </table>
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