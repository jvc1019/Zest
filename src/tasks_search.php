<div id="search">
    <ul class="list-group">
        <?php
        $query = "SELECT * FROM task LEFT JOIN user ON task.user_ID=user.user_ID $search";
        $result = $conn->query($query);
        if (!($result->num_rows > 0)) {
            echo "<h6>No results found.</h6>";
        } else {
            while ($row = $result->fetch_assoc()) {
        ?>
                <li class="list-group-item">
                    <!-- check box | task name and due | edit button | delete button -->
                    <!--     2     |         8         |     1       |      1        -->
                    <div class="row col-12 form-inline">
                        <!-- check box -->
                        <div class="col-sm-2">
                            <?php
                            if ($row['task_isDone'] == 0) {
                            ?>
                                <input class='checkbox' type='checkbox' value=<?php echo $row['task_ID']; ?>>
                            <?php
                            } else {
                            ?>
                                <input class='checkbox' type='checkbox' value=<?php echo $row['task_ID']; ?> checked>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- task name and due -->
                        <div class="col-sm-8 justify-content-between">
                            <?php
                            if ($row['task_isDone'] == 0) {
                            ?>
                                <h6><?php echo $row['task_Name']; ?></h6>
                            <?php
                            } else {
                            ?>
                                <h6 style='text-decoration: line-through;'><?php echo $row['task_Name']; ?></h6>
                            <?php
                            }
                            ?>
                            <p>
                                <!-- calendar icon --><?php if (!empty($row['task_Due'])) {
                                                            echo $row['task_Due'];
                                                        }; ?>
                                <!-- reminder/bell icon --><?php if (!empty($row['task_Reminder'])) {
                                                                echo " \u{2022} " . $row['task_Reminder'];
                                                            } ?>

                            </p>

                            <script>
                                reminders["<?php echo $row['task_Name']; ?>"] = "<?php echo $row['task_Reminder']; ?>";
                            </script>
                        </div>
                        <!-- edit and delete button -->
                        <div class="col-sm-2">
                            <a href="#taskdetails<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                                <!-- info icon?--> Details</a> <a href="#taskdelete<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                <!-- garbage bin icon--></span> Delete</a>
                        </div>
                    </div>
                    <?php include('tasks_modal.php'); ?>
                </li>
        <?php
            }
        }
        ?>
    </ul>
</div>