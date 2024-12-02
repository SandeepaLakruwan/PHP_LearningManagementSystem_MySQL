<?php  
// Accademic officer enrollment backend part
// get data from the post request
$grade = $_POST["grade"];
$aid = $_POST["aid"];
// mysql connection create
$connection = new mysqli("localhost","root","Slbh2001@","online_lms");
// create php response object
$phpResponseObject = new stdClass();
// validation part
if($grade=="0"){
    $phpResponseObject->msg = "Select grade";
}else if($aid==null){
    $phpResponseObject->msg = "Enter teacher id";
}else{
// search if user is in the accademic officer type
    $table4 = $connection->query("SELECT * FROM `user` WHERE `username`='".$aid."' 
        AND `user_type_id`='4'");
    
        if(!$table4->num_rows){
            // if not accademic officer with given username
            $phpResponseObject->msg = "Invalid Accademic Officer Id";
        }else{
            // check accademic officer already enroll for grade
        $table3 = $connection->query("SELECT * FROM `user_has_grade` WHERE `user_username`='".$aid."'");
        $row3 = $table3->fetch_assoc();
        if(!$row3){
            // There is no row found insert officer to grade
            $connection->query("INSERT INTO `user_has_grade` VALUES('".$aid."','".$grade."','".date("Y-m-d")."')");
        }else{
            // if already has grade update officer
            $connection->query("UPDATE `user_has_grade` SET `grade_id`='".$grade."',`expire_date`='".date("Y-m-d")."' 
            WHERE `user_username`='".$aid."'");
        }
        
            $phpResponseObject->msg = "Succesfully Added Officer";
    }
    }

// convert php object to the json text and send it
$jsonResponseText = json_encode($phpResponseObject);
echo ($jsonResponseText);

?>