<?php  
// assignment update process

$id = $_POST["id"];
$name = $_POST["name"];
$from = $_POST["from"];
$to = $_POST["to"];
$grade = $_POST["grade"];
$subject = $_POST["subject"];

$connection = new mysqli("localhost","root","Slbh2001@","online_lms");

$phpResponseObject = new stdClass();

// validate process
if($id==null){
    $phpResponseObject->msg = "Enter id";
}else if($name==null){
    $phpResponseObject->msg = "Enter assignment name";
}else if($from==null){
    $phpResponseObject->msg = "Select Starting Date";
}else if($to==null){
    $phpResponseObject->msg = "Select deathline";
}else{
    $table2 = $connection->query("SELECT * FROM `assignment` WHERE `id`='".$id."'");
    $row = $table2->fetch_assoc();

    if(!$row){
        $phpResponseObject->msg = "No assignment in given id ";
    }else{

            $new_file_location = "Assignments/".$id.".pdf";

            $table = $connection->query("UPDATE `assignment` SET `name`='".$name."',`assignment_location`='".$new_file_location."',
            `from`='".$from."',`to`='".$to."' WHERE `id`='".$id."'");

            $table3 = $connection->query("SELECT * FROM `user_has_grade_has_subject` WHERE `grade_has_subject_grade_id`='".$grade."'
            AND `grade_has_subject_subject_id`='".$subject."' AND `complete_status_id`='2'");

            for ($i=0; $i < $table3->num_rows; $i++) { 
                # code...
                $row3 = $table3->fetch_assoc();
                $newUsername = $row3["user_username"];

                if($row3){
                    $table4 = $connection->query("SELECT * FROM `user_has_release_assignment` WHERE `id`='".$newUsername."-".$id."'");
                    $row4 = $table4->fetch_assoc();

                    if(!$row4){
                        $connection->query("INSERT INTO `user_has_release_assignment` VALUES('".$newUsername."-".$id."','".$newUsername."',
                        '".$id."','null','".date("Y-m-d H:i:s")."','0','1')");

                    }
                }
            }
            
            $file_location = $_FILES["file"]["tmp_name"];
            move_uploaded_file($file_location, $new_file_location);

            $phpResponseObject->msg = "Succesfully Updated Assignment";
    }
}

$jsonResponseText = json_encode($phpResponseObject);
echo ($jsonResponseText);

?>