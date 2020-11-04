<?php include('header.php'); ?>

<body>
    <!-- navigation bar -->
    <?php include('navbar.php'); ?>
    <div class="container" id="main">
        <h1 class="text-center">Notebook</h1>
        <div class="alert alert-light shadow sticky-top" role="alert">
            <!-- sort by | sort direction | search box | add new task -->
            <!--    2    |       2        |      5     |       3      -->
            <div class="row form-inline">
                <!-- Sort by and sort direction -->
                <div class="col-sm-4">
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
                <div class="col-sm-3">
                    <a href="#addnote" data-toggle="modal" class="btn btn-sm btn-outline-primary">
                        <!-- To the UI ppl: plus icon--> New Note</a>
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