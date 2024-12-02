<?php 
// process payment is success 
session_start();
$sid = $_SESSION["u"];

$connection = new mysqli("localhost","root","Slbh2001@","online_lms");

// get user grade
$table = $connection->query("SELECT * FROM `user_has_grade` WHERE `user_username`='".$sid."'");

if($table->num_rows){
    $row = $table->fetch_assoc();
    $grade = $row["grade_id"];

    // insert payment details to database
    $table2 = $connection->query("INSERT INTO `payment`(`user_has_grade_user_username`,`user_has_grade_grade_id`,`date_time`) 
            VALUES('".$sid."','".$grade."','".date("Y-m-d H:i:s")."')");

    if($table2){
        // if success redirected to the dashboard
        header('Location: http://localhost/Online_LMS/StudentDash.php');
    }else{
        echo("Payment Error");
    }
}
    
// echo(date("Y-m-d H:i:s"));
?>