<div id="task_list">
    <!-- INCOMPLETE TASKS -->
    <ul id="incomplete_tasks" class="list-group">
        <?php
        $query = "SELECT * FROM task LEFT JOIN user ON task.user_ID=user.user_ID WHERE task_isDone=0 AND task.user_ID=$user_ID ORDER BY $sortBy $sortDir";
        $result = $conn->query($query);
        if (!($result->num_rows > 0)) {
        ?>
            <h6 class="text-center">☜(ﾟヮﾟ☜) There's nothing around here. You're all set!</h6>
            <?php
        } else {
            while ($row = $result->fetch_assoc()) {
            ?>
                <li class="list-group-item">
                    <!-- check box | task name and due | edit button | delete button -->
                    <!--     1     |         9        |     1       |      1        -->
                    <div class="row col-12 form-inline">
                        <!-- check box -->
                        <div class="col-sm-1 form-check">
                            <input class="checkbox form-check-input" type="checkbox" value=<?php echo $row['task_ID']; ?>>
                        </div>
                        <!-- task name and due -->
                        <div class="col-sm-9">
                            <h6><?php echo $row['task_Name']; ?></h6>
                            <small>
                                <!-- calendar icon --><?php if (!empty($row['task_Due'])) {
                                                            echo "🗓 " . date("D, d M Y", strtotime($row['task_Due']));
                                                        }; ?>
                                <!-- reminder/bell icon --><?php if (!empty($row['task_Reminder'])) {
                                                                echo " 🔔 " . date("D, d M Y h:i A", strtotime($row['task_Reminder']));
                                                            } ?>
                            </small>

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

    <!-- COMPLETED TASKS -->
    <button id="show_completed_tasks" data-toggle="collapse" data-target="#completed_tasks" class="btn btn-sm text-primary">&#8595; Show completed tasks</button>
    <div id="completed_tasks" class="collapse">
        <ul class="list-group">
            <?php
            $query = "SELECT * FROM task LEFT JOIN user ON task.user_ID=user.user_ID WHERE task_isDone=1 AND task.user_ID=$user_ID ORDER BY $sortBy $sortDir";
            $result = $conn->query($query);
            if (!($result->num_rows > 0)) {
            ?>
                <h6 class="text-center">(┬┬﹏┬┬) No completed tasks yet.</h6>
                <?php
            } else {
                while ($row = $result->fetch_assoc()) {
                ?>
                    <li class="list-group-item">
                        <!-- check box | task name and due | edit button | delete button -->
                        <!--     1     |         9         |     1       |      1        -->
                        <div class="row col-12 form-inline">
                            <!-- check box -->
                            <div class="col-sm-1 form-check">
                                <input class="checkbox form-check-input" type="checkbox" value=<?php echo $row['task_ID']; ?> checked>
                            </div>
                            <!-- task name and due -->
                            <div class="col-sm-9">
                                <h6 style="text-decoration: line-through;"><?php echo $row['task_Name']; ?></h6>
                                <small>
                                    <!-- calendar icon --><?php if (!empty($row['task_Due'])) {
                                                                echo "🗓 " . date("D, d M Y", strtotime($row['task_Due']));
                                                            }; ?>
                                    <!-- reminder/bell icon --><?php if (!empty($row['task_Reminder'])) {
                                                                    echo " 🔔 " . date("D, d M Y h:i A", strtotime($row['task_Reminder']));
                                                                } ?>
                                </small>

                                <script>
                                    reminders["<?php echo $row['task_ID']; ?>"] = "<?php echo $row['task_Reminder']; ?>";
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
</div>