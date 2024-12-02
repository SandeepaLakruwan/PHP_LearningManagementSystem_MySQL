<?php 
// process update guardian

    session_start();
    $gfname = $_POST["gfname"];
    $glname = $_POST["glname"];

    $gmobile = $_POST["gmobile"];
    $mobilePattern = "/^07[01245678]{1}[0-9]{7}$/";
    $nic = $_POST["nic"];

    $phpResponseObject = new stdClass();

    // validate process
    if($gfname==null){
        $phpResponseObject->msg = "Enter First Name";
        
    }else if($glname==null){
        $phpResponseObject->msg = "Enter Last Name";

    }else if($gmobile==null){
        $phpResponseObject->msg = "Enter Mobile";

    }else if(!preg_match($mobilePattern,$gmobile)){
        $phpResponseObject->msg = "Invalid Mobile";

    }else if($nic==null){
        $phpResponseObject->msg = "Enter NIC Number";

    }else{
        
        $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
        
        $table = $connection->query("UPDATE `guardian` SET `first_name`='".$gfname."',
        `last_name`='".$glname."',`mobile`='".$gmobile."',`nic`='".$nic."' WHERE `user_username`='".$_SESSION["u"]."'");

        $phpResponseObject->msg = "Successfully Updated";

    }

    $jsonResponseText = json_encode($phpResponseObject);
    echo ($jsonResponseText);

?>