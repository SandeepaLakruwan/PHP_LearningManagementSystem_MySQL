<?php 
// Enable user process
    $username = $_POST["username"];

    $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
    $table = $connection->query("UPDATE `user` SET `status_id`='1' WHERE `username`='".$username."'");

    echo("Activated User Succesfully");

?>