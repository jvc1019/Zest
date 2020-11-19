<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

<div id="task_list">

    <?php
    $query = "SELECT task_Tags FROM task WHERE task.user_ID=$user_ID AND task_Tags IS NOT NULL";
    $all_tasks = $conn->query($query);

    $task_Tags_Intersect = array();

    if ($all_tasks->num_rows > 0) {
        while ($row = $all_tasks->fetch_assoc()) {
            $_tag = !empty(explode(",", $row["task_Tags"])) ? explode(",", $row["task_Tags"]) : $row["task_Tags"];
            $task_Tags_Intersect = array_merge($task_Tags_Intersect, $_tag);
        }

        $task_Tags_Intersect = array_unique($task_Tags_Intersect, SORT_STRING);

    ?>
        <h6>Tags:
            <?php
            foreach ($task_Tags_Intersect as $key => $value) { ?>
                <a href="tasks.php?tag=<?php echo $value; ?>" class="badge badge-primary"><?php echo $value; ?></a>
            <?php
            }
            ?>
        </h6>
    <?php
    }
    ?>

    <?php

    // due today tasks
    $today = date("Y-m-d");
    $query = "SELECT * FROM task WHERE task_Due='$today' AND task.user_ID=$user_ID ORDER BY task_Reminder ASC";
    $due_today_tasks = $conn->query($query);

    // incomplete tasks
    $query = "SELECT * FROM task WHERE task_isDone=0 AND task.user_ID=$user_ID ORDER BY $sortBy $sortDir";
    $incomplete_tasks = $conn->query($query);

    // complete tasks
    $query = "SELECT * FROM task WHERE task_isDone=1 AND task.user_ID=$user_ID ORDER BY $sortBy $sortDir";
    $complete_tasks = $conn->query($query);
    ?>
    <!-- DUE TODAY TASKS -->
    <?php
    if (($due_today_tasks->num_rows > 0)) {
    ?>
        <h5 class="text-primary">Due today <small class="text-muted">sorted by reminder time</small></h5>
        <ul id="due_today_tasks" class="list-group">
            <?php
            while ($row = $due_today_tasks->fetch_assoc()) {
            ?>
                <li class="list-group-item">
                    <!-- check box | task name and due | edit button | delete button -->
                    <!--     1     |         8        |             2                -->
                    <div class="row form-inline">
                        <!-- check box -->
                        <div class="col-sm-1 text-center">
                            <?php
                            if ($row['task_isDone'] == 0) {
                            ?>
                                <button class="btn btn-sm btn-outline-secondary rounded-circle checkbox unchecked" value=<?php echo $row['task_ID']; ?> data-toggle="tooltip" title="Mark as complete">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    </svg>
                                </button>
                            <?php
                            } else {
                            ?>
                                <button class="btn btn-sm btn-secondary rounded-circle checkbox checked" value=<?php echo $row['task_ID']; ?> data-toggle="tooltip" title="Mark as incomplete">
                                    <!-- check icon (no outline or anything) -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                </button>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- task name and due -->
                        <div class="col-sm-8">
                            <?php
                            if ($row['task_isDone'] == 0) {
                            ?>
                                <h6><?php echo $row['task_Name']; ?></h6>
                            <?php
                            } else {
                            ?>
                                <h6><del><?php echo $row['task_Name']; ?></del></h6>
                            <?php
                            }
                            ?>
                            <small>
                                <?php if (!empty($row['task_Due'])) { ?>
                                    <!-- calendar icon -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg>
                                <?php echo date("D, d M Y", strtotime($row['task_Due']));
                                }
                                if (!empty($row['task_Due']) && !empty($row['task_Reminder'])) { ?>
                                    <!-- dot/divider icon -->

                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dot" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                    </svg>
                                <?php
                                }
                                if (!empty($row['task_Reminder'])) { ?>
                                    <!-- reminder/bell icon -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                    </svg>
                                <?php echo date("D, d M Y h:i A", strtotime($row['task_Reminder']));
                                } ?>
                            </small>
                        </div>

                        <!-- edit and delete button -->
                        <div class="col-sm-3">
                            <a href="#taskdetails<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                                <!-- info icon?-->
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                        <circle cx="8" cy="4.5" r="1" />
                                    </svg>
                                </span>
                                Details
                            </a>
                            <a href="#taskdelete<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                <!-- garbage bin icon-->
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </span>
                                Delete
                            </a>
                        </div>
                    </div>
                    <?php include('tasks_modal.php'); ?>
                </li>
            <?php
            } ?>
        </ul>
        <br>
        <h5 class="text-primary">More tasks</h5>
    <?php
    }
    ?>

    <!-- INCOMPLETE TASKS -->
    <?php
    if (!($incomplete_tasks->num_rows > 0)) {
    ?>
        <h6 class="text-center">（＾∀＾●）ﾉｼ There's nothing around here. You're all set!</h6>
    <?php
    } else { ?>
        <ul id="incomplete_tasks" class="list-group">
            <?php
            while ($row = $incomplete_tasks->fetch_assoc()) {
            ?>
                <li class="list-group-item">
                    <!-- check box | task name and due | edit button | delete button -->
                    <!--     1     |         8        |             3                -->
                    <div class="row form-inline">
                        <!-- check box -->
                        <div class="col-sm-1 text-center">
                            <button class="btn btn-sm btn-outline-secondary rounded-circle checkbox unchecked" value=<?php echo $row['task_ID']; ?> data-toggle="tooltip" title="Mark as complete">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                </svg>
                            </button>
                        </div>
                        <!-- task name and due -->
                        <div class="col-sm-8">
                            <h6><?php echo $row['task_Name']; ?></h6>
                            <small>
                                <?php if (!empty($row['task_Due'])) { ?>
                                    <!-- calendar icon -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg>
                                <?php echo date("D, d M Y", strtotime($row['task_Due']));
                                }
                                if (!empty($row['task_Due']) && !empty($row['task_Reminder'])) { ?>
                                    <!-- dot/divider icon -->

                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dot" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                    </svg>
                                <?php
                                }
                                if (!empty($row['task_Reminder'])) { ?>
                                    <!-- reminder/bell icon -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                    </svg>
                                    <script>
                                        alarms["<?php echo $row['task_Name']; ?>"] = "<?php echo $row['task_Reminder']; ?>";
                                    </script>
                                <?php echo date("D, d M Y h:i A", strtotime($row['task_Reminder']));
                                } ?>
                            </small>
                        </div>

                        <!-- edit and delete button -->
                        <div class="col-sm-3">
                            <a href="#taskdetails<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                                <!-- info icon?-->
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                        <circle cx="8" cy="4.5" r="1" />
                                    </svg>
                                </span>
                                Details
                            </a>
                            <a href="#taskdelete<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                <!-- garbage bin icon-->
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </span>
                                Delete
                            </a>
                        </div>
                    </div>
                    <?php include('tasks_modal.php'); ?>
                </li>
            <?php
            } ?>
        </ul>
    <?php
    }
    ?>

    <!-- COMPLETED TASKS -->
    <button id="show_completed_tasks" data-toggle="collapse" data-target="#completed_tasks" class="btn btn-sm text-primary">&#8595; Show completed tasks</button>
    <div id="completed_tasks" class="collapse">
        <?php
        if (!($complete_tasks->num_rows > 0)) {
        ?>
            <h6 class="text-center">(┬┬﹏┬┬) No completed tasks yet.</h6>
        <?php
        } else { ?>
            <ul class="list-group">
                <?php
                while ($row = $complete_tasks->fetch_assoc()) {
                ?>
                    <li class="list-group-item">
                        <!-- check box | task name and due | edit button | delete button -->
                        <!--     1     |         8        |             3                -->
                        <div class="row form-inline">
                            <!-- check box -->
                            <div class="col-sm-1 text-center">
                                <button class="btn btn-sm btn-secondary rounded-circle checkbox checked" value=<?php echo $row['task_ID']; ?> data-toggle="tooltip" title="Mark as incomplete">
                                    <!-- check icon (no outline or anything) -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                </button>
                            </div>
                            <!-- task name and due -->
                            <div class="col-sm-8">
                                <h6><del><?php echo $row['task_Name']; ?></del></h6>
                                <small>
                                    <?php if (!empty($row['task_Due'])) { ?>
                                        <!-- calendar icon -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                    <?php echo date("D, d M Y", strtotime($row['task_Due']));
                                    }
                                    if (!empty($row['task_Due']) && !empty($row['task_Reminder'])) { ?>
                                        <!-- dot/divider icon -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dot" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                        </svg>
                                    <?php
                                    }
                                    if (!empty($row['task_Reminder'])) { ?>
                                        <!-- reminder/bell icon -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                        </svg>
                                        <script>
                                            alarms["<?php echo $row['task_Name']; ?>"] = "<?php echo $row['task_Reminder']; ?>";
                                        </script>
                                    <?php echo date("D, d M Y h:i A", strtotime($row['task_Reminder']));
                                    } ?>
                                </small>
                            </div>
                            <!-- edit and delete button -->
                            <div class="col-sm-3">
                                <a href="#taskdetails<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                                    <!-- info icon?-->
                                    <span>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                            <circle cx="8" cy="4.5" r="1" />
                                        </svg>
                                    </span>
                                    Details
                                </a>
                                <a href="#taskdelete<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                    <!-- garbage bin icon-->
                                    <span>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </span>
                                    Delete
                                </a>
                            </div>
                        </div>
                        <?php include('tasks_modal.php'); ?>
                    </li>
                <?php
                } ?>
            </ul>
        <?php
        }
        ?>
    </div>
</div>