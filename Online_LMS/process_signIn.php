<?php
// process sign in

$username = $_POST["username"];

$password = $_POST["password"];

// validate details
if ($username == null) {
?>
    <label class="text-danger">Enter Username</label>
<?php
} else if ($password == null) {
?>
    <label class="text-danger">Enter Password</label>
    <?php
} else {

    $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
    // search user
    $table = $connection->query("SELECT * FROM `user` WHERE `username`='" . $username . "' AND `password`='" . $password . "'");

    if ($table->num_rows == 0) {
        // if user not found

        $table4 = $connection->query("SELECT `email` FROM `request` WHERE `email`='".$username."'");
        // search if account is in request table
        if($table4->num_rows){
            ?>
        <label class="text-danger">Your request is pending...</label>
            <?php
        }else{
            // email not in request table and user table then invalid details
            ?>
        <label class="text-danger">Invalid Username or Password</label>
            <?php
        }
    
    } else {
        // if user found
        $row = $table->fetch_assoc();
        $status = $row["status_id"];
        $user_type = $row["user_type_id"];

        session_start();
        $_SESSION["u"] = $username;

        $phpResponseObject = new stdClass();

        if ($status == "2") {
            // if not verified go to the verification page
            $phpResponseObject->type = "Verify";
            
        } else if ($status == "1") {
// if verified user go to the dashboard

            if ($user_type == 1) {
                $phpResponseObject->type = "Admin";
                
            } else if ($user_type == 2) {
                $phpResponseObject->type = "Teacher";
                
            } else if ($user_type == 3) {
                // if student then search payment details

                $table2 = $connection->query("SELECT * FROM `user_has_grade` WHERE `user_username`='" . $username . "'");

                if ($table2->num_rows) {
                  $row2 = $table2->fetch_assoc();
                  $grade = $row2["grade_id"];
                  $expire = $row2["expire_date"];

                // search payment is done or not
                  $table3 = $connection->query("SELECT * FROM `payment` WHERE `user_has_grade_user_username`='" . $username . "' 
                  AND `user_has_grade_grade_id`='" . $grade . "'");

                  if ($table3->num_rows) {
                    // if payment done
                    $phpResponseObject->type = "Student";
                    
  
                  } else {
                    if ($expire > date("Y-m-d")) {
                        // if payment not done and not expired user
                        $phpResponseObject->type = "Student";
                        
                    } else {
                        // if payment not done and expired user go to the payment page
                        $phpResponseObject->type = "Payment";
                        
                    }
                  }
                }

                
            } else {
                $phpResponseObject->type = "Accademic";
                
            }
        }


        $jsonResponseText = json_encode($phpResponseObject);
        echo ($jsonResponseText);
    }
}


?>