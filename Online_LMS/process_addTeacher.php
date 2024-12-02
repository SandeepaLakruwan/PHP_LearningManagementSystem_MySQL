<?php  
// Teacher enrollment process
$grade = $_POST["grade"];
$subject = $_POST["subject"];
$tid = $_POST["tid"];

$connection = new mysqli("localhost","root","Slbh2001@","online_lms");

// create php object 
$phpResponseObject = new stdClass();

// validate process
if($grade=="0"){
    $phpResponseObject->msg = "Select grade";
}else if($subject=="0"){
    $phpResponseObject->msg = "Select subject";
}else if($tid==null){
    $phpResponseObject->msg = "Enter teacher id";
}else{
    // check teacher already added or not
    $table2 = $connection->query("SELECT * FROM `user_has_grade_has_subject` WHERE 
    `grade_has_subject_grade_id`='".$grade."' AND `grade_has_subject_subject_id`='".$subject."' AND `user_username`='".$tid."'");
    $row = $table2->fetch_assoc();

    if($row){
        // if already added
        $phpResponseObject->msg = "Teacher already added to this subject. ";
    }else{
// if not added to subject then search teacher has grade or not
        $table3 = $connection->query("SELECT * FROM `grade_has_subject` WHERE `grade_id`='".$grade."' AND `subject_id`='".$subject."'");
        $row3 = $table3->fetch_assoc();
        if(!$row3){
            // if teacher has not enroll for grade
            $connection->query("INSERT INTO `grade_has_subject` VALUES('".$grade."','".$subject."')");
        }
// insert subject to the grade in selected teacher
            $table = $connection->query("INSERT INTO `user_has_grade_has_subject` VALUES('".$tid."','".$grade."','".$subject."','3')");

            $phpResponseObject->msg = "Succesfully Added To Subject";
    }
}

$jsonResponseText = json_encode($phpResponseObject);
echo ($jsonResponseText);

?>