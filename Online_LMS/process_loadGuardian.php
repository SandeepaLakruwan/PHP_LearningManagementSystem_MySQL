<?php
// load guardian process
$phpResponseObject = new stdClass();
session_start();

$connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");
$table = $connection->query("SELECT * FROM `guardian` WHERE `user_username`='" . $_SESSION["u"] . "'");

$row = $table->fetch_assoc();

$phpResponseObject->gfname = $row["first_name"];
$phpResponseObject->glname = $row["last_name"];
$phpResponseObject->gmobile = $row["mobile"];
$phpResponseObject->nic = $row["nic"];

$jsonResponseText = json_encode($phpResponseObject);
echo ($jsonResponseText);

?>