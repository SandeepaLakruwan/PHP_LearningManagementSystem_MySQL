<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Student | Profile</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />
</head>

<body onload="GetUserDetails();LoadGuardian();">
<!-- onload function to load information about user and guardian details -->
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
<!-- check if student log in or not -->
                            <?php session_start(); 
                            if (!isset($_SESSION["u"])) {
                                header("Location: SignIn.php");
                                exit;
                            }
                            ?>
                            <label class="fs-6"><?php echo ($_SESSION["u"]) ?></label>
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
                            <button class="btn btn-outline-dark col-12 active" type="submit">Profile</button>
                        </form>

                    </div>

                    <div class="col-12 mt-3">
                        <form action="NoteView.php">
                            <button class="btn btn-outline-dark col-12" type="submit">Lesson Notes</button>
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
            <!-- change details -->

            <div class="col-8 col-lg-9 mt-5">
                <div class="row">
                    <div class="col-12 mt-5"></div>
                    <div class="">
                        <label class="fs-2">Profile</label>
                    </div>
                    <div class="mb-4">
                        <label class="fs-6 text-secondary">Student . Profile</label>
                    </div>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Student Details</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" onclick="LoadGuardian();">Guardian Details</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-12 col-lg-6 mt-3">
                                    <label class="form-label text-black-50">Username</label>
                                    <input type="text" class="form-control" id="username" readonly />
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

                                        <!-- Load City -->

                                        <?php
                                        $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
                                        $table = $connection->query("SELECT * FROM `city`");

                                        for ($i = 0; $i < $table->num_rows; $i++) {
                                            # code...
                                            $row = $table->fetch_assoc();

                                        ?>
                                            <option value="<?php echo ($row["id"]) ?>"><?php echo ($row["name"]) ?></option>
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

                                <div class="d-grid mt-4 col-3">
                                    <!-- update profile -->
                                    <button class="btn btn-primary" onclick="UpdateProfile();">Update Profile</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">



                                <div class="col-12 col-lg-6 mt-3">
                                    <label class="form-label text-black-50">First Name</label>
                                    <input type="text" class="form-control" id="gfname" />
                                </div>

                                <div class="col-12 col-lg-6 mt-3">
                                    <label class="form-label text-black-50">Last Name</label>
                                    <input type="text" class="form-control" id="glname" />
                                </div>

                                <div class="col-12 col-lg-6 mt-3">
                                    <label class="form-label text-black-50">Mobile</label>
                                    <input type="text" class="form-control" id="gmobile" />
                                </div>

                                <div class="col-12 col-lg-6 mt-3">
                                    <label class="form-label text-black-50">NIC</label>
                                    <input type="text" class="form-control" id="nic" />
                                </div>

                                <div class="d-grid mt-4 col-3 mb-3">
                                    <!-- update guardian -->
                                    <button class="btn btn-primary" onclick="UpdateGuardian();">Update Guardian</button>
                                </div>
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