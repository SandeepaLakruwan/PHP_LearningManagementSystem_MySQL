<?php 
// process send request to create account

    $userType = $_POST["userType"] ;
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    $mobile = $_POST["mobile"];
    // mobile regex pattern
    $mobilePattern = "/^07[01245678]{1}[0-9]{7}$/";

    $email = $_POST["email"];
    // email regex pattern
    $emailPattern = '/^[^@\s]++@[^@\s.]++\.[^@\s]++$/';

    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $city = $_POST["city"];

    $gender = $_POST["gender"];

    $connection = new mysqli("localhost","root","Slbh2001@","online_lms");

    // validate process
    if($fname==null){
        ?>
            <label class="text-danger">Enter First Name</label>
        <?php
        
    }else if($lname==null){
        ?>
            <label class="text-danger">Enter Last Name</label>
        <?php

    }else if($mobile==null){
        ?>
            <label class="text-danger">Enter Mobile</label>
        <?php

    }else if(!preg_match($mobilePattern,$mobile)){
        ?>
            <label class="text-danger">Invalid Mobile</label>
        <?php

    }else if($email==null){
        ?>
            <label class="text-danger">Enter Email</label>
        <?php

    }else if(!preg_match($emailPattern,$email)){
        ?>
            <label class="text-danger">Invalid Email</label>
        <?php

    }else if($address1==null){
        ?>
            <label class="text-danger">Enter Address 1</label>
        <?php

    }else if($address2==null){
        ?>
            <label class="text-danger">Enter Address 2</label>
        <?php

    }else if($city=="0"){
        ?>
            <label class="text-danger">Select City</label>
        <?php

    }else if($gender=="0"){
        ?>
            <label class="text-danger">Select Gender</label>
        <?php

    }else{
        // check email already use or not
        $table2 = $connection->query("SELECT * FROM `user` WHERE `email`='".$email."'");
        $table3 = $connection->query("SELECT * FROM `request` WHERE `email`='".$email."'");
        
        $row = $table2->fetch_assoc();
        $row2 = $table3->fetch_assoc();
        if($table2->num_rows || $table3->num_rows){
            // if email already used
            ?>
                <label class="text-danger">Email Already Used</label>
            <?php
            
        }else{
        
            // add data to the database
        $table = $connection->query("INSERT INTO `request`(`first_name`,`last_name`,`mobile`,`email`,
        `address_1`,`address_2`,`city_id`,`user_type_id`,`gender_id`) 
        VALUES('".$fname."','".$lname."','".$mobile."','".$email."','".$address1."','".$address2."','".$city."','".$userType."','".$gender."')");

        $phpResponseObject = new stdClass();
        $phpResponseObject->msg = "success";
        
        $jsonResponseText = json_encode($phpResponseObject);
        echo ($jsonResponseText);
        }
    }
    

?>
