<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Student | Assignments</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />
</head>

<body>
    <!-- Student submit assignments page -->
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
                            <button class="btn btn-outline-dark col-12" type="submit">Lesson Notes</button>
                        </form>

                    </div>

                    <div class="col-12 mt-3">
                        <form action="UploadAssignment.php">
                            <button class="btn btn-outline-dark col-12 active" type="submit">Assignments</button>
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
                        <label class="fs-2">Assignments</label>
                    </div>
                    <div class="">
                        <label class="fs-6 text-secondary">Student . Assignments</label>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 mt-3">
                                <label class="fs-5 text-danger">Sheduled Assignment(s)</label>
                            </div>
<!-- in here student can see current ongoing assignment in the card and download assignment document -->
                            <?php 
                                $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
                                $table = $connection->query("SELECT * FROM `assignment` INNER JOIN `user_has_grade_has_subject` ON 
                                `assignment`.`grade_has_subject_grade_id`=`user_has_grade_has_subject`.`grade_has_subject_grade_id` WHERE 
                                `user_has_grade_has_subject`.`user_username`='".$_SESSION["u"]."' AND `from`<= '".date("Y-m-d")."' AND `to`>='".date("Y-m-d")."'");
// search assignment is ongoing using current date
                                for ($i=0; $i < $table->num_rows; $i++) { 
                                    # code...
                                    $row = $table->fetch_assoc();

                                    ?>
                                        <div class="col-sm-6 mt-3">
                                            <div class="card">
                                                <div class="card-body bg-opacity-25 bg-primary">
                                                    <div class="bg-primary bg-opacity-50 p-1">
                                                        <h5 class="card-title">Id - <?php echo($row["id"])?></h5>
                                                    </div>
                                                    
                                                    <p class="card-text">Name - <?php echo($row["name"])?></p>
                                                    <p class="card-text">Time - <?php echo($row["from"])?> - <?php echo($row["to"])?></p>
                                                    <!-- assignment download option -->
                                                    <a href="<?php echo($row["assignment_location"])?>" class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>

                            <div class="col-12 mt-3">
                                <label class="fs-5 text-success">All Assignment(s)</label>
                            </div>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-2 bg-dark bg-opacity-10 text-center pb-2">Id</div>
                                    <div class="col-2 bg-dark bg-opacity-10 text-center pb-2">Assignment Id</div>
                                    <div class="col-2 bg-dark bg-opacity-10 text-center pb-2">Name</div>
                                    <div class="col-2 bg-dark bg-opacity-10 text-center pb-2">Upload</div>
                                    <div class="col-2 bg-dark bg-opacity-10 text-center pb-2">Marks</div>
                                    <div class="col-2 bg-dark bg-opacity-10 text-center pb-2">Status</div>
                                    <div class="dropdown-divider col-12"></div>

                                    <div id="container">
                                        <div class="row">
                                    <?php 
                                        
                                        $table2 = $connection->query("SELECT * FROM `user_has_release_assignment` WHERE 
                                        `user_username`='".$_SESSION["u"]."'");
        // search which assignments are released for you 
                                        for ($i=0; $i < $table2->num_rows; $i++) { 
                                            # code...
                                            $row2 = $table2->fetch_assoc();

                                            $table3 = $connection->query("SELECT * FROM `assignment` WHERE `id`='".$row2["assignment_id"]."'");
                                            $row3 = $table3->fetch_assoc();
        // search in for loop assignment details using id
                                            ?>
                                                <div class="col-2 mb-1"><label id="assid"><?php echo($row2["id"])?></label></div>
                                                <div class="col-2 mb-1"><?php echo($row2["assignment_id"])?></div>
                                                <div class="col-2 mb-1"><?php echo($row3["name"])?></div>
                                                
                                                <?php 

                                                $table4 = $connection->query("SELECT * FROM `assignment` WHERE `id`='".$row2["assignment_id"]."' 
                                                AND `from`<= '".date("Y-m-d")."' AND `to`>='".date("Y-m-d")."'");
// check assignment status 
                                                $row4 = $table4->fetch_assoc();

                                                if($row4){
                                                    // if ongoing assignment displayed
                                                    if($row2["mark_status_id"]=="1"){
                                                        //if not submit assignment
                                                        ?>
                                                        <div class="col-2 mb-1"><input class="submitFile" type="file" id="assAnswer_<?php echo($row2["id"])?>">
                                                        <div data-id="<?php echo($row2["id"])?>" class="submitButton"><button class="btn btn-primary">Submit</button></div></div>

                                                        <div class="col-2 mb-1 text-center"><?php echo($row2["marks"])?></div>

                                                        <div class="col-2 mb-1 text-center text-primary">Pending</div>
                                                        <?php 
                                                    }else if($row2["mark_status_id"]=="2"){
                                                        //if assignment was submitted displayed
                                                        ?>
                                                        <div class="col-2 mb-1"><input class="submitFile" type="file" id="assAnswer_<?php echo($row2["id"])?>">
                                                        <div data-id="<?php echo($row2["id"])?>" class="submitButton"><button class="btn btn-primary">Re Submit</button></div></div>

                                                        <div class="col-2 mb-1 text-center"><?php echo($row2["marks"])?></div>

                                                        <div class="col-2 mb-1 text-center text-primary">Pending</div>
                                                        <?php 
                                                    }else if($row2["mark_status_id"]=="3"){
                                                        //marking assigned

                                                    }else if($row2["mark_status_id"]=="4"){
                                                        //marks released
                                                    }

                                                    
                                                }else{
                                                    //if expire assignment will display
                                                    if($row2["mark_status_id"]=="1"){
                                                        //if not submit assignment display
                                                        ?>
                                                        <div class="col-2 mb-1 text-center"><label class="text-danger">Not Submited</label></div>

                                                        <div class="col-2 mb-1 text-center"><?php echo($row2["marks"])?></div>

                                                        <div class="col-2 mb-1 text-center text-danger">Absent</div>
                                                        <?php 
                                                    }else if($row2["mark_status_id"]=="2"){
                                                        //if submitted assignment displays
                                                        ?>
                                                        <div class="col-2 mb-1 text-center"><label class="text-success">Submitted</label></div>

                                                        <div class="col-2 mb-1 text-center"><?php echo($row2["marks"])?></div>

                                                        <div class="col-2 mb-1 text-center text-primary">Pending</div>
                                                        <?php 
                                                    }else if($row2["mark_status_id"]=="3"){
                                                        //if marking assigned assignment displays
                                                        ?>
                                                        <div class="col-2 mb-1 text-center"><label class="text-secondary">Marking Assigned</label></div>

                                                        <div class="col-2 mb-1 text-center">0</div>

                                                        <div class="col-2 mb-1 text-center text-primary">Pending</div>
                                                        <?php 
                                                        
                                                    }else if($row2["mark_status_id"]=="4"){
                                                        //if marks released assignment displays
                                                        ?>
                                                        <div class="col-2 mb-1 text-center"><label class="text-info fw-bold">Marks Released</label></div>

                                                        <div class="col-2 mb-1 text-center"><?php echo($row2["marks"])?></div>

                                                        <!-- check user marks status pass or not -->
                                                            <?php 
                                                            if($row2["marks"]>="40"){
                                                                ?>
                                                                <div class="col-2 mb-1 text-center text-success"><?php echo("Pass");?></div>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <div class="col-2 mb-1 text-center text-danger"><?php echo("Fail");?></div>
                                                                <?php
                                                            }
                                                            ?>
                                                        
                                                        <?php 
                                                    }

                                                }
                                                ?>

                                                <div class="dropdown-divider col-12"></div>
                                                
                                            <?php
                                        }
                                    ?>
                                    </div>
                                    </div>

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