<!-- Add Notes -->
<div class="modal fade" id="addnote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add new Note</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="notes_add.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="note_Title" placeholder="Note Title" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="note_Content" placeholder="Note Content" rows="3"></textarea>
                        </div>

                        <input type=" text" class="form-control" name="note_Tags" placeholder="Tags (separated by a comma)">

                        <!-- Hidden input for storing the user_ID -->
                        <input type="text" name="user_ID" value=<?php echo $user_ID; ?> hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">
                    <!-- x icon --> Cancel</button>
                <button type="submit" class="btn btn-sm text-primary">
                    <!-- check/floppy icon --></span> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>