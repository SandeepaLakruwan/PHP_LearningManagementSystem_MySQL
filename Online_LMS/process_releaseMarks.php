<?php  
// process release marks

$aId = $_POST["aId"];

$connection = new mysqli("localhost","root","Slbh2001@","online_lms");
// validate assignment selection
if($aId=="0"){
    ?>
    <label class="fs-6 text-danger">Select Assignment</label>
    <?php
}else{
    // search assignment
    $table2 = $connection->query("SELECT * FROM `user_has_release_assignment` WHERE `assignment_id`='".$aId."'");
    
     
    if($table2->num_rows){
        // create boolean variable to check release status
        $isrelease = true;
    for ($i=0; $i < $table2->num_rows ; $i++) { 
        # code...
        $row = $table2->fetch_assoc();
        // if not all marks marking assigned
        if($row["mark_status_id"]!="3"){
            $isrelease = false;
            break;
        }
    }

    if($isrelease==false){
        // if not marking assigned
        ?>
    <label class="fs-6 text-danger">Can't release because all answers not marked yet</label>
    <?php
    }else{
// update released marks
            $table = $connection->query("UPDATE `user_has_release_assignment` SET `mark_status_id`='4' 
            WHERE `assignment_id`='".$aId."'");

            ?>
    <label class="fs-6 text-success">Succesfully Released Marks</label>
    <?php
    }

}else{
    // if not marks to release
    ?>
    <label class="fs-6 text-danger">No assignment marks to release</label>
    <?php
}
}


?>