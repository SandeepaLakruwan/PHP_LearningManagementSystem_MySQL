<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Teacher | Dashboard</title>
  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="system.png" />
</head>

<body>
  <!-- Teacher dashboard -->
  <div class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-light navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
          <div class="col-4">
            <a href="#" class="navbar-brand text-white"><img src="system.png" class="icon2" />Learning Management System</a>
          </div>


          <!-- Dropdown -->


          <div class="btn-group col-lg-4">
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


      <!-- Menu -->
      <div class="col-4 col-lg-3 mt-5">
        <div class="row bg-primary bg-opacity-10 mt-5">


          <div class="col-12 mt-4">
            <form action="TeacherDash.php">
              <button class="btn btn-outline-dark col-12 active" type="submit">Dashboard</button>
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
              <button class="btn btn-outline-dark col-12" type="submit">Assignments</button>
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
            <label class="fs-2">Dashboard</label>
          </div>
          <div class="">
            <label class="fs-6 text-secondary">Dashboard</label>
          </div>

          <div class="col-12">
            <div class="row">
              <div class="col-12">
                <label class="fs-4 text-success">Active Classes</label>
              </div>
<!-- create cards which classes are enroll in teacher -->
              <?php
              $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");

              $table = $connection->query("SELECT * FROM `user_has_grade_has_subject` WHERE `user_username`='" . $_SESSION["u"] . "' AND `complete_status_id`='3'");
// search teacher classes
              if ($table->num_rows) {
                for ($i = 0; $i < $table->num_rows; $i++) {
                  # code...

                  $row = $table->fetch_assoc();

                  $table2 = $connection->query("SELECT * FROM `subject` WHERE `id`='" . $row["grade_has_subject_subject_id"] . "'");
                  $row2 = $table2->fetch_assoc();
                  $subject = $row2["name"];

                  $table3 = $connection->query("SELECT * FROM `grade` WHERE `id`='" . $row["grade_has_subject_grade_id"] . "'");
                  $row3 = $table3->fetch_assoc();
                  $grade = $row3["name"];

              ?>
              <!-- cards content -->
                  <div class="col-sm-6 mt-3">
                    <div class="card">
                      <div class="card-body bg-opacity-25 bg-primary">
                        <div class="bg-primary bg-opacity-50 p-1">
                          <h5 class="card-title">Class</h5>
                        </div>

                        <p class="card-text fs-5">Grade - <?php echo ($grade) ?></p>
                        <p class="card-text fs-5">Subject - <?php echo ($subject) ?></p>
                        <a href="AddAssignment.php" class="btn btn-primary">Assignments</a>
                        <a href="NoteAdd.php" class="btn btn-primary">Lesson Notes</a>

                      </div>
                    </div>
                  </div>
              <?php
                }
              }
              ?>

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