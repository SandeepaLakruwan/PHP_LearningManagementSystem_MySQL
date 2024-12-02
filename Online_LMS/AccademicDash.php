<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Accademic Officer | Dashboard</title>
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
            <a href="#" class="navbar-brand text-white"><img src="system.png" class="icon2" />Learning Management System</a>
          </div>


          <!-- Accademic Officer Dashboard -->

          <!-- Dropdown -->
          <div class="btn-group col-lg-4">
            <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <!-- Check if user already log or not and user not log user locate to the Sign In page -->
              <?php session_start();
              if (!isset($_SESSION["u"])) {
                header("Location: SignIn.php");
                exit;
              }
              ?>
              <label class="fs-6"><?php echo ($_SESSION["u"]) ?></label>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="ProfileAccademic.php">Profile</a>
              <a class="dropdown-item" href="AccademicDash.php">Dashboard</a>
              <a class="dropdown-item" href="StudentManage.php">Student Manage</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="SignOut.php">Sign Out</a>
            </div>
          </div>


        </div>
      </nav>


      <!-- Menu Bar-->
      <div class="col-4 col-lg-3 mt-5">
        <div class="row bg-primary bg-opacity-10 mt-5">


          <div class="col-12 mt-4">
            <form action="AccademicDash.php">
              <button class="btn btn-outline-dark col-12 active" type="submit">Dashboard</button>
            </form>

          </div>
          <div class="col-12 mt-3">
            <form action="ProfileAccademic.php">
              <button class="btn btn-outline-dark col-12" type="submit">Profile</button>
            </form>

          </div>

          <div class="col-12 mt-3">
            <form action="ResultView.php">
              <button class="btn btn-outline-dark col-12" type="submit">Results Release</button>
            </form>

          </div>

          <div class="col-12 mt-3">
            <form action="StudentManage.php">
              <button class="btn btn-outline-dark col-12" type="submit">Student Manage</button>
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
      <!-- Dashboard Content -->
      <div class="col-8 col-lg-9 mt-5">
        <div class="row">
          <div class="col-8 col-lg-9 mt-5"></div>
          <div class="">
            <label class="fs-2">Dashboard</label>
          </div>
          <div class="">
            <label class="fs-6 text-secondary">Dashboard</label>
          </div>

          <!-- Accademic officer has grade show here -->
          <div class="col-12">
            <div class="row">
              <div class="col-12">
                <label class="fs-4 text-success">Active Grade</label>
              </div>

              <?php
              $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
              // Check grades accademic officer assign.
              $table = $connection->query("SELECT * FROM `user_has_grade` WHERE `user_username`='" . $_SESSION["u"] . "'");

              if ($table->num_rows) {
                for ($i = 0; $i < $table->num_rows; $i++) {
                  # code...

                  $row = $table->fetch_assoc();

                  $table2 = $connection->query("SELECT * FROM `grade` WHERE `id`='" . $row["grade_id"] . "'");
                  $row2 = $table2->fetch_assoc();
                  $grade = $row2["name"];

              ?>
                  <div class="col-sm-6 mt-3">
                    <div class="card">
                      <div class="card-body bg-opacity-25 bg-primary">
                        <div class="bg-primary bg-opacity-50 p-1">
                          <h5 class="card-title">Grade</h5>
                        </div>

                        <p class="card-text fs-5">Grade - <?php echo ($grade) ?></p>

                      </div>
                    </div>
                  </div>
              <?php
                }
              }
              ?>

            </div>
          </div>

          <!-- Load student details who are in officer grade -->
          <div class="mt-3">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Student Id</th>
                  <th scope="col">Mobile</th>
                  <th scope="col">Email</th>

                </tr>
              </thead>
              <tbody>

                <?php
                // Search user grade here
                $table4 = $connection->query("SELECT * FROM `user_has_grade` WHERE `user_username`='" . $_SESSION["u"] . "'");

                if ($table4->num_rows) {
                  $row4 = $table4->fetch_assoc();
                  $grade = $row4["grade_id"];
                  // Search students in officer grade
                  $table = $connection->query("SELECT * FROM `user` INNER JOIN `user_has_grade` ON 
                  `user`.`username`=`user_has_grade`.`user_username` WHERE `user`.`user_type_id`='3' AND `user_has_grade`.`grade_id`='" . $grade . "'");

                  if ($table->num_rows) {
                    // for loop to load table data
                    for ($i = 0; $i < $table->num_rows; $i++) {
                      # code...
                      $row = $table->fetch_assoc();
                ?>
                      <tr>
                        <th scope="row"><?php echo ($i + 1) ?></th>
                        <td><?php echo ($row["username"]) ?></td>
                        <td><?php echo ($row["mobile"]) ?></td>
                        <td><?php echo ($row["email"]) ?></td>


                      </tr>
                <?php
                    }
                    // if no students
                  } else {
                    echo ("No Student");
                  }
                }

                ?>

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