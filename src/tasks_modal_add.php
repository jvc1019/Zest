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
                                    <input type="text" id="task_Name" class="form-control font-weight-bold border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Name" placeholder="Task name" required>
                                    <div id="task_Name_warning" class="invalid-feedback">
                                        <span class="text-danger">Task name is too long! (max 75 characters)</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea id="task_Desc" class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Desc" placeholder="Task description (optional)" rows="8"></textarea>
                                    <div id="task_Desc_warning" class="invalid-feedback">
                                        <span class="text-danger">┗|｀O′|┛ We're not writing novels here!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="task_Due" class="form-label h6">
                                        <!-- calendar icon -->
                                        Due date:
                                    </label>
                                    <div class="input-group">
                                        <input type="date" id="task_Due" class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Due">
                                        <div class="input-group-append">
                                            <button type="button" class="btn remove_due_date" data-toggle="tooltip" title="Remove due date" aria-label="Remove due date">
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
                                    <div class="input-group">
                                        <input type="datetime-local" id="task_Reminder" class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Reminder">
                                        <div class="input-group-append">
                                            <button type="button" class="btn remove_reminder" data-toggle="tooltip" title="Remove reminder" aria-label="Remove reminder">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="date_warning" class="invalid-feedback">
                                        <span class="text-danger">WARNING: Setting a reminder time later than the due date.</span>
                                    </div>
                                </div>

                                <label for="task_Tags" class="form-label h6">
                                    <!-- tag icon -->
                                    Tags:
                                </label>
                                <input type=" text" id="task_Tags" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="task_Tags" placeholder="ex: grocery">
                                <small id="task_Tags_tip">Separate multiple tags with a comma, ex: schoolstuff, science</small>
                                <div id="task_Tags_warning" class="invalid-feedback">
                                    <span class="text-danger">Too many tags! (max 250 characters)</span>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-sm text-secondary">
                    <!-- reset icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
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
                <button type="submit" id="add_submit" class="btn btn-sm text-primary">
                    <!-- check/floppy icon -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                        <path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z" />
                    </svg>
                    Save
                </button>

                <!-- VALIDATION -->
                <script>
                    $("#task_Name").on("input", function(e) {
                        if ($(this).val().length > 75) {
                            $("#task_Name_warning").show();
                        } else {
                            $("#task_Name_warning").hide();
                        }
                        validate_all();
                    });

                    $("#task_Desc").on("input", function(e) {
                        if ($(this).val().length > 16777215) {
                            $("#task_Desc_warning").show();
                        } else {
                            $("#task_Desc_warning").hide();
                        }
                        validate_all();
                    });

                    $("#task_Tags").on("input", function(e) {
                        if ($(this).val().length > 250) {
                            $("#task_Tags_tip").hide();
                            $("#task_Tags_warning").show();
                        } else {
                            $("#task_Tags_warning").hide();
                            $("#task_Tags_tip").show();
                        }
                        validate_all();
                    });

                    $("#task_Due").on("input", validate_date);
                    $("#task_Reminder").on("input", validate_date);

                    function validate_date() {
                        var due = new Date($("#task_Due").val());
                        var reminder = new Date(($("#task_Reminder").val()).substr(0, 10));

                        if (reminder > due) {
                            $("#task_Date_warning").show();
                        } else {
                            $("#task_Date_warning").hide();
                        }
                    }

                    function validate_all() {
                        if ($("#taskdetails .invalid-feedback").is(":visible")) {
                            $("#edit_submit").attr("disabled", "");
                        } else {
                            $("#edit_submit").removeAttr("disabled");
                        }
                    }
                </script>
                </form>
            </div>
        </div>
    </div>
</div>