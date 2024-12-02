<?php  
// Marks adding process
$aId = $_POST["aId"];
$sid = $_POST["sid"];
$marks = $_POST["marks"];

$connection = new mysqli("localhost","root","Slbh2001@","online_lms");
// validation process
if($aId=="0"){
    ?>
    <label class="fs-6 text-danger">Select Assignment</label>
    <?php
}else if($sid==null){
    ?>
    <label class="fs-6 text-danger">Enter Student Id</label>
    <?php
}else if($marks==null){
    ?>
    <label class="fs-6 text-danger">Enter Marks</label>
    <?php
}else{
    $table2 = $connection->query("SELECT * FROM `user_has_release_assignment` WHERE `user_username`='".$sid."' 
    AND `assignment_id`='".$aId."'");
    $row = $table2->fetch_assoc();
// check student have selected assignment
    if(!$row){
        // if no assignment
        ?>
    <label class="fs-6 text-danger">Invalid Student Id</label>
    <?php
    }else{
// if assignment have then update marks and update status to marking assigned
            $table = $connection->query("UPDATE `user_has_release_assignment` SET `marks`='".$marks."',`mark_status_id`='3' 
            WHERE `user_username`='".$sid."' AND `assignment_id`='".$aId."'");

            ?>
    <label class="fs-6 text-success">Succesfully Added Marks</label>
    <?php
    }
}


?>