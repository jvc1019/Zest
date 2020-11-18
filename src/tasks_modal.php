<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

<!-- View/Edit Task -->
<div class="modal fade" id="taskdetails<?php echo $row['task_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="Task Details" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Task Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="tasks_edit.php?task_ID=<?php echo $row['task_ID']; ?>&user_ID=<?php echo $user_ID; ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control text-truncate font-weight-bold border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Name" value="<?php echo $row['task_Name']; ?>" placeholder="Task name" required>
                                    <div class="invalid-feedback">
                                        <span class="text-danger">Task name is too long! (max 75 characters)</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Desc" placeholder="No description. Click to add one." rows="8"><?php echo $row['task_Desc']; ?></textarea>
                                    <div class="invalid-feedback">
                                        <span class="text-danger">┗|｀O′|┛ We're not writing novels here!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 task_Date">
                                <div class="form-group">
                                    <label for="task_Due" class="form-label h6">
                                        <!-- calendar icon -->
                                        Due date:
                                    </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Due" value="<?php echo $row['task_Due']; ?>">
                                        <div class="input-group-append">
                                            <button type="button" class="btn border-primary border-top-0 border-left-0 border-right-0 rounded-0 remove_due_date" data-toggle="tooltip" title="Remove due date" aria-label="Remove due date">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="task_Reminder" class="form-label h6">
                                        <!-- bell icon -->
                                        Remind me:
                                    </label>
                                    <?php
                                    // 2020-10-31T01:10:00
                                    if (!empty($row['task_Reminder'])) {
                                        $reminder = substr_replace($row['task_Reminder'], "T", 10, 1);
                                    } else {
                                        $reminder = null;
                                    }
                                    ?>
                                    <div class="input-group">
                                        <input type="datetime-local" class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Reminder" value="<?php echo $reminder; ?>">
                                        <div class="input-group-append">
                                            <button type="button" class="btn border-primary border-top-0 border-left-0 border-right-0 rounded-0 remove_reminder" data-toggle="tooltip" title="Remove reminder" aria-label="Remove reminder">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="invalid-feedback">
                                            <span class="text-warning">WARNING: Setting a reminder time later than the due date.</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="task_Tags" class="form-label h6">
                                        <!-- tag icon -->
                                        Tags:
                                    </label>
                                    <input type="text" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Tags" value="<?php echo $row['task_Tags']; ?>" placeholder="No tags. Click to add." data-toggle="tooltip" title="Multiple tags with the same name will be automatically combined into one on save">
                                    <small>Separate multiple tags with a comma, ex: schoolstuff, science</small>
                                    <div class="invalid-feedback">
                                        <span class="text-danger">Too many tags! (up to 3 tags, max 12 characters per tag)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-secondary btn-sm" data-dismiss="modal">
                    <!-- x icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                    Cancel
                </button>
                <button type="submit" class="btn text-primary btn-sm">
                    <!-- check icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                    </svg>
                    Update
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Task -->
<div class="modal fade" id="taskdelete<?php echo $row['task_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="Delete task" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Delete task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <h4 class="text-center text-truncate"><?php echo $row['task_Name']; ?></h4>
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
                    Delete
                </a>
            </div>
        </div>
    </div>
</div>