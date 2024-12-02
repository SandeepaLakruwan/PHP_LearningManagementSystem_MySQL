<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Student | Dashboard</title>
  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="system.png" />
</head>

<body>
  <!-- Student Dashboard -->
  <div class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-light navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
          <div class="col-4">
            <a href="#" class="navbar-brand text-white"><img src="system.png" class="icon2" />Learning Management System</a>
          </div>


          <!-- Dropdown -->


          <div class="btn-group col-lg-4 col-3">
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
              <button class="btn btn-outline-dark col-12 active" type="submit">Dashboard</button>
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
            <label class="fs-2">Dashboard</label>
          </div>
          <div class="">
            <label class="fs-6 text-secondary">Dashboard</label>
          </div>

          <div class="col-12">
            <div class="row">
              <div class="col-12 col-lg-6 bg-success bg-opacity-25 mt-3">
                <label class="fs-4">Accademic Officer</label>
                <?php
// in here you can see your accademic officer details
                $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
                $table = $connection->query("SELECT * FROM `user_has_grade` WHERE `user_username`='" . $_SESSION["u"] . "'");

                if ($table->num_rows) {
                  $row = $table->fetch_assoc();
                  $grade = $row["grade_id"];

                  $table2 = $connection->query("SELECT * FROM `user_has_grade` INNER JOIN `user` ON 
                  `user_has_grade`.`user_username`=`user`.`username` WHERE `user_has_grade`.`grade_id`='" . $grade . "' 
                  AND `user`.`user_type_id`='4'");


                  if ($table2->num_rows) {
                    for ($i = 0; $i < $table2->num_rows; $i++) {
                      # code...
                      $row2 = $table2->fetch_assoc();
                ?>
                      <div class="row">

                        <div><label class="fs-5 fw-bold"><?php echo ($row2["first_name"] . " " . $row2["last_name"]) ?></label></div>
                        <div><label>Mobile - <?php echo ($row2["mobile"]) ?></label></div>
                        <div><label>Email - <?php echo ($row2["email"]) ?></label></div>
                      </div>
                <?php
                    }
                  }
                }

                ?>
              </div>
              <div class="col-12 col-lg-5 bg-info m-1 bg-opacity-25 mt-3">
                <label class="fs-4">Status</label>
                <?php
                // in here check your status like payments done or not
                $table = $connection->query("SELECT * FROM `user_has_grade` WHERE `user_username`='" . $_SESSION["u"] . "'");
// get student enrolled grade
                if ($table->num_rows) {
                  $row = $table->fetch_assoc();
                  $grade = $row["grade_id"];
                  $expire = $row["expire_date"];

                  $table3 = $connection->query("SELECT * FROM `payment` WHERE `user_has_grade_user_username`='" . $_SESSION["u"] . "' 
                  AND `user_has_grade_grade_id`='" . $grade . "'");
// check database payment table to if payment was done or not
                  if ($table3->num_rows) {
                    // if payment already done
                    for ($i = 0; $i < $table3->num_rows; $i++) {
                      # code...
                      $row3 = $table3->fetch_assoc();


                ?>
                      <div class="row">

                        <div><label class="btn btn-success fs-6 mt-2 mb-3">Active</label></div>
                      </div>
                    <?php
                    }
                  } else {
                    if ($expire > date("Y-m-d")) {
                      // if you are in a free one month trail period sho this. 
                      // If you are expired can't come to the dashboard and sign in process you will automatically redirect to the payment page

                    ?>
                      <div class="row">
                        <div>
                          <label class="text-danger">Your free 1 month trail expires on <?php echo ($expire) ?></label>
                        </div>

                        <?php


                        ?>
                        <!-- add payment button PayHere sandbox used -->
                        <form action="https://sandbox.payhere.lk/pay/o7c2f0f0d">

                          <div id="payhere-form" data-pay-id="o7c2f0f0d" data-type="SANDBOX">
                            <button id="payhere-button" class="btn btn-primary mb-3" type="submit">Add Payment</button>
                          </div>

                        </form>

                      </div>
                    <?php
                    } else {
                    ?>
                      <div class="row">

                        <div><label class="btn btn-danger fs-6">Expired</label></div>
                      </div>
                <?php
                    }
                  }
                }

                ?>
              </div>
<!-- show subject completion status in this table -->
              <div class="col-12 mt-3">
                <label class="fs-3 text-success">Subject Complete Status</label>
              </div>

              <div class="mt-3">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Grade</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Status</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $table = $connection->query("SELECT * FROM `user_has_grade` WHERE `user_username`='" . $_SESSION["u"] . "'");
// get grade
                    if ($table->num_rows) {
                      $row = $table->fetch_assoc();
                      $grade = $row["grade_id"];

                      $table4 = $connection->query("SELECT * FROM `user_has_grade_has_subject` WHERE `user_username`='" . $_SESSION["u"] . "' 
                    AND `grade_has_subject_grade_id`='" . $grade . "'");
// get subject status
                      if ($table4->num_rows) {
                        for ($i = 0; $i < $table4->num_rows; $i++) {
                          # code...
                          $row4 = $table4->fetch_assoc();
                          $subjectId = $row4["grade_has_subject_subject_id"];
                          $gradeId = $row4["grade_has_subject_grade_id"];

                          $table5 = $connection->query("SELECT * FROM `subject` WHERE `id`='" . $subjectId . "'");
                          $row5 = $table5->fetch_assoc();
                          $subject = $row5["name"];

                          $table6 = $connection->query("SELECT * FROM `grade` WHERE `id`='" . $gradeId . "'");
                          $row6 = $table6->fetch_assoc();
                          $grade = $row6["name"];
                    ?>
                          <tr>
                            <th scope="row"><?php echo ($i + 1) ?></th>
                            <td><?php echo ($grade) ?></td>
                            <td><?php echo ($subject) ?></td>
                            <?php
                            // check complete status
                            if ($row4["complete_status_id"] == "1") {
                              //complete
                            ?>
                              <td><label class="btn btn-success">Completed</label></td>
                            <?php
                            } else if ($row4["complete_status_id"] == "2") {
                              // pending
                            ?>
                              <td><label class="btn btn-warning">Pending</label></td>
                            <?php
                            }
                            ?>

                          </tr>

                    <?php

                        }
                      }
                    }

                    ?>

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

  <script src="https://sandbox.payhere.lk/payhere.pay.button.js" id="payhere-button"></script>
  <script src="bootstrap.bundle.js"></script>
  <script src="script.js"></script>
</body>

</html>