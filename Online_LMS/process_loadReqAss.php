<?php 
// load request assignment
    session_start();
    $username = $_SESSION["u"];

    $assId = $_POST["assId"];

    $phpResponseObject = new stdClass();


            $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
            $table = $connection->query("SELECT * FROM `assignment` WHERE `id`='".$assId."' AND `user_username`='".$username."'");

                $row = $table->fetch_assoc();

                if($row){

                    $phpResponseObject->grade = $row["grade_has_subject_grade_id"];
                    $phpResponseObject->subject = $row["grade_has_subject_subject_id"];
                    $phpResponseObject->name = $row["name"];
                    $phpResponseObject->from = $row["from"];
                    $phpResponseObject->to = $row["to"];
                    $phpResponseObject->msg = "success";
                    
                }else{
                    $phpResponseObject->grade = "0";
                    $phpResponseObject->subject = "0";
                    $phpResponseObject->name = "";
                    $phpResponseObject->from = date("Y-m-d");
                    $phpResponseObject->to = "";
                }

    $jsonResponseText = json_encode($phpResponseObject);
    echo ($jsonResponseText);
?>