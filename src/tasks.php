<?php include('header.php'); ?>

<!-- Upon page load, the task list, grouped if "completed" or "not completed", will show. 
If the user presses the check button, the task_isDone of the tasks item is marked as true. The page will then be refreshed. 
If the user presses the "add new task" button, a pop-up will appear, asking for the details. -->

<body>
    <div class="container">
        <h1 class="text-center">Tasks</h1>
        <div class="alert alert-light shadow sticky-top" role="alert">
            <!-- sort by | sort direction | search box | add new task -->
            <!--    2    |       2        |      5     |       3      -->
            <div class="row form-inline">
                <!-- Sort by and sort direction -->
                <div class="col-sm-4">
                    <select id="sortBy" class="btn btn-sm">
                        <?php
                        $value = isset($_GET['sortBy']) ? $_GET['sortBy'] : 0;
                        if ($value == 0) {
                        ?>
                            <option selected value='0'>Name</option>
                            <option value="1">Due date</option>
                        <?php
                        } elseif ($value == 1) {
                        ?>
                            <option value="0">Name</option>
                            <option selected value="1">Due date</option>
                        <?php
                        }
                        ?>
                    </select>
                    <select id="sortDir" class="btn btn-sm">
                        <?php
                        $value = isset($_GET['sortDir']) ? $_GET['sortDir'] : 0;
                        if ($value == 0) {
                        ?>
                            <option selected value="0">Ascending</option>
                            <option value='1'>Descending</option>
                        <?php
                        } elseif ($value == 1) {
                        ?>
                            <option value="0">Ascending</option>
                            <option selected value="1">Descending</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- Search box -->
                <div class="col-sm-5 input-group">
                    <input type="text" class="form-control" id="search" placeholder="Search tasks..." value="<?php if (isset($_GET['search'])) {
                                                                                                                    echo $_GET['search'];
                                                                                                                } else {
                                                                                                                    echo "";
                                                                                                                }
                                                                                                                ?>">
                    <div class="input-group-append">
                        <button id="searchBtn" class="btn btn-primary">
                            <!-- TO UI people, just add a search icon here--></button>
                    </div>
                </div>
                <!-- New task button -->
                <div class="col-sm-3">
                    <a href="#addtask" data-toggle="modal" class="btn btn-sm btn-outline-primary">
                        <!-- To the UI ppl: plus icon--> New task</a>
                </div>

                <?php
                $sortBy = "task_Name";
                if (isset($_GET['sortBy'])) {
                    $sortBySet = $_GET['sortBy'];
                    $sortBy = ($sortBySet == 0) ? "task_Name" : "task_Due";
                }

                $sortDir = "ASC";
                if (isset($_GET['sortDir'])) {
                    $sortDirSet = $_GET['sortDir'];
                    $sortDir = ($sortDirSet == 0) ? "ASC" : "DESC";
                }

                $search = "";
                $searchQuery = "";
                if (isset($_GET['search'])) {
                    $searchQuery = $_GET['search'];
                    if (!empty($searchQuery)) {
                        $search = "WHERE task_Name LIKE '%" . $searchQuery . "%' AND task.user_ID=$user_ID";
                    }
                }
                ?>
            </div>

        </div>
        <?php include('tasks_modal_add.php'); ?>
        <!-- show last status message as a Boostrap alert -->
        <?php if (!empty($_GET['status'])) { ?>
            <div id="notification" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong><?php echo $_GET['status']; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <script>
            var reminders = {}; // stores the reminder timestamps of the tasks
        </script>
        <?php
        if (empty($search)) {
            include('tasks_list.php');
        } else {
            include('tasks_search.php');
        } ?>
    </div>
    <script>
        $(document).ready(function() {
            // GENERAL FUNCTION FOR HANDLING NOTIFICATIONS
            if ($("#notification").length) {
                if (window.history.replaceState) {
                    //prevents browser from storing history with each change:
                    window.history.replaceState(null, "", "tasks.php");
                }
                // if notification is visible, play a sound effect
                (new Audio("../resources/notification.ogg")).play();
                // destroy any notification after 5 seconds
                setTimeout(function(e) {
                    $("#notification").remove();
                }, 5000);
            }
            // END OF HANDLER

            // REMINDER FEATURE
            // collect all the reminder times, call setReminder for each
            for (const task_Name in reminders) {
                if (reminders.hasOwnProperty(task_Name)) {
                    setReminder(reminders[task_Name], task_Name);
                }
            }

            function setReminder(datetime, task_Name) {
                var alarmTime = new Date(parseInt(datetime.substr(0, 4)), parseInt(datetime.substr(5, 2)) - 1, parseInt(datetime.substr(8, 2)), parseInt(datetime.substr(11, 2)), parseInt(datetime.substr(14, 2)), parseInt(datetime.substr(17, 2)));
                var duration = alarmTime.getTime() - (new Date()).getTime();
                if (isNaN(duration) || duration < 0) {
                    return;
                }

                var timer = setTimeout(function(e) {
                    window.location.search = "status=🔔 REMINDER: " + task_Name;
                }, duration);
            }
            // END OF REMINDER FEATURE

            // SORTING HANDLER
            // Sorts the tasks list
            $("#sortBy").on('change', sort);
            $("#sortDir").on('change', sort);
            $("#searchBtn").click(sort);

            function sort() {
                $sortBy = $("#sortBy").val();
                $sortDir = $("#sortDir").val();
                $searchQuery = $("#search").val();
                window.location.search = "sortBy=" + $sortBy + "&sortDir=" + $sortDir + "&search=" + $searchQuery;
            }
            // END OF SORTING HANDLER

            // Show completed tasks button
            $("#show_completed_tasks").click(function(e) {
                if ($("#completed_tasks:hidden").length)
                    $("#show_completed_tasks").text("\u2191 Hide completed tasks");
                else {
                    $("#show_completed_tasks").text("\u2193 Show completed tasks");
                }
            });

            // Marks task as complete 
            $(".checkbox").on('click', function(e) {
                e.preventDefault();
                var $task_ID = $(this).val();
                var $isChecked = ($(this).attr('checked') === undefined) ? "false" : "true";

                window.location = "tasks_update.php?task_ID=" + $task_ID + "&task_isChecked=" + $isChecked;
            })
        });
    </script>
</body>

</html>