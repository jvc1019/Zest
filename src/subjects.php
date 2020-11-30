<!--php file responsible for adding, editing, maintaining and deleting subjects-->
<!--To be worked on by Mico and Jett-->
<?php
include("header.php");
include("user_details.php");
include("notification.php");
?>

<body>

    <!-- navigation bar -->
    <?php include('sidebar.php'); ?>
    <div class="container-fluid with-sidebar">
        <div class="alert alert-light shadow sticky-top">
            <div class="row form-inline">
                <div class="col-sm-2">
                    <h3 class="text-primary text-center">Subjects</h3>
                </div>
                <div class="col-sm-1 text-center">Sort by: </div>
                <div class="col-sm-6">
                    <select id="sortBy" class="btn btn-sm">
                        <?php
                        $value = isset($_GET['sortBy']) ? $_GET['sortBy'] : 0;
                        if ($value == 0) {
                        ?>
                            <option selected value='0'>Type</option>
                            <option value="1">Name</option>
                            <option value="2">Day</option>
                        <?php
                        } elseif ($value == 1) {
                        ?>
                            <option value='0'>Type</option>
                            <option selected value="1">Name</option>
                            <option value="2">Day</option>
                        <?php
                        } elseif ($value == 2) {
                        ?>
                            <option value='0'>Type</option>
                            <option value="1">Name</option>
                            <option selected value="2">Day</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- New Subject button -->
                <div class="col-sm-2">
                    <button href="#" data-toggle="modal" data-target="#addSubjectModal" class="btn btn-sm btn-primary btn-block">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        New Subject
                    </button>
                </div>
            </div>
        </div>
        <!--Modal Area-->

        <!--Add subject modal-->
        <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="Add new Subject" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary">Add new Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="subjects_add.php?user_ID=<?php echo $user_ID; ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Subject Name -->
                                    <div class="form-group">
                                        <input type="text" class="form-control font-weight-bold border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addSubjectName" name="subjectName" placeholder="Subject name" required>
                                    </div>
                                    <!-- Subject Type -->
                                    <div class="form-group">
                                        <!-- <div class="form-control font-weight-bold border-primary border-top-0 border-left-0 border-right-0 rounded-0"> -->
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjectType" id="addLecture" value="LEC" checked>
                                            <label class="form-check-label" for="addLecture">Lecture</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="subjectType" id="addLaboratory" value="LAB">
                                            <label class="form-check-label" for="addLaboratory">Laboratory</label>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                    <!-- Subject Description -->
                                    <div class="form-group">
                                        <textarea class="form-control border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addSubjectDesc" name="subjectDesc" placeholder="Subject description (optional)" rows="9"></textarea>
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
                                            <input type="text" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addSubjectInstructor" name="subjectInstructor">
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
                                        <div class="input-group">
                                            <select id="addSubjectDay" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="subjectDay">
                                                <option hidden value="">Click to select a day</option>
                                                <option>Monday</option>
                                                <option>Tuesday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                                <option>Sunday</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="addSubjectTimeStart" class="form-label h6">
                                                    <!--Hourglass Icon-->
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hourglass-top" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M2 14.5a.5.5 0 0 0 .5.5h11a.5.5 0 1 0 0-1h-1v-1a4.5 4.5 0 0 0-2.557-4.06c-.29-.139-.443-.377-.443-.59v-.7c0-.213.154-.451.443-.59A4.5 4.5 0 0 0 12.5 3V2h1a.5.5 0 0 0 0-1h-11a.5.5 0 0 0 0 1h1v1a4.5 4.5 0 0 0 2.557 4.06c.29.139.443.377.443.59v.7c0 .213-.154.451-.443.59A4.5 4.5 0 0 0 3.5 13v1h-1a.5.5 0 0 0-.5.5zm2.5-.5v-1a3.5 3.5 0 0 1 1.989-3.158c.533-.256 1.011-.79 1.011-1.491v-.702s.18.101.5.101.5-.1.5-.1v.7c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13v1h-7z" />
                                                    </svg>
                                                    Time Start:
                                                </label>
                                                <input class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addSubjectTimeStart" type="time" name="subjectTimeStart">
                                            </div>
                                            <div class="col">
                                                <label for="addSubjectTimeEnd" class="form-label h6">
                                                    <!-- Reverse Hourglass Icon-->
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hourglass-bottom" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2h-7z" />
                                                    </svg>
                                                    Time End:
                                                </label>
                                                <input class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="addSubjectTimeEnd" type="time" name="subjectTimeEnd">
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
                                            <select id="addSubjectBanner" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" name="subjectBanner">
                                                <option value="img_breakfast.jpg" selected>Breakfast</option>
                                                <option value="img_graduation.jpg">Graduation</option>
                                                <option value="img_honors.jpg">Honors</option>
                                                <option value="img_math.jpg">Math</option>
                                                <option value="img_chemistry.jpg">Chemistry</option>
                                                <option value="img_music.jpg">Music</option>
                                                <option value="img_sports.jpg">Sports</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="text" name="user_ID" value=<?php echo $user_ID; ?> hidden>
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-sm text-secondary">
                            <!-- reset icon -->
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                            </svg>
                            Clear
                        </button>
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
        <br>

        <!-- <div class="shadow-none p-3 mb-8 bg-light rounded"> -->
        <div class="card-deck fourcolumns">
            <?php
            // Hi, this is a query to get subjects
            $user_Name = $_SESSION['user_Name'];
            $user = $conn->query("SELECT * FROM user WHERE user_Name='$user_Name'")->fetch_assoc();

            //fix this line, there is already something for this @ user_details
            $user_ID = $user['user_ID'];

            // $subjects = "SELECT * FROM `subject` WHERE `user_ID`=$user_ID ORDER BY `subject_ID` ASC";
            // $result = mysqli_query($conn, $query);

            $subjects = "SELECT * FROM `subject` WHERE `user_ID`=$user_ID ORDER BY `subject_ID` ASC";
            $result = $conn->query($subjects);

            if (!($result->num_rows > 0)) { ?>
                <h6>No subjects to display ( ˘･з･)</h6>
                <?php
            } else {
                while ($subjects = $result->fetch_assoc()) { ?>

                    <!--Cards Section-->
                    <div class="card">
                        <!--Card Banner-->
                        <img class="card-img-top" src="/cmsc128/resources/subjectBanners/<?php echo $subjects['subject_Image']; ?>">

                        <!--Card Body-->
                        <div class="card-body overflow-hidden" style="height:9em">
                            <h5 class="card-title"><?php echo $subjects['subject_Name'] ?> <span class="badge badge-secondary"><?php echo $subjects['subject_Type'] ?></span></h5>
                            <p class="card-subtitle mb-2 text-muted"><?php echo $subjects['subject_Instructor'] ?></p>
                            <p class="small"><?php echo $subjects['subject_Desc']; ?></p>
                        </div>
                        <!--End of Card Body-->


                        <!--List (Kitchen Sink)-->
                        <ul class="list-group list-group-flush">
                            <?php if (!empty($subjects['subject_Day'])) echo "<li class='list-group-item small'>" . $subjects['subject_Day'] . "</li>"; ?>
                            <?php if (!empty($subjects['subject_Time_Start']) and !empty($subjects['subject_Time_End']))
                                echo "<li class='list-group-item small'>" . date('g:i A', strtotime($subjects['subject_Time_Start'])) . " - " . date('g:i A', strtotime($subjects['subject_Time_End'])) . "</li>"; ?>
                        </ul>

                        <!--Card Footer-->
                        <div class="card-footer text-center">
                            <a href="#detailsSubjectModal<?php echo $subjects['subject_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                        <circle cx="8" cy="4.5" r="1" />
                                    </svg>
                                </span>Details
                            </a>
                            <a href="#deleteSubjectModal<?php echo $subjects['subject_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </span>Delete
                            </a>
                        </div>
                        <!--End of Card Footer-->
                    </div>
                    <?php include("subject_modal.php"); ?>


            <?php
                }
            }

            ?>
        </div>
    </div>
</body>