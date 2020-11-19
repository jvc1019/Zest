<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

<div id="filter">
    <ul class="list-group">
        <?php
        $filter = !empty($search) ? $search : $tag;
        $query = "SELECT * FROM task $filter";
        $filter_tasks = $conn->query($query);
        if (!($filter_tasks->num_rows > 0)) {
            echo "<h6 class='text-center'>（；´д｀）ゞ No results found.</h6>";
        } else {
            if (!empty($tag)) { ?>
                <h6>Tasks tagged <span class="badge badge-primary"><?php echo $tag; ?></span> <small class="text-muted">sorted by name</small></h6>

                <script>
                    $("#sortBy").remove();
                    $("#sortDir").remove();
                </script>
            <?php
            }

            while ($row = $filter_tasks->fetch_assoc()) {
            ?>
                <li class="list-group-item">
                    <!-- check box | task name and due | edit button | delete button -->
                    <!--     1     |         8        |             3                -->
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

                            <script>
                                alarms["<?php echo $row['task_Name']; ?>"] = "<?php echo $row['task_Reminder']; ?>";
                            </script>
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
                    <?php include("tasks_modal.php"); ?>
                </li>
        <?php
            }
        }
        ?>
    </ul>
</div>