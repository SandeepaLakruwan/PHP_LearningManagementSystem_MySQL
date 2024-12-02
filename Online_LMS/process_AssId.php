<?php 
// Assignment id generate process
$grade = $_POST["grade"];
$subject = $_POST["subject"];
$year = $_POST["year"];

// validate process
if($grade=="0"){
    echo("Select Grade");
}else if($subject=="0"){
    echo("Select Subject");
}else{

$connection = new mysqli("localhost","root","Slbh2001@","online_lms");

// count assignments that are release for selected grade and subject
$table1 = $connection->query("SELECT COUNT(`id`) AS `idcount` FROM `assignment` WHERE 
`grade_has_subject_grade_id`='".$grade."' AND `grade_has_subject_subject_id`='".$subject."' AND `from` LIKE '".$year."%'");

$row = $table1->fetch_assoc();
// then +1 for count
$count = intval($row["idcount"])+1;

// generate id 
echo($year."-".$grade."-".$subject."-"."AS-".$count);

}

?>