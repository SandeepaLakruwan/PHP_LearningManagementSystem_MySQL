<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Accademic Officer Enrollment</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />
</head>
<!-- Onloading page we can see Accademic officers details in this page -->
<body onload="SearchAccademic();">
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-light navbar-expand-lg bg-dark fixed-top">
                <div class="container-fluid">
                    <div class="col-4">
                        <a href="#" class="navbar-brand text-white"><img src="system.png" class="icon2" />Learning
                            Management System</a>
                    </div>

                    <!-- Check user already log or not -->
                    <div class="btn-group col-lg-4">
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php session_start();
                            if (!isset($_SESSION["u"])) {
                                header("Location: SignIn.php");
                                exit;
                            }
                            ?>
                            <label class="fs-6"><?php echo ($_SESSION["u"]) ?></label>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="ProfileAdmin.php">Profile</a>
                            <a class="dropdown-item" href="AdminDash.php">Dashboard</a>
                            <a class="dropdown-item" href="UserManage.php">Requests</a>
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
                        <form action="AdminDash.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Dashboard</button>
                        </form>

                    </div>
                    <div class="col-12 mt-3">
                        <form action="ProfileAdmin.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Profile</button>
                        </form>

                    </div>

                    <div class="col-12 mt-3">
                        <form action="UserManage.php">
                            <button class="btn btn-outline-dark col-12" type="submit">User Manage</button>
                        </form>

                    </div>

                    <div class="col-12 mt-3">
                        <form action="ResultView.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Results</button>
                        </form>

                    </div>

                    <div class="col-12 mt-3">
                        <form action="StudentEnrollment.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Student Enrollment</button>
                        </form>

                    </div>
                    <div class="col-12 mt-3">
                        <form action="TeacherEnrollment.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Teacher Enrollment</button>
                        </form>

                    </div>
                    <div class="col-12 mt-3">
                        <form action="AccademicEnrollment.php">
                            <button class="btn btn-outline-dark col-12 active" type="submit">Accademic Officer Enrollment</button>
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

<!-- Accademic officer enrollment for grade is main purpose in this page -->
            <div class="col-8 col-lg-9 mt-5">
                <div class="row">
                    <div class="col-8 col-lg-9 mt-5"></div>
                    <div class="">
                        <label class="fs-2">Accademic Officer Enrollment</label>
                    </div>
                    <div class="">
                        <label class="fs-6 text-secondary">Admin . Academic Officer Enrollment</label>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 mt-4">
                                <!-- using the table to get the username and select grade for enrollment -->
                                <label class="form-label text-black">Search Accademic Officer</label><br>
                                <input class="col-12" type="search" placeholder="Username" aria-label="Search" id="searchAccademic">
                            </div>

                            <div class="col-12 col-lg-8 mt-3">
                                <label class="form-label text-black">Grade</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="grade">
                                    <option selected value="0">Select</option>

                                    <?php
// Grade loading to the dropdown
                                    $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
                                    $table = $connection->query("SELECT * FROM `grade`");

                                    if ($table->num_rows) {
                                        for ($i = 0; $i < $table->num_rows; $i++) {
                                            $row = $table->fetch_assoc();
                                    ?>
                                            <option value="<?php echo ($row["id"]) ?>"><?php echo ($row["name"]) ?></option>
                                    <?php
                                        }
                                    }

                                    ?>

                                </select>
                            </div>

                            <div class="col-12 col-lg-4 mt-4">
                                <label class="form-label text-black"></label>
                                <!-- Enrollment button with onclick function -->
                                <button class="btn btn-outline-primary col-12" onclick="AccademicEnrollment();">Add</button>
                            </div>

                            <div class="mt-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Officer Id</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Grade</th>

                                        </tr>
                                    </thead>
                                    <tbody id="container">
<!-- Table loaded here in backend using the given id container -->

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