<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

<!-- Add Task -->
<div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="Add new Task" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Add new Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="tasks_add.php?user_ID=<?php echo $user_ID; ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control font-weight-bold border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Name" placeholder="Task name" required>
                                    <div class="invalid-feedback">
                                        <span class="text-danger">Task name is too long! (max 75 characters)</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Desc" placeholder="Task description (optional)" rows="8"></textarea>
                                    <div class="invalid-feedback">
                                        <span class="text-danger">┗|｀O′|┛ We're not writing novels here!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 task_Date">
                                <div class="form-group">
                                    <label for="task_Due" class="form-label h6">
                                        <!-- calendar icon -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                        Due date:
                                    </label>
                                    <div class="input-group">
                                        <input type="datetime-local" class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Due">
                                        <div class="input-group-append">
                                            <button type="button" class="btn border-primary border-top-0 border-left-0 border-right-0 rounded-0 remove_due_date" data-toggle="tooltip" title="Remove due date" aria-label="Remove due date">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="task_Reminder" class="form-label h6">
                                        <!-- bell icon -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                                            <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                        </svg>
                                        Remind me:
                                    </label>
                                    <div class="input-group">
                                        <input type="datetime-local" class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Reminder">
                                        <div class="input-group-append">
                                            <button type="button" class="btn border-primary border-top-0 border-left-0 border-right-0 rounded-0 remove_reminder" data-toggle="tooltip" title="Remove reminder" aria-label="Remove reminder">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
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
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2 2v4.586l7 7L13.586 9l-7-7H2zM1 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2z" />
                                            <path fill-rule="evenodd" d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                        </svg>
                                        Tags:
                                    </label>
                                    <input type="text" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Tags" placeholder="ex: grocery" data-toggle="tooltip" title="Multiple tags with the same name will be automatically combined into one on save">
                                    <small>Separate multiple tags with a comma, ex: schoolstuff, science</small>
                                    <div class="invalid-feedback">
                                        <span class="text-danger">Too many tags! (up to 3 tags, max 12 characters per tag, letters and numbers only)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-sm text-secondary">
                    <!-- reset icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                    </svg>
                    Clear
                </button>
                <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">
                    <!-- x icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                    Cancel
                </button>
                <button type="submit" class="btn btn-sm text-primary">
                    <!-- check/floppy icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                        <path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z" />
                    </svg>
                    Save
                </button>
                </form>
            </div>
        </div>
    </div>
</div>