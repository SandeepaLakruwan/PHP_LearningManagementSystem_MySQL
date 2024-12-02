<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Home</title>
  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" href="system.png" />
</head>

<body>
  <!-- Home view (first opening page) -->
  <div class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-light navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
          <div class="col-4">
            <a href="#" class="navbar-brand text-white"><img src="system.png" class="icon2" />Learning
              Management System</a>
          </div>

          <!-- Check if user was log or not. If user already log he can see dropdown else no user sign in and register button will see. -->
          <?php session_start();
          if (!isset($_SESSION["u"])) {
          ?>
            <div class="btn-group col-lg-3 col-3 text-center">
              <div class="row">
                <div class="col-6">
                  <form action="SignIn.php">
                    <button class="fs-5 text-black btn btn-primary col-12">Sign In</button>
                  </form>
                </div>
                <div class="col-6">
                  <form action="Register.php">
                    <button class="fs-5 text-black btn btn-danger col-12">Register</button>
                  </form>
                </div>
              </div>
            </div>
          <?php
          } else {
          ?>
            <div class="btn-group col-lg-4 col-3">
              <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <label class="fs-6"><?php echo ($_SESSION["u"]) ?></label>
              </button>
              <!-- Check dropdown list links to suitable user types -->
              <div class="dropdown-menu">
                <?php 
                  $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
                  $table = $connection->query("SELECT * FROM `user` WHERE `username`='".$_SESSION["u"]."'");

                  if($table->num_rows){
                    $row = $table->fetch_assoc();
                    $userType = $row["user_type_id"];

                    if($userType=="1"){
                      //admin
                      ?>
                        <a class="dropdown-item" href="ProfileAdmin.php">Profile</a>
                        <a class="dropdown-item" href="AdminDash.php">Dashboard</a>
                      <?php
                    }else if($userType=="2"){
                      //teacher
                      ?>
                      <a class="dropdown-item" href="ProfileTeacher.php">Profile</a>
                      <a class="dropdown-item" href="TeacherDash.php">Dashboard</a>
                    <?php
                    }else if($userType=="3"){
                      //student
                      ?>
                        <a class="dropdown-item" href="ProfileStu.php">Profile</a>
                        <a class="dropdown-item" href="StudentDash.php">Dashboard</a>
                      <?php
                    }else if($userType=="4"){
                      //accademic officer
                      ?>
                        <a class="dropdown-item" href="ProfileAccademic.php">Profile</a>
                        <a class="dropdown-item" href="AccademicDash.php">Dashboard</a>
                      <?php
                    }
                  }
                ?>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="SignOut.php">Sign Out</a>
              </div>
            </div>
          <?php
          }
          ?>

          <!-- Site Content -->
        </div>
      </nav>

      <div class="col-12 mt-5 mb-2"></div>
      <div class="col-lg-12">

      <!-- Carousal -->
        <div class="col-12 mt-5 mb-2"></div>
        <div class="col-12 d-none d-lg-block mb-3 mt-3">
          <div class="row">
            <div id="carouselExampleIndicators" class="offset-2 col-8 carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active text-center">
                  <img src="image3.jpg" class="d-block img3" />

                  <div class="carousel-caption d-none d-md-block poster-caption">
                    <h5 class="poster-title">Welcome to Learning Management System</h5>

                  </div>
                </div>

                <div class="carousel-item text-center">
                  <img src="image1.webp" class="d-block img3" />
                </div>

                <div class="carousel-item text-center">
                  <img src="image2.webp" class="d-block img3" />
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>

      </div>

      <!-- Content with jQuery commands -->
      <div class="col-12 mt-5">
        <div class="row">
          <div class="col-6 bg-success text-center">
            <image src="img4.avif" class="img4" />
          </div>
          <div class="col-6 bg-success text-center">
            <h1 class="text-center mt-5 slide-left">Start your</h1>
            <h1 class="text-center slide-left">Learning With Us</h1>
            <form action="http://localhost/Online_LMS/Register.php">
              <button class="btn btn-outline-warning mb-5 mt-5 button fs-2 slide-left" type="submit">
                Register Here
              </button>
            </form>

          </div>
        </div>
      </div>

      <div class="col-12 mt-5 mb-5" id="test">
        <div class="row">

          <div class="col-12 text-center text-secondary mt-3 mb-3">
            <h1>Services</h1>
          </div>
          <div class="col-4 text-center mt-4 mb-3 slide-bottom">
            <image src="Pictures/register.png" class="image3" />
            <label class="fs-5 text-black-50">Registration</label>
          </div>
          <div class="col-4 text-center mt-4 mb-3 slide-bottom">
            <image src="Pictures/learning.png" class="image3" />
            <label class="fs-5 text-black-50">Learning Materials</label>
          </div>
          <div class="col-4 text-center mt-4 mb-3 slide-bottom">
            <image src="Pictures/assignment.png" class="image3" />
            <label class="fs-5 text-black-50">Assignments</label>
          </div>
          <div class="col-4 text-center mt-4 mb-5 slide-bottom">
            <image src="Pictures/check-mark.png" class="image3" />
            <label class="fs-5 text-black-50">Giving Marks</label>
          </div>
          <div class="col-4 text-center mt-4 mb-5 slide-bottom">
            <image src="Pictures/higher-studies.png" class="image3" />
            <label class="fs-5 text-black-50">Upgrade Classes</label>
          </div>
          <div class="col-4 text-center mt-4 mb-5 slide-bottom">
            <image src="Pictures/24-hours-support.png" class="image3" />
            <label class="fs-5 text-black-50">24×7 Support</label>
          </div>

        </div>
      </div>

