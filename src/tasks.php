<?php include('header.php'); ?>

<!-- Upon page load, the task list, grouped if "completed" or "not completed", will show. 
If the user presses the check button, the isComplete id of the tasks item is marked as true. The page will then be refreshed. 
If the user presses the "add new task" button, a pop-up will appear, asking for the details. We have no need to use JS much as we 
don't need to zap the elements XD-->

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
                            echo "<option selected value='0'>Name</option>";
                            echo "<option value='1'>Due date</option>";
                        } elseif ($value == 1) {
                            echo "<option value='0'>Name</option>";
                            echo "<option selected value='1'>Due date</option>";
                        }
                        ?>
                    </select>
                    <select id="sortDir" class="btn btn-sm">
                        <?php
                        $value = isset($_GET['sortDir']) ? $_GET['sortDir'] : 0;
                        if ($value == 0) {
                            echo "<option selected value='0'>Ascending</option>";
                            echo "<option value='1'>Descending</option>";
                        } elseif ($value == 1) {
                            echo "<option value='0'>Ascending</option>";
                            echo "<option selected value='1'>Descending</option>";
                        }
                        ?>
                    </select>
                </div>
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
                        $search = "WHERE task_Name LIKE '%" . $searchQuery . "%'";
                    }
                }
                ?>
                <div class="col-sm-3">
                    <a href="#addtask" data-toggle="modal" class="btn btn-sm btn-outline-primary"><span class="oi oi-plus"></span> New task</a>
                </div>
            </div>
        </div>
        <?php include('tasks_modal_add.php'); ?>

        <?php
        if (empty($search)) {
        ?>
            <div id="tasks">
                <!-- INCOMPLETE TASKS -->
                <ul id="incomplete_tasks" class="list-group">
                    <?php
                    $query = "SELECT * FROM task LEFT JOIN user ON task.user_ID=user.user_ID WHERE task_isDone=0 ORDER BY $sortBy $sortDir";
                    $result = $conn->query($query);
                    if (!($result->num_rows > 0)) {
                        echo "<h6 class='text-center'>☜(ﾟヮﾟ☜) There's nothing around here. You're all set!</h6>";
                    } else {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <li class="list-group-item">
                                <!-- check box | task name and due | edit button | delete button -->
                                <!--     2     |         6         |     2       |      2        -->
                                <div class="row col-12 form-inline">
                                    <!-- check box -->
                                    <div class="col-sm-2">
                                        <input class="checkbox" type="checkbox" value=<?php echo $row['task_ID']; ?>>
                                    </div>
                                    <!-- task name and due -->
                                    <div class="col-sm-6 justify-content-between">
                                        <h6><?php echo $row['task_Name']; ?></h6>
                                        <p><?php echo $row['task_Due']; ?></p>
                                    </div>
                                    <!-- edit and delete button -->
                                    <div class="col-sm-4">
                                        <a href="#taskdetails<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm"><span class="oi oi-pencil"></span> Details</a> <a href="#taskdelete<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm"><span class="oi oi-trash"></span> Delete</a>
                                        <?php include('tasks_modal.php'); ?>
                                    </div>
                                </div>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>

                <!-- COMPLETED TASKS -->
                <button id="show_completed_tasks" data-toggle="collapse" data-target="#completed_tasks" class="btn btn-primary btn-sm">&#8595; Show completed tasks</button>
                <div id="completed_tasks" class="collapse">
                    <ul class="list-group">
                        <?php
                        $query = "SELECT * FROM task LEFT JOIN user ON task.user_ID=user.user_ID WHERE task_isDone=1 ORDER BY $sortBy $sortDir";
                        $result = $conn->query($query);
                        if (!($result->num_rows > 0)) {
                            echo "<h6 class='text-center'>(┬┬﹏┬┬) No completed tasks yet.</h6>";
                        } else {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <li class="list-group-item">
                                    <!-- check box | task name and due | edit button | delete button -->
                                    <!--     2     |         6         |     2       |      2        -->
                                    <div class="row col-12 form-inline">
                                        <!-- check box -->
                                        <div class="col-sm-2">
                                            <!-- TODO: Check the box -->
                                            <input class="checkbox" type="checkbox" value=<?php echo $row['task_ID']; ?> checked>
                                        </div>
                                        <!-- task name and due -->
                                        <div class="col-sm-6 justify-content-between">
                                            <!-- TODO: Add strikethrough effect -->
                                            <h6 style="text-decoration: line-through;"><?php echo $row['task_Name']; ?></h6>
                                            <p><?php echo $row['task_Due']; ?></p>
                                        </div>
                                        <!-- edit and delete button -->
                                        <div class="col-sm-4">
                                            <a href="#taskdetails<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm"><span class="oi oi-pencil"></span> Details</a> <a href="#taskdelete<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm"><span class="oi oi-trash"></span> Delete</a>
                                            <?php include('tasks_modal.php'); ?>
                                        </div>
                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        <?php } else {
        ?>
            <div id="search">
                <ul id="search">
                    <?php
                    $query = "SELECT * FROM task LEFT JOIN user ON task.user_ID=user.user_ID $search";
                    $result = $conn->query($query);
                    if (!($result->num_rows > 0)) {
                        echo "<h6>No results found.</h6>";
                    } else {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <li class="list-group-item">
                                <!-- check box | task name and due | edit button | delete button -->
                                <!--     2     |         6         |     2       |      2        -->
                                <div class="row col-12 form-inline">
                                    <!-- check box -->
                                    <div class="col-sm-2">
                                        <?php
                                        if ($row['task_isDone'] == 0) {
                                            echo "<input class='checkbox' type='checkbox' value=$row[task_ID]>";
                                        } else {
                                            echo "<input class='checkbox' type='checkbox' value=$row[task_ID] checked>";
                                        }
                                        ?>
                                    </div>
                                    <!-- task name and due -->
                                    <div class="col-sm-6 justify-content-between">
                                        <?php
                                        if ($row['task_isDone'] == 0) {
                                            echo "<h6>$row[task_Name]</h6>";
                                            echo "<p>$row[task_Due]</p>";
                                        } else {
                                            echo "<h6 style='text-decoration: line-through;'>$row[task_Name]</h6>";
                                            echo "<p>$row[task_Due]</p>";
                                        }
                                        ?>
                                    </div>
                                    <!-- edit and delete button -->
                                    <div class="col-sm-4">
                                        <a href="#taskdetails<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm"><span class="oi oi-pencil"></span> Details</a> <a href="#taskdelete<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm"><span class="oi oi-trash"></span> Delete</a>
                                        <?php include('tasks_modal.php'); ?>
                                    </div>
                                </div>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        <?php } ?>
    </div>
    <script>
        $(document).ready(function() {
            // reminders
            // collect all the due dates, then compare them against the current time

            // setInterval(function(e) {

            // }, 5000);
            $("#sortBy").on('change', sort_);
            $("#sortDir").on('change', sort_);
            $("#searchBtn").click(sort_);
            $("#show_completed_tasks").click(function(e) {
                if ($("div#completed_tasks:hidden").length)
                    $("#show_completed_tasks").text("\u2191 Hide completed tasks");
                else {
                    $("#show_completed_tasks").text("\u2193 Show completed tasks");
                }
            });

            function sort_() {
                $sortBy = $("#sortBy").val();
                $sortDir = $("#sortDir").val();
                $searchQuery = $("#search").val();
                window.location.search = 'sortBy=' + $sortBy + '&sortDir=' + $sortDir + '&search=' + $searchQuery;
            }

            $(".checkbox").click(function(e) {
                e.preventDefault();
                var $task_ID = $(this).val();
                var $isChecked = ($(this).attr('checked') === undefined) ? "false" : "true";

                window.location = "tasks_update.php?task_ID=" + $task_ID + "&task_isChecked=" + $isChecked;
            })
        });
    </script>
</body>

</html>