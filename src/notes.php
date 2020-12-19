<?php
include('header.php');
include('user_details.php');
include('notification.php');
?>

<body>
    <!-- navigation bar -->
    <?php include('sidebar.php'); ?>
    <div class="container-fluid with-sidebar" id="main">
        <div class="alert alert-light shadow sticky-top" role="alert">
            <div class="row form-inline">
                <div class="col-sm-1">
                    <h3 class="text-primary text-center">Notebook</h3>
                </div>
                <div class="col-sm-2 text-right">Sort by title:</div>

                <!-- Sort by and sort direction -->
                <div class="col-sm-3">
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

                <!-- search box -->
                <div class="col-sm-4 input-group">
                    <input type="text" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="search" autocomplete="off" placeholder="Search notes by title...">
                    <div class="input-group-append">
                        <button id="search_clear" class="btn border-primary border-top-0 border-left-0 border-right-0 rounded-0" data-toggle="tooltip" title="Clear search">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- new note button -->
                <div class="col-sm-2">
                    <a href="#" data-toggle="modal" data-target="#addNoteModal" class="btn btn-sm btn-primary btn-block">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        New Note
                    </a>
                </div>
            </div>
            <?php include('notes_tags.php'); ?>
        </div>
        <div id="display">
            <?php
            if (!empty($_GET['tag'])) {
                $keyword = $_GET['tag'];
                $pattern = preg_quote("\b$keyword\b");
                $search_tag = "WHERE note_Tags RLIKE '$pattern' AND note.user_ID=$user_ID ORDER BY note_Title";
                include("notes_tags_search.php");
            } else {
                include("notes_list.php");
            } ?>
        </div>
    </div>

    <!-- add note modal -->
    <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="Add Note" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary">Add Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <form method="post" action="notes_add.php" id="#addnote" enctype="multipart/form-data">

                        <!-- note title and tags form -->
                        <div class="row mx-5 px-4 justify-content-center">
                            <div class="form-row">
                                <div class="col">
                                    <input class="mr-2 form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" type="text" name="note_Title" placeholder="Note Title" required>
                                </div>
                                <div class="col">
                                    <input class="ml-0 form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" type=" text" name="note_Tags" onkeyup="nospaces(this)" placeholder="Tags (separated by a comma)">
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row justify-content-center my-1">
                            <?php include("texteditor/text_editor.php"); ?>
                        </div>
                        <input type="hidden" name="user_ID" value="<?php echo (isset($user_ID) ? $user_ID : ''); ?>" />
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">
                        <!-- x icon -->
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>Cancel
                    </button>
                    <button type="submit" name="submit" class="btn btn-sm text-primary">
                        <!-- check/floppy icon -->
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                            <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                            <path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z" />
                        </svg>Save
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</script>
    <script>
        $(document).ready(function() {
            // Spawn notification if GET value is set
            spawnNotification();

            // clears the search box 
            $("#search_clear").on('click', function(e) {
                $("#search").val("");
                window.location.href = 'notes.php';
            });

            // on pressing a key on search box
            $("#search").on("input", function() {
                var name = $('#search').val();
                if (name == "") {
                    $.ajax({
                        type: "POST",
                        url: "notes_list.php",
                        data: {
                            search: name
                        },
                        success: function(html) {
                            $("#display").html(html).show();
                        }
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: "notes_search.php",
                        data: {
                            search: name
                        },
                        success: function(html) {
                            $("#display").html(html).show();
                        }
                    });
                }
            });
        });

        function fill(Value) {
            $('#search').val(Value);
            $('#display').hide();
        }

        function nospaces(t){
		if(t.value.match(/\s/g)){
			alert('Separate multiple tags by a comma with no spaces.');
			t.value=t.value.replace(/\s/g,''); }}
    </script>
</body>

</html>