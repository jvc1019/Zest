<!--used in adding new subjects-->
<!--To be worked on by Mico and Jett-->

<?php
    include("conn.php");

    $sImg = $_POST ['subjectBanner'];
    $sName = $_POST ["subjectName"];
    $sType = $_POST ["subjectType"];
    $sInstructor = $_POST ["subjectInstructor"];
    $sDesc = $_POST ["subjectDesc"];
    $sDay = $_POST ["subjectDay"];
    $sTimeStart = $_POST ["subjectTimeStart"];
    $sTimeEnd = $_POST ["subjectTimeEnd"];
    $uID = $_POST['user_ID'];

    $subjectsql = "INSERT INTO subject (subject_Image, subject_Name, subject_Type, subject_Instructor, subject_Desc, 
                    subject_Day, subject_Time_Start, subject_Time_End, user_ID)
                    VALUES ('$sImg', '$sName', '$sType', '$sInstructor', '$sDesc', '$sDay', '$sTimeStart', '$sTimeEnd', '$uID')";


    $status_heading = "Add Subject";
    $subjectlist = "SELECT `subject_Name` FROM `subject` where `subject_name`='$sName'";
    $result = $conn->query($subjectlist);

    #Check if subject has duplicate name
    if ($result->num_rows > 0){
        $status = "Failed to add subject " . $sName . ". Subject name already exists";
    }
    else{
        $status = "Successfully added subject " . $sName . ".";
        $conn->query($subjectsql);
        

        #Case for if user decides not to select a time
        #apparently mysql doesn't like empty values so after thorough research, it had to be forced into NULL
        if (strlen($sTimeStart) == 0 && strlen($sTimeEnd) == 0){
            echo "hello";

            $nullsql = "UPDATE subject SET subject_Time_Start=null, subject_Time_End=null WHERE `subject_name`='$sName'";
            $conn->query($nullsql);
        }
    }
    

    //tasks.php?status_heading=This is a status heading&status=This is a status text&type=notif
    header("Location:subjects.php?status_heading=".$status_heading."&status=". $status. "&type=notif");
?>