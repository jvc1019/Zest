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

                        <input type=" text" class="form-control" name="task_Tags" placeholder="Tags (separated by a comma)">

                        <!-- Hidden input for storing the user_ID -->
                        <input type="text" name="user_ID" value=<?php echo $user_ID; ?> hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">
                    <!-- x icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg> 
                    Cancel</button>
                <button type="submit" class="btn btn-sm text-primary">
                    <!-- check/floppy icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                        <path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z"/>
                    </svg>
                    Save</button>
                </form>
            </div>
        </div>
    </div>
</div>