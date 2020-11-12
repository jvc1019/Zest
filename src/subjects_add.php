<!--used in adding new subjects-->
<!--To be worked on by Mico and Jett-->

<?php
    include("header.php");
    // include("user_details.php");

    $sName = $_POST ["subjectName"];
    $sType = $_POST ["subjectType"];
    $sInstructor = $_POST ["subjectInstructor"];
    $sDesc = $_POST ["subjectDesc"];
    $sDay = $_POST ["subjectDay"];
    

    //WIP part to check conflict on time with any existing subjects

    //checking
    // echo $sName;
    // echo $sType;
    // echo $sInstructor;
    // echo $sDesc;
    // echo $sDay;

    $uID = 003;
    //user_ID VALUE will be changed to the user logged in on user_details.php
    $subjectsql = "INSERT INTO subject (subject_Name, subject_Type, subject_Instructor, subject_Desc, subject_Day, user_ID)
                    VALUES ('$sName', '$sType', '$sInstructor', '$sDesc', '$sDay', '$uID')";

    $conn->query($subjectsql);

    header('location:subjects.php');
?>