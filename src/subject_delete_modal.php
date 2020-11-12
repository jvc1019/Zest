    
    
<!--Delete Modal-->               
<div id="deleteSubjectModal<?php echo $subjects['subject_ID']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4>Delete Subject</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form method="POST" action="subjects_delete.php">
                <input type="hidden" name="sID" value="<?php echo $subjects['subject_ID']; ?>">
                <p>Delete Subject?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>