<?php 
// generate note id

$grade = $_POST["grade"];
$subject = $_POST["subject"];
$year = date("Y");

// validate process
if($grade=="0"){
    echo("Select Grade");
}else if($subject=="0"){
    echo("Select Subject");
}else{

$connection = new mysqli("localhost","root","Slbh2001@","online_lms");

// get count of have notes selected  grade and subject
$table1 = $connection->query("SELECT COUNT(`id`) AS `idcount` FROM `notes` WHERE 
`grade_has_subject_grade_id`='".$grade."' AND `grade_has_subject_subject_id`='".$subject."'");

$row = $table1->fetch_assoc();
// set +1 for count
$count = intval($row["idcount"])+1;

// generate id
echo($year."-".$grade."-".$subject."-"."NOTE-".$count);

}

?>