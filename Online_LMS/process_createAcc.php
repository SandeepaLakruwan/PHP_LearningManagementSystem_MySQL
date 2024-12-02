<?php
// Process create account

// for send email get files
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$requestId = $_POST["requestId"];

$userType = $_POST["userType"];
$username = $_POST["username"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];

$mobile = $_POST["mobile"];
// mobile regex pattern
$mobilePattern = "/^07[01245678]{1}[0-9]{7}$/";

$email = $_POST["email"];
// email regex pattern
$emailPattern = '/^[^@\s]++@[^@\s.]++\.[^@\s]++$/';

$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$city = $_POST["city"];
$password = $_POST["password"];
$gender = $_POST["gender"];

$phpResponseObject = new stdClass();

// validate process
if ($userType == "0") {
    $phpResponseObject->msg = "Select User Type";
} else if ($password == null) {
    $phpResponseObject->msg = "Enter password";
} else if ($fname == null) {
    $phpResponseObject->msg = "Enter first name";
} else if ($lname == null) {
    $phpResponseObject->msg = "Enter last name";
} else if ($mobile == null) {
    $phpResponseObject->msg = "Enter Mobile";
} else if (!preg_match($mobilePattern, $mobile)) {
    $phpResponseObject->msg = "Invalid Mobile";
} else if ($email == null) {
    $phpResponseObject->msg = "Enter email";
} else if (!preg_match($emailPattern, $email)) {
    $phpResponseObject->msg = "Invalid email";
} else if ($address1 == null) {
    $phpResponseObject->msg = "Enter Address 1";
} else if ($address2 == null) {
    $phpResponseObject->msg = "Enter Address 2";
} else if ($city == "0") {
    $phpResponseObject->msg = "Select city";
} else if ($gender == "0") {
    $phpResponseObject->msg = "Select gender";
} else {

    $connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
// insert user to the database
    $table = $connection->query("INSERT INTO `user` VALUES('" . $username . "','" . $fname . "','" . $lname . "',
        '" . $mobile . "','" . $email . "','" . $address1 . "','" . $address2 . "','" . $city . "','" . $password . "',
        '" . $userType . "','2','" . $gender . "')");

    // Get the current date
    $currentDate = new DateTime();

    // Change the month to the next month
    $currentDate->modify('+1 month');

    // Format the date as needed
    $nextMonth = $currentDate->format('Y-m-d');

    // set trail period with grade for temporary
    $connection->query("INSERT INTO `user_has_grade` VALUES('" . $username . "','1','" . $nextMonth . "')");

    if ($table) {
        // if insert process done then
        $connection->query("DELETE FROM `request` WHERE `id`='" . $requestId . "'");

        // auto generate validation key
        function generateVerificationKey($length = 6)
        {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $key = '';

            for ($i = 0; $i < $length; $i++) {
                $key .= $characters[random_int(0, strlen($characters) - 1)];
            }

            return $key;
        }
// set validation key to the variable
        $verificationKey = generateVerificationKey();

        // insert code to the database
        $connection->query("INSERT INTO `generated_code` VALUES('".$verificationKey."','".$username."')");

        $subject = "Verify Your Email Address";
        $msg = "Hi " . $fname . " " . $lname . "! Welcome to the LMS new user! 
        Your username is: " . $username . " . Your Password is: " . $password . " . Your Verification key is: " . $verificationKey . "";

// Email sending process with details
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'email';
        $mail->Password = 'password';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('email', 'e-LMS');
        $mail->addReplyTo('email', 'e-LMS');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $bodyContent = $msg;
        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            // if mail didn't sent
            $phpResponseObject->msg = "Error Occured Create User";
        } else {
            $phpResponseObject->msg = "Successfully created account";
        }
    }

    $jsonResponseText = json_encode($phpResponseObject);
    echo ($jsonResponseText);
}
