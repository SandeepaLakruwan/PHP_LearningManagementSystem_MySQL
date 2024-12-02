<?php 
// Notes delete process
    $id = $_POST["rowId"];

    $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
    $table = $connection->query("DELETE FROM `notes` WHERE `id`='".$id."'");

    if($table){
        echo("Deleted Succesfully");
    }else{
        echo("Delete Failed");
    }

?>