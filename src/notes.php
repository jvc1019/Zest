<?php
include('header.php');
include('user_details.php');
?>

<body>
    <!-- navigation bar -->
    <?php include('navbar.php'); ?>
    <div class="container" id="main">
        <div class="alert alert-light shadow sticky-top" role="alert">
            <!-- sort by | sort direction | search box | add new note -->
            <!--    2    |       2        |      5     |       3      -->
            <div class="row form-inline">
                <div class="col-sm-2">
                    <h3 class="text-primary text-right">Notebook</h3>
                </div>
                <!-- Sort by and sort direction -->
                <div class="col-sm-3" align="center">
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
                    <input type="text" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="search" placeholder="Search notes by name..." value="<?php if (isset($_GET['search'])) {
                                                                                                                                                                                                            echo $_GET['search'];
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
                <!-- New Note button -->
                <div class="col-sm-2">
                    <a href="notes_full.php" class="btn btn-sm btn-primary btn-block" role="button" aria-pressed="true">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        New Note
                    </a>
                </div>

                <?php

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
                        $search = "WHERE note_Title LIKE '%" . $searchQuery . "%' AND note.user_ID=$user_ID";
                    }
                }
                ?>
            </div>

        </div>
        <?php include('notes_modal_add.php'); ?>
        <!-- show last status message as a Boostrap alert -->
        <?php include('notification.php'); ?>
        <!-- Show last status as a bootstrap alert -->

        <?php
        if (empty($search)) {
            include('notes_list.php');
        } else {
            include('notes_search.php');
        } ?>
    </div>
    <script>
        // Enable all tooltips
        $(function() {
            $("[data-toggle='tooltip']").tooltip()
        })

        $(document).ready(function() {
            // clears the search box 
            $("#search_clear").on('click', function(e) {
                $("#search").val("");
            });

            // SORTING HANDLER
            // Sorts the notes list
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
        });
    </script>
</body>

</html>