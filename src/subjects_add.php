<!--used in adding new subjects-->
<!--To be worked on by Mico and Jett-->

<?php
    include("conn.php");

    $sName = $_POST ["subjectName"];
    $sType = $_POST ["subjectType"];
    $sInstructor = $_POST ["subjectInstructor"];
    $sDesc = $_POST ["subjectDesc"];
    $sDay = $_POST ["subjectDay"];
    $sTimeStart = $_POST ["subjectTimeStart"];
    $sTimeEnd = $_POST ["subjectTimeEnd"];
    $uID = $_POST['user_ID'];

    $subjectsql = "INSERT INTO subject (subject_Name, subject_Type, subject_Instructor, subject_Desc, 
                    subject_Day, subject_Time_Start, subject_Time_End, user_ID)
                    VALUES ('$sName', '$sType', '$sInstructor', '$sDesc', '$sDay', '$sTimeStart', '$sTimeEnd', '$uID')";

    //Rework this
    // if (!$conn->query($subjectsql)) {
    //     $status = "Subject addition failed. " . $sName . " has already been made.";
    // } else {
    //     $status = "Successfully added task " . $sName . ".";
    // }
    $conn->query($subjectsql);
    $status = "Successfully added task " . $sName . ".";

    // header('Location:subjects.php?status=' . $status . "&isNotif=true");
?>