<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />

</head>

<body>
<!-- Register process -->
<!-- In here user can send request to create account -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="mt-3 m-2">
                        <img src="system.png" class="icon" />
                        <label class="fs-2">Learning Management System</label>
                    </div>
                    <div class="col-12 mt-3">
                        <h1 class="text-primary text-center rounded-3">Register</h1>
                    </div>

                    <div class="col-2"></div>
                    <div class="col-8 d-block align-items-center bg-primary bg-opacity-10 rounded-3">

                        <div class="col-12 mt-3">
                            <label class="form-label text-black-50">User Type</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="userType">
                                <option selected value="3">Student</option>
                                <option value="2">Teacher</option>
                                <option value="1">Admin</option>
                                <option value="4">Accademic Officer</option>
                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label text-black-50">First Name</label>
                            <input type="text" class="form-control" id="fname" />
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label text-black-50">Last Name</label>
                            <input type="text" class="form-control" id="lname" />
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label text-black-50">Mobile</label>
                            <input type="text" class="form-control" id="mobile" />
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label text-black-50">Email</label>
                            <input type="text" class="form-control" id="email" />
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label text-black-50">Address Line 1</label>
                            <input type="text" class="form-control" id="address1" />
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label text-black-50">Address Line 2</label>
                            <input type="text" class="form-control" id="address2" />
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label text-black-50">City</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="city">
                                <option selected value="0">Select</option>

                                <!-- Load City -->

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

                        <div class="form-group col-12 mt-3">
                            <label for="inputState" class="text-black-50">Gender</label>
                            <select class="form-control" id="gender">
                                <option selected value="0">Choose...</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>

                        <div class="col-12 mt-3" id="message">

                        </div>

                        <div class="d-grid mt-2">
                            <button class="btn btn-danger" onclick="SendRequest();">Send Request</button>
                        </div>
                        <div class="d-grid mt-2 mb-3">
                            <!-- send request to create account and it will store in a request table while officer accept it -->
                            <form action="SignIn.php">
                                <button class="btn btn-primary col-12" type="submit"> Already Registered? Sign In</button>
                            </form>
                        </div>


                    </div>


                </div>
            </div>
            <div class="col-12 col-lg-6">
                <img src="signIn.png" class="img1" />
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