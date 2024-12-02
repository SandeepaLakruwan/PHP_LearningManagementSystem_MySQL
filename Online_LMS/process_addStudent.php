<?php  
// Student enrollment process
$grade = $_POST["grade"];
$sid = $_POST["sid"];

// Get the current date
$currentDate = new DateTime();

// Change the month to the next month
$currentDate->modify('+1 month');

// Format the date as needed
$nextMonth = $currentDate->format('Y-m-d');

$connection = new mysqli("localhost","root","Slbh2001@","online_lms");

// create php object to store massage
$phpResponseObject = new stdClass();

// validate process
if($grade=="0"){
    $phpResponseObject->msg = "Select grade";
}else if($sid==null){
    $phpResponseObject->msg = "Enter student id";
}else{
// check student already has grade or not
        $table3 = $connection->query("SELECT * FROM `user_has_grade` WHERE `user_username`='".$sid."'");
        $row3 = $table3->fetch_assoc();
        
        if(!$row3){
            // if not enrolled grade insert it
            $connection->query("INSERT INTO `user_has_grade` VALUES('".$sid."','".$grade."','".$nextMonth."')");
        }else{
            // if grade has then update it
            $currentGrade = $row3["grade_id"];
// update current grade
            $connection->query("UPDATE `user_has_grade_has_subject` SET `complete_status_id`='1' WHERE 
            `user_username`='".$sid."' AND `grade_has_subject_grade_id`='".$currentGrade."'");
// set trail period for payments
            $connection->query("UPDATE `user_has_grade` SET `grade_id`='".$grade."',`expire_date`='".$nextMonth."' 
            WHERE `user_username`='".$sid."'");
        }

        // search student has enroll for subjects to the upgrade grade
        $table4 = $connection->query("SELECT * FROM `user_has_grade_has_subject` WHERE `user_username`='".$sid."' 
        AND `grade_has_subject_grade_id`='".$grade."'");

        if(!$table4->num_rows){
            // if no subjects
        $table2 = $connection->query("SELECT * FROM `grade_has_subject` WHERE `grade_id`='".$grade."'");

        if($table2->num_rows){
            for ($i=0; $i <$table2->num_rows ; $i++) { 
                # code...
                $row2 = $table2->fetch_assoc();
                $subject = $row2["subject_id"];
// add student for upgraded class
                $table = $connection->query("INSERT INTO `user_has_grade_has_subject` VALUES('".$sid."','".$grade."','".$subject."','2')");
            }
        }
        }

            

            $phpResponseObject->msg = "Succesfully Upgrated Student";
    }


$jsonResponseText = json_encode($phpResponseObject);
echo ($jsonResponseText);

?>