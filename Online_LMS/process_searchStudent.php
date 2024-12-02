<?php 
// process search student assignment details
    $sid = $_POST["sid"];

    $phpResponseObject = new stdClass();


            $connection = new mysqli("localhost","root","Slbh2001@","online_lms");
            $table = $connection->query("SELECT * FROM `user_has_release_assignment` INNER JOIN `assignment` ON 
            `user_has_release_assignment`.`assignment_id`=`assignment`.`id` WHERE `user_has_release_assignment`.`user_username`='".$sid."'");

            if($table->num_rows){
            for ($i=0; $i <$table->num_rows ; $i++) { 
                # code...
                $row = $table->fetch_assoc();

                $table3 = $connection->query("SELECT * FROM `grade` WHERE `id`='".$row["grade_has_subject_grade_id"]."'");
                $row3 = $table3->fetch_assoc();
                $grade = $row3["name"];

                ?>
                <!-- set details to the table -->
                <tr>
                    <th scope="row"><?php echo($i+1)?></th>
                    <td><?php echo($row["assignment_id"])?></td>
                    <td><?php echo($grade)?></td>
                    <td><?php echo($row["marks"])?></td>
                    <?php 
                        if($row["marks"]>=40){
                            // pass status
                            ?>
                            <td><label class="text-primary">Pass</label></td>
                            <?php
                        }else{
                            ?>
                            <td><label class="text-danger">Fail</label></td>
                            <?php
                        }

                        // marking status
                        if($row["mark_status_id"]=="4"){
                            ?>
                            <td><label class="text-success">Released</label></td>
                            <?php
                        }else if($row["mark_status_id"]=="3"){
                            ?>
                            <td><label class="text-secondary">Marking</label></td>
                            <?php
                        }else if($row["mark_status_id"]=="2"){
                            ?>
                            <td><label class="text-info">Submitted</label></td>
                            <?php
                        }else if($row["mark_status_id"]=="1"){
                            ?>
                            <td><label class="text-danger">Absent</label></td>
                            <?php
                        }
                    ?>
                                        
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