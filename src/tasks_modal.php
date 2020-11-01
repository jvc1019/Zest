<!-- View/Edit Task -->
<div class="modal fade" id="taskdetails<?php echo $row['task_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Task Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="tasks_edit.php?task_ID=<?php echo $row['task_ID']; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="task_Name" value="<?php echo $row['task_Name']; ?>" placeholder="Task name" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="task_Desc" placeholder="Task description (optional)" rows="3"><?php echo $row['task_Desc']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="task_Due" class="form-label">Due date: </label>
                            <input type="date" class="form-control" name="task_Due" value="<?php echo $row['task_Due']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Remind me: </label>
                            <?php
                            // wew bakit iba format ng datetime
                            // 2020-10-31T01:10:00
                            if (!empty($row['task_Reminder'])) {
                                $reminder = str_replace(" ", "", (substr_replace($row['task_Reminder'], "T", 10, 0)));
                            }
                            ?>
                            <input type="datetime-local" class="form-control" name="task_Reminder" value="<?php echo $reminder; ?>">
                        </div>

                        <input type="text" class="form-control" name="task_Tags" value="<?php echo $row['task_Tags']; ?>" placeholder="Tags (separated by a comma)" rows="3">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-secondary btn-sm" data-dismiss="modal">
                    <!-- x icon --> Cancel</button>
                <button type="submit" class="btn text-primary btn-sm">
                    <!-- check icon --> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Task -->
<div class="modal fade" id="taskdelete<?php echo $row['task_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Delete task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['task_Name']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">
                    <!-- x icon --> Cancel</button>
                <a href="tasks_delete.php?task_ID=<?php echo $row['task_ID']; ?>" class="btn btn-sm text-danger">
                    <!-- trash bin icon --> Delete</a>
            </div>
        </div>
    </div>
</div>