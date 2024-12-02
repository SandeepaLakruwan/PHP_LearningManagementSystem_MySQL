<?php
// Load answer process
$phpResponseObject = new stdClass();
$id = $_POST["rowId"];

$connection = new mysqli("localhost", "root", "Slbh2001@", "online_lms");

// search student with release assignment
$table = $connection->query("SELECT * FROM `user_has_release_assignment` WHERE `assignment_id`='" . $id . "'");

for ($i=0; $i < $table->num_rows; $i++) { 
    # code...
    $row = $table->fetch_assoc();
    ?>
    <!-- table load process -->
    <tr>
        <th scope="row"><?php echo($row["id"])?></th>
        <td><?php echo($row["user_username"])?></td>
        <td><?php echo($row["date_time"])?></td>
        <?php 
        if($row["answer_location"]=="null"){
            // if assignment not submit
            ?>
                <td><label class="text-danger">Not submitted</label></td>
            <?php
        }else{
            ?>
                <td><a href="<?php echo($row["answer_location"])?>" class="btn btn-success">View</a></td>
            <?php
        }
        ?>
        <td><label><?php echo($row["marks"])?></label></td>

    </tr>
    
    <?php 

}


?>
