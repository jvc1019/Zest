<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

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
                            <input type="date" id="task_Due<?php echo $row['task_ID']; ?>" class="form-control" name="task_Due" value="<?php echo $row['task_Due']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Remind me: </label>
                            <?php
                            // 2020-10-31T01:10:00
                            if (!empty($row['task_Reminder'])) {
                                $reminder = str_replace(" ", "", (substr_replace($row['task_Reminder'], "T", 10, 0)));
                            } else {
                                $reminder = null;
                            }
                            ?>
                            <input type="datetime-local" id="task_Reminder<?php echo $row['task_ID']; ?>" class="form-control" name="task_Reminder" value="<?php echo $reminder; ?>">
                            <small id="date_warning<?php echo $row['task_ID']; ?>" class="text-white">WARNING: Setting a reminder time later than the due date.</small>
                        </div>

                        <script>
                            $("#task_Reminder<?php echo $row['task_ID']; ?>").change(function(e) {
                                var due = new Date($("#task_Due<?php echo $row['task_ID']; ?>").val());
                                var reminder = new Date(($("#task_Reminder<?php echo $row['task_ID']; ?>").val()).substr(0, 10));

                                if (reminder > due) {
                                    $("#date_warning<?php echo $row['task_ID']; ?>").attr("class", "text-danger");
                                } else {
                                    $("#date_warning<?php echo $row['task_ID']; ?>").attr("class", "text-white");
                                }
                            });
                        </script>

                        <input type="text" class="form-control" name="task_Tags" value="<?php echo $row['task_Tags']; ?>" placeholder="Tags (separated by a comma)" rows="3">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-secondary btn-sm" data-dismiss="modal">
                    <!-- x icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                    Cancel</button>
                <button type="submit" class="btn text-primary btn-sm">
                    <!-- check icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                    </svg>
                    Update</button>
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
                    <!-- x icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                    Cancel</button>
                <a href="tasks_delete.php?task_ID=<?php echo $row['task_ID']; ?>" class="btn btn-sm text-danger">
                    <!-- trash bin icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                    Delete</a>
            </div>
        </div>
    </div>
</div>