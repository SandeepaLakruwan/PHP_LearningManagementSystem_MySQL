<?php 
// process update profile process

    $username = $_POST["username"] ;
    $password = $_POST["password"] ;
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    $mobile = $_POST["mobile"];
    $mobilePattern = "/^07[01245678]{1}[0-9]{7}$/";

    $email = $_POST["email"];
    $emailPattern = '/^[^@\s]++@[^@\s.]++\.[^@\s]++$/';

    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $city = $_POST["city"];

    $gender = $_POST["gender"];

    $phpResponseObject = new stdClass();

    // validate process
    
    if($username==null){
        $phpResponseObject->msg = "Enter Username";
        
    }else if($password==null){
        $phpResponseObject->msg = "Enter Password";
        
    }else if($fname==null){
        $phpResponseObject->msg = "Enter First Name";
        
    }else if($lname==null){
        $phpResponseObject->msg = "Enter Last Name";

    }else if($mobile==null){
        $phpResponseObject->msg = "Enter Mobile";

    }else if(!preg_match($mobilePattern,$mobile)){
        $phpResponseObject->msg = "Invalid Mobile";

    }else if($email==null){
        $phpResponseObject->msg = "Enter Email";

    }else if(!preg_match($emailPattern,$email)){
        $phpResponseObject->msg = "Invalid Email";

    }else if($address1==null){
        $phpResponseObject->msg = "Enter Address 1";

    }else if($address2==null){
        $phpResponseObject->msg = "Enter Address 2";

    }else if($city=="0"){
        $phpResponseObject->msg = "Select City";

    }else if($gender=="0"){
        $phpResponseObject->msg = "Select Gender";

    }else{
        
        $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
        
        $table = $connection->query("UPDATE `user` SET `first_name`='".$fname."',
        `last_name`='".$lname."',`mobile`='".$mobile."',`email`='".$email."',
        `address_1`='".$address1."',`address_2`='".$address2."',`city_id`='".$city."',
        `password`='".$password."',`gender_id`='".$gender."' WHERE `username`='".$username."'");

        $phpResponseObject->msg = "Successfully Updated";

    }

    $jsonResponseText = json_encode($phpResponseObject);
    echo ($jsonResponseText);

?>