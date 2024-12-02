<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Admin | Profile</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />
</head>

<body onload="GetUserDetails();">
<!-- load information about loged admin -->
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
                            <!-- check admin log in or not -->
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


            <!-- Menu -->
            <div class="col-4 col-lg-3 mt-5">
                <div class="row bg-primary bg-opacity-10 mt-5">


                    <div class="col-12 mt-4">
                        <form action="AdminDash.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Dashboard</button>
                        </form>

                    </div>
                    <div class="col-12 mt-3">
                        <form action="ProfileAdmin.php">
                            <button class="btn btn-outline-dark col-12 active" type="submit">Profile</button>
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
                            <button class="btn btn-outline-dark col-12" type="submit">Accademic Officer Enrollment</button>
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

            <!-- Profile Editing -->

            <div class="col-8 col-lg-9 mt-5">
                <div class="row">
                    <div class="col-8 col-lg-9 mt-5"></div>
                    <div class="">
                        <label class="fs-2">Profile</label>
                    </div>
                    <div class="">
                        <label class="fs-6 text-secondary">Admin . Profile</label>
                    </div>


                    <div class="col-12">
                        <div class="row">

                        <div class="col-12 col-lg-6 mt-3">
                            <label class="form-label text-black-50">Username</label>
                            <input type="text" class="form-control" id="username" readonly/>
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <label class="form-label text-black-50">Password</label>
                            <input type="text" class="form-control" id="password" />
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <label class="form-label text-black-50">First Name</label>
                            <input type="text" class="form-control" id="fname" />
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <label class="form-label text-black-50">Last Name</label>
                            <input type="text" class="form-control" id="lname" />
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <label class="form-label text-black-50">Mobile</label>
                            <input type="text" class="form-control" id="mobile" />
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <label class="form-label text-black-50">Email</label>
                            <input type="email" class="form-control" id="email" />
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <label class="form-label text-black-50">Address Line 1</label>
                            <input type="text" class="form-control" id="address1" />
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <label class="form-label text-black-50">Address Line 2</label>
                            <input type="text" class="form-control" id="address2" />
                        </div>

                        <div class="col-12 col-lg-6 mt-3">
                            <label class="form-label text-black-50">City</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="city">
                                <option selected value="0">Select</option>
                                
                                <!-- Load City to dropdown -->

                                <?php 
                                    $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
                                    $table = $connection->query("SELECT * FROM `city`");

                                    for ($i=0; $i < $table->num_rows; $i++) { 
                                        # code...
                                        $row = $table->fetch_assoc();

                                        ?>
                                            <option value="<?php echo($row["id"])?>"><?php echo($row["name"])?></option>
                                        <?php
                                    }
                                ?>

                            </select>
                        </div>
                        
                        <div class="form-group col-12 col-lg-6 mt-3">
                            <label for="inputState" class="text-black-50">Gender</label>
                            <select id="gender" class="form-control">
                                <option selected value="0">Choose...</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
<!-- update button to update changes -->
                        <div class="d-grid mt-4 col-3">
                            <button class="btn btn-primary" onclick="UpdateProfile();">Update Profile</button>
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