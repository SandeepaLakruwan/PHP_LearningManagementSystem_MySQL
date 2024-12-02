<?php
// process verification user

session_start();

$code = $_POST["code"];

if ($code == null) {
?>
    <label class="text-danger">Enter Verify Code</label>
    <?php
} else {

    $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
// check generated code
    $table = $connection->query("SELECT * FROM `generated_code` WHERE `user_username`='" . $_SESSION["u"] . "'");

    if ($table->num_rows) {

        $row = $table->fetch_assoc();
        if ($row["code"] == $code) {
            $phpResponseObject = new stdClass();
            $phpResponseObject->msg = "Success";

            $table2 = $connection->query("SELECT * FROM `user` WHERE `username`='" . $_SESSION["u"] . "'");
            // check user type to navigate
            if ($table2->num_rows) {
                $row2 = $table2->fetch_assoc();
                $userType = $row2["user_type_id"];

                if ($userType == "1") {
                    $phpResponseObject->type = "Admin";
                } else if ($userType == "2") {
                    $phpResponseObject->type = "Teacher";
                } else if ($userType == "3") {
                    $phpResponseObject->type = "Student";
                } else if ($userType == "4") {
                    $phpResponseObject->type = "Accademic";
                }
            }

            // delete generated code after first attempt
            $connection->query("DELETE FROM `generated_code` WHERE `user_username`='" . $_SESSION["u"] . "'");
            // set user as verified user
            $connection->query("UPDATE `user` SET `status_id`='1' WHERE `username`='" . $_SESSION["u"] . "'");

            $jsonResponseText = json_encode($phpResponseObject);
            echo ($jsonResponseText);
        } else {
            // if wrong code
    ?>
            <label class="text-danger">Invalid Verify Code</label>
<?php
        }
    }
}