<!-- Footer -->
      <div class="col-12 bg-dark">
        <div class="row">
          <div class="text-center col-12">
            <img src="system.png" class="icon2" />
            <a href="#" class="navbar-brand text-light">Learning Management System</a>
          </div>

          <div class="col-4 justify-content-center text-center">
            <div class="row">
              <div class="col-1 text-center">
                <form action="https://www.facebook.com/">
                  <button class="bg-dark border-0" type="submit">
                    <img src="facebook.svg" />
                  </button>
                </form>
              </div>
              <div class="col-1 text-center">
                <form action="https://www.whatsapp.com/">
                  <button class="bg-dark border-0" type="submit">
                    <img src="whatsapp.svg" />
                  </button>
                </form>
              </div>
              <div class="col-1 text-center">
                <form action="https://www.linkedin.com/">
                  <button class="bg-dark border-0" type="submit">
                    <img src="linkedin.svg" />
                  </button>
                </form>
              </div>
            </div>
          </div>

          <div class="text-white fs-5 text-start col-12 mt-2 mb-2">
            <span>Contact Us</span>
          </div>
          <div class="text-white-50 fs-6 text-start col-12">
            <div class="row">
              <div class="col-12 mb-2">
                <span>+94314578943/+94704572368</span>
              </div>
              <div class="col-12">
                <span>Learning.lk,</span>
              </div>
              <div class="col-12">
                <span>sandeepalakruwan@gmail.com</span>
              </div>
            </div>
          </div>
          <div class="text-center col-12">
            <p class="text-white-50 mt-3 mb-1">
              Copyright 2023&copy; – Learning.lk. All Rights Reserved.
              Solution by Sandeepa Lakruwan
            </p>
          </div>
          <div class="text-center col-12">
            <a href="#" class="text-info">Terms and conditions</a>
            <label class="text-white-50 fw-bold">|</label>
            <a href="#" class="text-info">Policies</a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="bootstrap.bundle.js"></script>
  <script src="jquery.js"></script>
  <script src="jquery.fadethis.js"></script>
  <script src="script.js"></script>

</body>

</html>