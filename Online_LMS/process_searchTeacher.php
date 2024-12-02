<?php 
// process search teacher

    $tid = $_POST["tid"];

    $phpResponseObject = new stdClass();


            $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
            // search teacher
            $table = $connection->query("SELECT * FROM `user_has_grade_has_subject` WHERE `user_username`='".$tid."' AND `complete_status_id`='3'");

            if($table->num_rows){
            for ($i=0; $i <$table->num_rows ; $i++) { 
                # code...
                $row = $table->fetch_assoc();

                $table2 = $connection->query("SELECT * FROM `subject` WHERE `id`='".$row["grade_has_subject_subject_id"]."'");
                $row2 = $table2->fetch_assoc();
                $subject = $row2["name"];

                $table3 = $connection->query("SELECT * FROM `grade` WHERE `id`='".$row["grade_has_subject_grade_id"]."'");
                $row3 = $table3->fetch_assoc();
                $grade = $row3["name"];
// set details to the table
                ?>
                <tr>
                    <th scope="row"><?php echo($i+1)?></th>
                    <td><?php echo($row["user_username"])?></td>
                    <td><?php echo($grade)?></td>
                    <td><?php echo($subject)?></td>
                                        
                </tr>
                <?php
                
                
            }
        }else{
            ?>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                                        
                </tr>
                <?php
        }
        
                
?>