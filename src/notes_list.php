<div id="notes_list">
    <ul id="complete_notes" class="card-deck">
        <div class="row">
            <?php
            $query = "SELECT * FROM note LEFT JOIN user ON note.user_ID=user.user_ID WHERE note.user_ID=$user_ID";
            $result = $conn->query($query);
            if (!($result->num_rows > 0)) { ?>

                <h6 class="text-center">☜(ﾟヮﾟ☜) There's nothing around here. You're all set!</h6>

                <?php
            } else {
                while ($row = $result->fetch_assoc()) { ?>

                    <div class="card" style="width: 18em; height: 16em;">
                        <div class="card-body overflow-hidden">
                            <h5><?php echo $row['note_Title']; ?></h5>
                            <p class="text-muted"><?php echo $row['note_Tags']; ?></p>
                            <?php echo $row['note_Content']; ?>
                        </div>
                        <div class="card-footer">
                            <a href="notes_editor.php?note_ID=<?php echo $row['note_ID']; ?>" id="#editnote" class="btn text-primary btn-sm">
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                        <circle cx="8" cy="4.5" r="1" />
                                    </svg>
                                </span> Details </a>
                            <a href="#notedelete<?php echo $row['note_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </span> Delete </a>
                        </div>
                    </div>

                    <!-- Delete Note -->
                    <div class="modal fade" id="notedelete<?php echo $row['note_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Delete Note</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <h3 class="text-center">Delete <?php echo $row['note_Title']; ?>?</h3>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal"> Cancel</button>
                                    <a href="notes_delete.php?note_ID=<?php echo $row['note_ID']; ?>" class="btn btn-sm text-danger"> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>
        </div>
    </ul>
</div>