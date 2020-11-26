<!--Hi Adriel here, some restrictions will be added by Mico or me soon
    For now, the focus was a working update function
-->
<?php

    include("conn.php");
    
    //Store subject ID here
    $sID = $_POST["sID"];

    $sImg = $_POST ['subjectBanner'];
    $sName = $_POST ["subjectName"];
    $sType = $_POST ["subjectType"];
    $sInstructor = $_POST ["subjectInstructor"];
    $sDesc = $_POST ["subjectDesc"];
    $sDay = $_POST ["subjectDay"];
    $sTimeStart = $_POST ["subjectTimeStart"];
    $sTimeEnd = $_POST ["subjectTimeEnd"];
    $uID = $_POST['user_ID'];

    echo $sID;
    echo $sImg;
    echo $sType;
    echo $sInstructor;
    echo $sDesc;
    echo $sDay;
    echo $uID;

    $sqlUpdate = "UPDATE subject SET subject_Image='$sImg', subject_Name='$sName', subject_Type='$sType', subject_Instructor='$sInstructor'            , subject_Desc='$sDesc', subject_Day='$sDay', subject_Time_Start='$sTimeStart', subject_Time_End='$sTimeEnd' 
                    WHERE subject_ID='$sID'";
    $conn->query($sqlUpdate);

    header('location:subjects.php');


//     UPDATE posts
// SET subject='This is a test', content='This is the new content'
// WHERE id='1'