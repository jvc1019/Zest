<?php include('header.php'); ?>

<!-- Upon page load, the task list, grouped if "completed" or "not completed", will show. 
If the user presses the check button, the task_isDone of the tasks item is marked as true. The page will then be refreshed. 
If the user presses the "add new task" button, a pop-up will appear, asking for the details. -->

<body>
    <div class="container">
        <div class="alert alert-light shadow sticky-top">
            <!-- Tasks | sort by | sort direction | search box | add new task -->
            <!--   2   |          3               |      5     |       2      -->
            <div class="row form-inline">
                <div class="col-sm-2">
                    <h3 class="text-primary text-center">Tasks</h3>
                </div>
                <!-- Sort by and sort direction -->
                <div class="col-sm-3 form-inline">
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
                        <button id="search_clear" class="btn btn-outline-danger">
                            <!-- x icon -->
                        </button>
                        <button id="search_button" class="btn btn-primary">
                            <!-- TO UI people, just add a search icon here-->
                        </button>
                    </div>
                </div>
                <!-- New task button -->
                <div class="col-sm-2">
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
        <?php include('notification.php'); ?>
        <script>
            var alarms = {}; // stores the reminder timestamps of the tasks
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
            // ALARM FEATURE
            // collect all the alarm times, call setAlarm for each
            for (const task_Name in alarms) {
                if (alarms.hasOwnProperty(task_Name)) {
                    setAlarm(alarms[task_Name], task_Name);
                }
            }

            function setAlarm(datetime, task_Name) {
                var alarmTime = new Date(parseInt(datetime.substr(0, 4)), parseInt(datetime.substr(5, 2)) - 1, parseInt(datetime.substr(8, 2)), parseInt(datetime.substr(11, 2)), parseInt(datetime.substr(14, 2)), parseInt(datetime.substr(17, 2)));
                var duration = alarmTime.getTime() - (new Date()).getTime();
                if (isNaN(duration) || duration < 0) {
                    return;
                }

                var timer = setTimeout(function(e) {
                    window.location.search = "status_heading=🔔 REMINDER: " + "&status=" + task_Name + "&isAlarm=true";
                }, duration);
            }
            // END OF ALARM FEATURE

            // clears the search box 
            $("#search_clear").on('click', function(e) {
                $("#search").val("");
            });

            // SORTING HANDLER
            // Sorts the tasks list
            $("#sortBy").on('change', sort);
            $("#sortDir").on('change', sort);
            $("#search_button").on('click', sort);

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
                    $(this).text("\u2191 Hide completed tasks");
                else {
                    $(this).text("\u2193 Show completed tasks");
                }
            });

            // Marks task as complete 
            $(".checkbox").click(function(e) {
                var $task_ID = $(this).val();
                var $isChecked = ($(this).attr('checked') === undefined) ? "false" : "true";

                window.location = "tasks_update.php?task_ID=" + $task_ID + "&task_isChecked=" + $isChecked;
            });
        });
    </script>
</body>

</html>