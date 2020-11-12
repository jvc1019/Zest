<!--used in adding new subjects-->
<!--To be worked on by Mico and Jett-->

<?php
    include("header.php");

    $sName = $_POST ["subjectName"];
    $sType = $_POST ["subjectType"];
    $sInstructor = $_POST ["subjectInstructor"];
    $sDesc = $_POST ["subjectDesc"];
    $sDay = $_POST ["subjectDay"];
    $uID = $_POST['user_ID'];

    $subjectsql = "INSERT INTO subject (subject_Name, subject_Type, subject_Instructor, subject_Desc, subject_Day, user_ID)
                    VALUES ('$sName', '$sType', '$sInstructor', '$sDesc', '$sDay', '$uID')";

    $conn->query($subjectsql);

    header('location:subjects.php');
?>