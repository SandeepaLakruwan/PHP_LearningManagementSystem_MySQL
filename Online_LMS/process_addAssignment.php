<?php  
// start the session and get username and get other details of post request 
session_start();
$username = $_SESSION["u"];
$grade = $_POST["grade"];
$subject = $_POST["subject"];
$id = $_POST["id"];
$name = $_POST["name"];

$year = $_POST["year"];
$from = $_POST["from"];
$to = $_POST["to"];

$connection = new mysqli("localhost","root","Slbh2001@","online_lms");
// create php object
$phpResponseObject = new stdClass();

// validating details user provide process
if($grade=="0"){
    $phpResponseObject->msg = "Select grade";
}else if($subject=="0"){
    $phpResponseObject->msg = "Select subject";
}else if($id==null){
    $phpResponseObject->msg = "Enter id";
}else if($name==null){
    $phpResponseObject->msg = "Enter assignment name";
}else if($from==null){
    $phpResponseObject->msg = "Select Starting Date";
}else if($to==null){
    $phpResponseObject->msg = "Select deathline";
}else{
    $table2 = $connection->query("SELECT * FROM `grade_has_subject` WHERE `grade_id`='".$grade."' AND `subject_id`='".$subject."'");
    $row = $table2->fetch_assoc();
    // check if already enrolled class to add assignment

    if(!$row){
        // when not enrolled class
        $phpResponseObject->msg = "Grade has not given to this subject ";
    }else{
// if enrolled class
            $new_file_location = "Assignments/".$id.".pdf";

            // add assignment 
            $table = $connection->query("INSERT INTO `assignment`(`id`,`name`,`assignment_location`,
            `grade_has_subject_grade_id`,`grade_has_subject_subject_id`,`from`,`to`,`user_username`) 
            VALUES('".$id."','".$name."','".$new_file_location."','".$grade."','".$subject."','".$from."','".$to."','".$username."')");

            // To assign students to the assignment check if class olready done or not
            $table3 = $connection->query("SELECT * FROM `user_has_grade_has_subject` WHERE `grade_has_subject_grade_id`='".$grade."'
            AND `grade_has_subject_subject_id`='".$subject."' AND `complete_status_id`='2'");
// if not complete class
            for ($i=0; $i < $table3->num_rows; $i++) { 
                # code...
                $row3 = $table3->fetch_assoc();
                $newUsername = $row3["user_username"];

                if($row3){
                    // check if assignment already release to the student
                    $table4 = $connection->query("SELECT * FROM `user_has_release_assignment` WHERE `id`='".$newUsername."-".$id."'");
                    $row4 = $table4->fetch_assoc();

                    if(!$row4){
                        // if not released assignment then release assignment
                        $connection->query("INSERT INTO `user_has_release_assignment` VALUES('".$newUsername."-".$id."','".$newUsername."',
                        '".$id."','null','".date("Y-m-d H:i:s")."','0','1')");

                    }
                }
            }
            // file save to the given directory
            $file_location = $_FILES["file"]["tmp_name"];
            move_uploaded_file($file_location, $new_file_location);

            $phpResponseObject->msg = "Succesfully Added Assignment";
    }
}

// send php response to the frontend as json
$jsonResponseText = json_encode($phpResponseObject);
echo ($jsonResponseText);

?>