<!--Hi Adriel here, some restrictions will be added by Mico or me soon
    For now, the focus was a working update function
-->
<?php

    include("header.php");
    
    //Store ID here
    $sID = $_POST["sID"];

    $sName = $_POST ["subjectName"];
    $sType = $_POST ["subjectType"];
    $sInstructor = $_POST ["subjectInstructor"];
    $sDesc = $_POST ["subjectDesc"];
    $sDay = $_POST ["subjectDay"];
    $uID = $_POST['user_ID'];

    echo $sID;
    echo $sType;
    echo $sInstructor;
    echo $sDesc;
    echo $sDay;
    echo $uID;

    $sqlUpdate = "UPDATE subject SET subject_Name='$sName', subject_Type='$sType', 
                    subject_Instructor='$sInstructor', subject_Desc='$sDesc', subject_Day='$sDay' WHERE subject_ID='$sID'";
    $conn->query($sqlUpdate);

    header('location:subjects.php');


//     UPDATE posts
// SET subject='This is a test', content='This is the new content'
// WHERE id='1'