    <!--PHP file containing the delete modal and update modal
    Update modal bears some similarities with add modal found in subjects.php
    The main difference is that the modal here contains placeholders-->
    
    <!--Delete Modal-->
    <div id="deleteSubjectModal<?php echo $subjects['subject_ID']; ?>" class="modal fade" role="dialog" aria-labelledby="Delete Subject" aria-hidden="true">
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
    <div class="modal fade" id="detailsSubjectModal<?php echo $subjects['subject_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="Subject Details" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary">Subject Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="subjects_update.php?user_ID=<?php echo $user_ID; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="sID" value="<?php echo $subjects['subject_ID']; ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Subject Name -->
                                <div class="form-group">
                                    <input type="text" class="form-control font-weight-bold border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addSubjectName" name="subjectName" value="<?php echo $subjects['subject_Name']; ?>" required>
                                </div>
                                <!-- Subject Type -->
                                <div class="form-group">
                                    <!-- <div class="form-control font-weight-bold border-primary border-top-0 border-left-0 border-right-0 rounded-0"> -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="subjectType" id="addLecture" value="LEC" <?php if ($subjects['subject_Type'] == "LEC") echo "checked" ?>>
                                        <label class="form-check-label" for="addLecture">Lecture</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="subjectType" id="addLaboratory" value="LAB" <?php if ($subjects['subject_Type'] == "LAB") echo "checked" ?>>
                                        <label class="form-check-label" for="addLaboratory">Laboratory</label>
                                    </div>
                                    <!-- </div> -->
                                </div>
                                <!-- Subject Description -->
                                <div class="form-group">
                                    <textarea class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addSubjectDesc" name="subjectDesc" placeholder="Subject description (optional)" rows="9"><?php echo $subjects['subject_Desc']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- Instructor -->
                                <div class="form-group">
                                    <label for="addSubjectInstructor" class="form-label h6">
                                        <!-- profile icon -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        </svg>
                                        Instructor:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addSubjectInstructor" name="subjectInstructor" value="<?php echo $subjects['subject_Instructor']; ?>">
                                    </div>
                                </div>
                                <!-- Schedule/Day of the Week -->
                                <div class="form-group">
                                    <label for="addSubjectDay" class="form-label h6">
                                        <!-- Calendar icon -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-day" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            <path d="M4.684 11.523v-2.3h2.261v-.61H4.684V6.801h2.464v-.61H4v5.332h.684zm3.296 0h.676V8.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a1.806 1.806 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98v4.105zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43zm.094 5.093h.672V7.418h-.672v4.105z" />
                                        </svg>
                                        Schedule:
                                    </label>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">                                                                                            
                                                    <input type="checkbox" class="form-check-input" value="1" name="subjectDay[]" <?php if (strpos($subjects['subject_DayCode'],"1") !== false) echo "checked" ?>>Mon
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="2" name="subjectDay[]" <?php if (strpos($subjects['subject_DayCode'],"2") !== false) echo "checked" ?>>Tue
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="3" name="subjectDay[]" <?php if (strpos($subjects['subject_DayCode'],"3") !== false) echo "checked" ?>>Wed
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="4" name="subjectDay[]" <?php if (strpos($subjects['subject_DayCode'],"4") !== false) echo "checked" ?>>Thu
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="5" name="subjectDay[]" <?php if (strpos($subjects['subject_DayCode'],"5") !== false) echo "checked" ?>>Fri
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="6" name="subjectDay[]" <?php if (strpos($subjects['subject_DayCode'],"6") !== false) echo "checked" ?>>Sat
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="7" name="subjectDay[]" <?php if (strpos($subjects['subject_DayCode'],"7") !== false) echo "checked" ?>>Sun
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="addSubjectTimeStart" class="form-label h6">
                                                <!--Reverse Hourglass Icon-->
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hourglass-top" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2 14.5a.5.5 0 0 0 .5.5h11a.5.5 0 1 0 0-1h-1v-1a4.5 4.5 0 0 0-2.557-4.06c-.29-.139-.443-.377-.443-.59v-.7c0-.213.154-.451.443-.59A4.5 4.5 0 0 0 12.5 3V2h1a.5.5 0 0 0 0-1h-11a.5.5 0 0 0 0 1h1v1a4.5 4.5 0 0 0 2.557 4.06c.29.139.443.377.443.59v.7c0 .213-.154.451-.443.59A4.5 4.5 0 0 0 3.5 13v1h-1a.5.5 0 0 0-.5.5zm2.5-.5v-1a3.5 3.5 0 0 1 1.989-3.158c.533-.256 1.011-.79 1.011-1.491v-.702s.18.101.5.101.5-.1.5-.1v.7c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13v1h-7z" />
                                                </svg>
                                                Time Start:
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addSubjectTimeStart" type="time" value="<?php echo $subjects['subject_Time_Start']; ?>" name="subjectTimeStart">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn border-primary border-top-0 border-left-0 border-right-0 rounded-0 remove_reminder" onclick="document.getElementById('addSubjectTimeStart').value = ''" data-toggle="tooltip" title="Remove start time" aria-label="Remove start time">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="addSubjectTimeEnd" class="form-label h6">
                                                <!--Hourglass Icon-->
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hourglass-bottom" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2h-7z" />
                                                </svg>
                                                Time End:
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addSubjectTimeEnd" type="time" value="<?php echo $subjects['subject_Time_End']; ?>" name="subjectTimeEnd">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn border-primary border-top-0 border-left-0 border-right-0 rounded-0 remove_reminder" onclick="document.getElementById('addSubjectTimeEnd').value = ''" data-toggle="tooltip" title="Remove end time" aria-label="Remove end time">
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="addSubjectBanner" class="form-label h6">
                                        <!--  Image/Banner Icon -->
                                        <svg width="1.0625em" height="1em" viewBox="0 0 17 16" class="bi bi-image-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15.002 9.5V13a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1v-1zm5-6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>

                                        Banner Image:
                                    </label>
                                    <div class="input-group">
                                        <select id="addSubjectBanner" class="custom-select text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="subjectBanner">
                                            <option <?php if ($subjects['subject_Image'] == "img_breakfast.jpg") echo "selected" ?> value="img_breakfast.jpg">Breakfast</option>
                                            <option <?php if ($subjects['subject_Image'] == "img_graduation.jpg") echo "selected" ?> value="img_graduation.jpg">Graduation</option>
                                            <option <?php if ($subjects['subject_Image'] == "img_honors.jpg") echo "selected" ?> value="img_honors.jpg">Honors</option>
                                            <option <?php if ($subjects['subject_Image'] == "img_math.jpg") echo "selected" ?> value="img_math.jpg">Math</option>
                                            <option <?php if ($subjects['subject_Image'] == "img_chemistry.jpg") echo "selected" ?> value="img_chemistry.jpg">Chemistry</option>
                                            <option <?php if ($subjects['subject_Image'] == "img_music.jpg") echo "selected" ?> value="img_music.jpg">Music</option>
                                            <option <?php if ($subjects['subject_Image'] == "img_sports.jpg") echo "selected" ?> value="img_sports.jpg">Sports</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="text" name="user_ID" value=<?php echo $user_ID; ?> hidden>
                            </div>
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
                    <button type="submit" class="btn btn-sm text-primary">
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