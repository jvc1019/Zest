    <!--Delete Modal-->
    <div id="deleteSubjectModal<?php echo $subjects['subject_ID']; ?>" class="modal fade" role="dialog" aria-labelledby="Delete task" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <form method="POST" action="subjects_delete.php">
                        <input type="hidden" name="sID" value="<?php echo $subjects['subject_ID']; ?>">
                        <h5 class="text-center text-truncate"><?php echo "'$subjects[subject_Name]'"; ?></h5>
                        <p class="text-center">will be permanently deleted</p>
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
                    <button type="submit" class="btn btn-sm text-danger">
                        <!-- trash bin icon -->
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg>
                        Delete
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--Update Modal-->
    <div id="detailsSubjectModal<?php echo $subjects['subject_ID']; ?>" class="modal fade" role="dialog">
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
                            <input class="form-check-input" type="radio" name="subjectType" id="addLecture" value="Lecture" <?php if ($subjects['subject_Type'] == "Lec") echo "checked" ?>>
                            <label class="form-check-label" for="addLecture">Lecture</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subjectType" id="addLaboratory" value="Laboratory" <?php if ($subjects['subject_Type'] == "Lab") echo "checked" ?>>
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
                            <textarea class="form-control" id="addSubjectDesc" rows="2" name="subjectDesc"><?php echo $subjects['subject_Desc']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="addSubjectDay">Day of the Week</label>
                            <select id="addSubjectDay" class="form-control form-control-sm" name="subjectDay">
                                <option selected><?php echo $subjects['subject_Day']; ?></option>
                                <?php if ($subjects['subject_Day'] != "Monday") echo "<option>Monday</option>" ?>
                                <?php if ($subjects['subject_Day'] != "Tuesday") echo "<option>Tuesday</option>" ?>
                                <?php if ($subjects['subject_Day'] != "Wednesday") echo "<option>Wednesday</option>" ?>
                                <?php if ($subjects['subject_Day'] != "Thursday") echo "<option>Thursday</option>" ?>
                                <?php if ($subjects['subject_Day'] != "Friday") echo "<option>Friday</option>" ?>
                                <?php if ($subjects['subject_Day'] != "Saturday") echo "<option>Saturday</option>" ?>
                                <?php if ($subjects['subject_Day'] != "Sunday") echo "<option>Sunday</option>" ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="addSubjectTimeStart">Time Start:</label>
                                <input class="form-control form-control-sm" id="addSubjectTimeStart" type="time" value="<?php echo $subjects['subject_Time_Start']; ?>" name="subjectTimeStart">
                            </div>
                            <div class="col">
                                <label for="addSubjectTimeEnd">Time End:</label>
                                <input class="form-control form-control-sm" id="addSubjectTimeEnd" type="time" value="<?php echo $subjects['subject_Time_End']; ?>" name="subjectTimeEnd">
                            </div>
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