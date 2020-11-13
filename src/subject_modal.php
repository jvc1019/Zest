    
    
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


<!--Update Modal-->               
<div id="updateSubjectModal<?php echo $subjects['subject_ID']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4>Update Subject</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form method="POST" action="subjects_update.php">
                    <input type="hidden" name="sID" value="<?php echo $subjects['subject_ID']; ?>">
                    <div class="form-group">
                        <label for="addSubjectName">Subject Name</label>
                        <input type="text" class="form-control form-control-sm" id="addSubjectName" name="subjectName" value="<?php echo $subjects['subject_Name']; ?>" required>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="subjectType" id="addLecture" value="Lecture" checked>
                        <label class="form-check-label" for="addLecture">Lecture</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="subjectType" id="addLaboratory" value="Laboratory">
                        <label class="form-check-label" for="addLaboratory">Laboratory</label>
                    </div>
                    <div style="height: 10px;">
                    <!--space-->
                    </div>
                    <div class="form-group">
                        <label for="addSubjectInstructor">Instructor</label>
                        <input type="text" class="form-control form-control-sm" id="addSubjectInstructor" name="subjectInstructor" value="<?php echo $subjects['subject_Instructor']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="addSubjectDesc">Description</label>
                        <textarea class="form-control" id="addSubjectDesc" rows="2" name="subjectDesc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="addSubjectDay">Day of the Week</label>
                        <select id="addSubjectDay" class="form-control form-control-sm" name="subjectDay">
                            <option selected>Mon</option>
                            <option>Tue</option>
                            <option>Wed</option>
                            <option>Thu</option>
                            <option>Fri</option>
                            <option>Sat</option>
                            <option>Sun</option>
                        </select>
                    </div> 
                    <input type="text" name="user_ID" value=<?php echo $user_ID; ?> hidden> 

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>