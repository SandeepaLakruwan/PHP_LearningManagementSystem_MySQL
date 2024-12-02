<?php 
// get user details process

    $phpResponseObject = new stdClass();

    session_start();

            $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
            $table = $connection->query("SELECT * FROM `user` WHERE `username`='".$_SESSION["u"]."'");

                $row = $table->fetch_assoc();

                $user_type = $row["user_type_id"];

                    $phpResponseObject->username = $_SESSION["u"];
                    $phpResponseObject->password = $row["password"];
                    $phpResponseObject->fname = $row["first_name"];
                    $phpResponseObject->lname = $row["last_name"];
                    $phpResponseObject->mobile = $row["mobile"];
                    $phpResponseObject->email = $row["email"];
                    $phpResponseObject->address1 = $row["address_1"];
                    $phpResponseObject->address2 = $row["address_2"];
                    $phpResponseObject->city = $row["city_id"];
                    $phpResponseObject->gender = $row["gender_id"];

    $jsonResponseText = json_encode($phpResponseObject);
    echo ($jsonResponseText);
?>