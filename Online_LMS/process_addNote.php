<?php  
// Note add process
$grade = $_POST["grade"];
$subject = $_POST["subject"];
$id = $_POST["id"];
$title = $_POST["title"];

$connection = new mysqli("localhost","root","Slbh2001@","online_lms");
// create php object
$phpResponseObject = new stdClass();

// validating process
if($grade=="0"){
    $phpResponseObject->msg = "Select grade";
}else if($subject=="0"){
    $phpResponseObject->msg = "Select subject";
}else if($id==null){
    $phpResponseObject->msg = "Enter id";
}else if($title==null){
    $phpResponseObject->msg = "Enter Note name";
}else{
    $table2 = $connection->query("SELECT * FROM `grade_has_subject` WHERE `grade_id`='".$grade."' AND `subject_id`='".$subject."'");
    $row = $table2->fetch_assoc();
// check class has or not
    if(!$row){
        // if no class
        $phpResponseObject->msg = "Grade has not enroll to this subject ";
    }else{
        // if class has

            $new_file_location = "Notes/".$id.".pdf";
// insert note
            $table = $connection->query("INSERT INTO `notes` VALUES('".$id."','".$title."','".$new_file_location."','".$grade."','".$subject."')");
// save file to the given location
            $file_location = $_FILES["file"]["tmp_name"];
            move_uploaded_file($file_location, $new_file_location);

            $phpResponseObject->msg = "Succesfully Added Note";
    }
}

$jsonResponseText = json_encode($phpResponseObject);
echo ($jsonResponseText);

?>