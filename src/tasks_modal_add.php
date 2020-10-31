<!-- Add Task -->
<div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add new Task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="tasks_add.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="task_Name" placeholder="Task name" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="task_Desc" placeholder="Task description (optional)" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="task_Due" class="form-label">Due date: </label>
                            <input type="date" class="form-control" name="task_Due">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Remind me: </label>
                            <input type="datetime-local" class="form-control" name="task_Reminder">
                        </div>

                        <input type=" text" class="form-control" name="task_Tags" placeholder="Tags (separated by a comma)">

                        <!-- Hidden input for storing the user_ID -->
                        <input type="text" name="user_ID" value=<?php echo $user_ID; ?> hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal"><span class="oi oi-x"></span> Cancel</button>
                <button type="submit" class="btn btn-sm text-primary"><span class="oi oi-check"></span> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>