<!-- View/Edit Note -->
<div class="modal fade" id="notedetails<?php echo $row['note_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Note Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="notes_edit.php?note_ID=<?php echo $row['note_ID']; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="note_Title" value="<?php echo $row['note_Title']; ?>" placeholder="Task name" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="note_Content" placeholder="Note Content" rows="3"><?php echo $row['note_Content']; ?></textarea>
                        </div>

                        <input type="text" class="form-control" name="note_Tags" value="<?php echo $row['note_Tags']; ?>" placeholder="Tags (separated by a comma)" rows="3">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-secondary btn-sm" data-dismiss="modal">
                    <!-- x icon --> Cancel</button>
                <button type="submit" class="btn text-primary btn-sm">
                    <!-- check icon --> Update</button>
                </form>
            </div>
        </div>
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
                <h3 class="text-center"><?php echo $row['note_Title']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">
                    <!-- x icon --> Cancel</button>
                <a href="notes_delete.php?note_ID=<?php echo $row['note_ID']; ?>" class="btn btn-sm text-danger">
                    <!-- trash bin icon --> Delete</a>
            </div>
        </div>
    </div>
</div>