<?php 
// process load users
    $userId = $_POST["userId"];
    $status = $_POST["status"];

    $phpResponseObject = new stdClass();


            $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
            // search user instead of not verified user
            $table = $connection->query("SELECT * FROM `user` WHERE `username`='".$userId."' AND `status_id`!='2'");

                $row = $table->fetch_assoc();

                if($row){

                    $phpResponseObject->username = $row["username"];
                    $phpResponseObject->usertype = $row["user_type_id"];
                    $phpResponseObject->fname = $row["first_name"];
                    $phpResponseObject->lname = $row["last_name"];
                    $phpResponseObject->mobile = $row["mobile"];
                    $phpResponseObject->email = $row["email"];
                    $phpResponseObject->address1 = $row["address_1"];
                    $phpResponseObject->address2 = $row["address_2"];
                    $phpResponseObject->city = $row["city_id"];
                    $phpResponseObject->password = $row["password"];
                    $phpResponseObject->gender = $row["gender_id"];

                    if($row["status_id"]=="1"){
                        $phpResponseObject->status = "Active";
                    }else{
                        $phpResponseObject->status = "Disable";
                    }
                }else{
                    $phpResponseObject->username = "";
                    $phpResponseObject->usertype = "0";
                    $phpResponseObject->fname = "";
                    $phpResponseObject->lname = "";
                    $phpResponseObject->mobile = "";
                    $phpResponseObject->email = "";
                    $phpResponseObject->address1 = "";
                    $phpResponseObject->address2 = "";
                    $phpResponseObject->city = "0";
                    $phpResponseObject->password = "";
                    $phpResponseObject->gender = "0";
                    $phpResponseObject->status = "";
                }

    $jsonResponseText = json_encode($phpResponseObject);
    echo ($jsonResponseText);
?>