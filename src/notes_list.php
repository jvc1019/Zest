<div id="notes_list">
    <div class="card-deck fourcolumns mt-3">
        <?php
        require_once("conn.php");
        include_once('user_details.php');
        $sort = "ASC";
        if (!empty($_GET['sort'])) {
            $sort = $_GET['sort'];
            $sort = ($value == 0) ? "ASC" : "DESC";
        }
        $query = "SELECT * FROM note LEFT JOIN user ON note.user_ID=user.user_ID WHERE note.user_ID=$user_ID ORDER BY note_Title $sort";
        $result = $conn->query($query);
        if (!($result->num_rows > 0)) { ?>
            </div>
            <h6 class="text-center">There's nothing around here. Add some notes!</h6>
    <?php
        } else {
            while ($row = $result->fetch_assoc()) { ?>

                <div class="card" style="height: 14em;">
                    <div class="card-body overflow-hidden">
                        <h5><?php echo $row['note_Title']; ?></h5>
                        <p class="card-subtitle mb-2 text-muted small"><?php echo '
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 2v4.586l7 7L13.586 9l-7-7H2zM1 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2z"/>
                            <path fill-rule="evenodd" d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                        </svg>
                        ' . $row['note_Tags']; ?></p>
                        <p class="small"><?php echo $row['note_Content']; ?></p>
                    </div>
                    <div class="card-footer text-center">

                    <!-- view/edit note -->
                        <a href="#editNote<?php echo $row['note_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                            <span>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                <circle cx="8" cy="4.5" r="1" />
                            </svg></span>Details
                        </a>

                    <!-- view/edit note modal -->
                    <div class="modal fade" id="editNote<?php echo $row['note_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="Note Details" aria-hidden="true">	
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary">Edit Note</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <form method="POST" action="notes_edit.php" enctype="multipart/form-data">
                                        <input type="hidden" name="note_ID" value="<?php echo $row['note_ID'] ?>" />

                                        <!-- note title and tags form -->
                                        <div class="row mx-5 px-4 justify-content-center">
                                            <div class="form-row">
                                                <div class="col">
                                                    <input class="mr-2 form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" type="text" name="note_Title" value="<?php echo $row['note_Title'] ?>">
                                                </div>
                                                <div class="col">
                                                    <input class="ml-0 form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" type=" text" onkeyup="nospaces(this)" name="note_Tags" value="<?php echo $row['note_Tags'] ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- content form -->
                                        <br>
                                        <div class="row justify-content-center my-1">
                                            <?php include("texteditor/text_editor.php"); $note_Content = $row['note_Content'];?>
                                        </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">
                                        <!-- x icon -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                        Cancel
                                    </button>
                                    <button type="submit" name="submit" class="btn btn-sm text-primary">
                                        <!-- check/floppy icon -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                                            <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                                            <path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z" />
                                        </svg>
                                        Save
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- delete note -->
                        <a href="#notedelete<?php echo $row['note_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                            <span>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></span>Delete
                        </a>
                    </div>
                </div>

                <!-- delete note modal -->
                <div class="modal fade" id="notedelete<?php echo $row['note_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="myModalLabel">Delete Note</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>

                            <div class="modal-body">
                                <h5 class="text-center text-truncate"><?php echo "'$row[note_Title]'"; ?></h5>
                                <p class="text-center">will be permanently deleted</p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">
                                    <!-- x icon -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>Cancel
                                </button>
                                <a href="notes_delete.php?note_ID=<?php echo $row['note_ID']; ?>" class="btn btn-sm text-danger">
                                    <!-- trash bin icon -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }} ?>
    </div>
</div>