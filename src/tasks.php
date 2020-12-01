<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

<?php
include("header.php");
include("user_details.php");
include("notification.php");
?>
<!-- Upon page load, the task list, grouped if "completed" or "not completed", will show. 
If the user presses the check button, the task_isDone of the tasks item is marked as true. The page will then be refreshed. 
If the user presses the "add new task" button, a pop-up will appear, asking for the details. -->

<body>
    <!-- navigation bar -->
    <?php include("sidebar.php"); ?>
    <div class="container-fluid with-sidebar">
        <div class="alert alert-light shadow sticky-top">
            <!-- Tasks | sort by | sort direction | search box | add new task -->
            <!--   2   |          3               |      5     |       2      -->
            <div class="row form-inline">
                <div class="col-sm-2">
                    <h3 class="text-primary text-center">Tasks</h3>
                </div>
                <div class="col-sm-1 text-center">Sort by: </div>
                <!-- Sort by and sort direction -->
                <div class="col-sm-3 form-inline">
                    <select id="sortBy" class="btn btn-sm">
                        <?php
                        $value = !empty($_GET['sortBy']) ? $_GET['sortBy'] : 0;
                        if ($value == 0) {
                        ?>
                            <option selected value="0">Name</option>
                            <option value="1">Due date</option>
                        <?php
                        } else if ($value == 1) {
                        ?>
                            <option value="0">Name</option>
                            <option selected value="1">Due date</option>
                        <?php
                        }
                        ?>
                    </select>
                    <select id="sortDir" class="btn btn-sm">
                        <?php
                        $value = !empty($_GET['sortDir']) ? $_GET['sortDir'] : 0;
                        if ($value == 0) {
                        ?>
                            <option selected value="0">Ascending</option>
                            <option value="1">Descending</option>
                        <?php
                        } else if ($value == 1) {
                        ?>
                            <option value="0">Ascending</option>
                            <option selected value="1">Descending</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- Search box -->
                <div class="col-sm-4 input-group">
                    <input type="text" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="search" placeholder="Search tasks by name..." value="<?php if (!empty($_GET['search']) && empty($_GET['tag'])) {
                                                                                                                                                                                                            echo html_entity_decode($_GET['search'], ENT_COMPAT);
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo "";
                                                                                                                                                                                                        }
                                                                                                                                                                                                        ?>">
                    <div class="input-group-append">
                        <button id="search_clear" class="btn border-primary border-top-0 border-left-0 border-right-0 rounded-0" data-toggle="tooltip" title="Clear search">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </div>

                </div>
                <!-- New task button -->
                <div class="col-sm-2">
                    <button href="#addtask" data-toggle="modal" class="btn btn-sm btn-primary btn-block">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        New Task
                    </button>
                </div>

                <?php
                $sortBy = "task_Name";
                if (!empty($_GET['sortBy'])) {
                    $sortBySet = $_GET['sortBy'];
                    $sortBy = ($sortBySet == 0) ? "task_Name" : "task_Due";
                }

                $sortDir = "ASC";
                if (!empty($_GET['sortDir'])) {
                    $sortDirSet = $_GET['sortDir'];
                    $sortDir = ($sortDirSet == 0) ? "ASC" : "DESC";
                }

                $search = "";
                $searchQuery = "";
                if (!empty($_GET['search'])) {
                    $searchQuery = htmlentities($_GET['search'], ENT_QUOTES);
                    $search = "WHERE task_Name LIKE '$searchQuery%' AND task.user_ID=$user_ID ORDER BY $sortBy $sortDir";
                }


                if (!empty($_GET['tag'])) {
                    $tag = $_GET['tag'];
                    $regex = preg_quote("\b$tag\b");
                    $search = "WHERE task_Tags RLIKE '$regex' AND task.user_ID=$user_ID ORDER BY task_Name ASC";
                }
                ?>
            </div>
            <?php include("tasks_tags.php"); ?>
        </div>
        <?php
        include("tasks_modal_tags.php");
        include("tasks_modal_add.php");
        ?>
        <script>
            var alarms = {}; // stores the reminder timestamps of the tasks
        </script>

        <?php
        if (empty($search)) {
            include("tasks_list.php");
        } else {
            include("tasks_filter.php");
        } ?>
    </div>
    <script src="js/tasks_modal_functions.js"></script>
    <script>
        $(document).ready(function() {
            // Spawn notification if GET value is set
            spawnNotification();

            // Switch focus to search box by default
            $("#search").focus();
            var tmpStr = $("#search").val();
            $("#search").val("");
            $("#search").val(tmpStr);

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

                spawnNotificationBase("Reminder", task_Name, "alarm", duration);
            }
            // END OF ALARM FEATURE

            // clears the search box 
            $("#search_clear").click(function(e) {
                $("#search").val("");
                window.location = "tasks.php";
            });

            // SORTING HANDLER
            // Sorts the tasks list
            $("#sortBy").on("change", sort);
            $("#sortDir").on("change", sort);
            $("#search").on("input", sort);

            function sort() {
                $sortBy = $("#sortBy").val();
                $sortDir = $("#sortDir").val();
                $searchQuery = $("#search").val();
                window.location.search = "sortBy=" + $sortBy + "&sortDir=" + $sortDir + "&search=" + $searchQuery;
            }

            // END OF SORTING HANDLER

            // Show completed tasks button
            $("#show_completed_tasks").click(function(e) {
                if ($("#completed_tasks").is(":hidden")) {
                    $(this).text("\u2191 Hide completed tasks");
                } else {
                    $(this).text("\u2193 Show completed tasks");
                }
            });

            // CHECKBOX CONVENIENCE FUNCTIONS
            // A. Show a different SVG on hover 
            $(".checkbox.unchecked").hover(
                function() {
                    $(this).html( /*SVG check icon*/
                        "<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-check2' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/></svg>"
                    );
                },
                function() {
                    $(this).html( /*empty SVG like in tasks_list.php lines 69-70*/
                        "<svg width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'></svg>"
                    );
                }
            );
            $(".checkbox.checked").hover(
                function() {
                    $(this).removeClass("btn-secondary");
                    $(this).addClass("border-secondary");
                    $(this).html( /*empty SVG like in tasks_list.php lines 69-70*/
                        "<svg width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'></svg>"
                    );
                },
                function() {
                    $(this).removeClass("border-secondary");
                    $(this).addClass("btn-secondary");
                    $(this).html( /*SVG check icon*/
                        "<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-check2' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/></svg>"
                    );
                }
            );
            // B. Marks task as complete 
            $(".checkbox").click(function() {
                var task_ID = $(this).val();
                var task_isChecked = ($(this).hasClass("checked")) ? "true" : "false";

                window.location = "tasks_update.php?task_ID=" + task_ID + "&task_isChecked=" + task_isChecked;
            });

            // reload the browser every midnight to update the Due today section
            const c_Time = new Date();
            var midnight = new Date(c_Time);
            midnight.setDate(midnight.getDate() + 1);

            var duration = midnight.getTime() - c_Time.getTime();

            setTimeout(setInterval(function() {
                window.location.reload;
            }, 86400000), duration);
        });
    </script>
</body>

</html>