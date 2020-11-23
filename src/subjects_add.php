<!--used in adding new subjects-->
<!--To be worked on by Mico and Jett-->

<?php
    include("conn.php");
    include("notification.php");

    $sName = $_POST ["subjectName"];
    $sType = $_POST ["subjectType"];
    $sInstructor = $_POST ["subjectInstructor"];
    $sDesc = $_POST ["subjectDesc"];
    $sDay = $_POST ["subjectDay"];
    $uID = $_POST['user_ID'];

    $subjectsql = "INSERT INTO subject (subject_Name, subject_Type, subject_Instructor, subject_Desc, subject_Day, user_ID)
                    VALUES ('$sName', '$sType', '$sInstructor', '$sDesc', '$sDay', '$uID')";

    if (!$conn->query($subjectsql)) {
        $status = "Subject addition failed. " . $sName . " has already been made.";
    } else {
        $status = "Successfully added task " . $sName . ".";
    }

    header('Location:subjects.php?status=' . $status . "&isNotif=true");
?>