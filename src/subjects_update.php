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
    $sTimeStart = $_POST ["subjectTimeStart"];
    $sTimeEnd = $_POST ["subjectTimeEnd"];
    $uID = $_POST['user_ID'];

    //For the subject day (M,T,W,Th,F,Sa,Su --> Respectively)
    if (!empty($_POST['subjectDay'])){
        $sDayCode = "";
        $sDay = "";
        foreach ($_POST['subjectDay'] as $subjectDay){
            
            #this day code allows for placeholders in subjects update
            #It's not THAT elegant, but its the best way I can think of (• ▽ •;)
            $sDayCode = $sDayCode.$subjectDay;
            switch ($subjectDay){
                case "1":
                    $sDay = $sDay."MON, ";
                    break;
                case "2":
                    $sDay = $sDay."TUE, ";
                    break;
                case "3":
                    $sDay = $sDay."WED, ";
                    break;
                case "4":
                    $sDay = $sDay."THU, ";
                    break;
                case "5":
                    $sDay = $sDay."FRI, ";
                    break;
                case "6":
                    $sDay = $sDay."SAT, ";
                    break;
                default:
                    $sDay = $sDay."SUN, ";
                    break;

            }
            //fix this, this is supposed to remove ', ' at the last bit of $sDay string
        }
       #cleanup for excess ", "
       $sDay = substr_replace($sDay ,"", -1);	
       $sDay = substr_replace($sDay ,"", -1);

       #Special cases for better display
       switch ($sDayCode){
           case "1234567":
               $sDay = "EVERYDAY";
               break;
           case "1":
               $sDay = "MONDAY";
               break;
           case "2":
               $sDay = "TUESDAY";
               break;
           case "3":
               $sDay = "WEDNESDAY";
                   break;
           case "4":
               $sDay = "THURSDAY";
               break;
           case "5":
               $sDay = "FRIDAY";
               break;
           case "6":
               $sDay = "SATURDAY";
               break;
           case "7":
               $sDay = "SUNDAY";
                   break;
       }
   }
   else{
       $sDay = null;
       $sDayCode = null;
   }


    $sqlUpdate = "UPDATE subject SET subject_Image='$sImg', subject_Name='$sName', subject_Type='$sType', subject_Instructor='$sInstructor', subject_Desc='$sDesc', subject_Day='$sDay', subject_DayCode='$sDayCode', subject_Time_Start='$sTimeStart', subject_Time_End='$sTimeEnd' 
                    WHERE subject_ID='$sID'";
    
    #take note of the 'and' here, very important for num_rows case
    $subjectlist = "SELECT `subject_Name` FROM `subject` WHERE `subject_name`='$sName' AND `subject_ID`!=$sID AND `user_ID`='$u_ID'";
    $result = $conn->query($subjectlist);

    #This is essentially the same as the one I put in subject just that its querying a different query
    #num_rows case, doesnt count self because of 'and' above
    if ($result->num_rows > 0){
        $status = "Failed to update subject " . $sName . ". Subject name already exists";
    }
    else{
        $status = "Successfully updated subject " . $sName . ".";
        $conn->query($sqlUpdate);
        

        #Case for if user decides not to select a time
        #apparently mysql doesn't like empty values so after thorough research, it had to be forced into NULL
        if (strlen($sTimeStart) == 0 && strlen($sTimeEnd) == 0){
            echo "hello";

            $nullsql = "UPDATE subject SET subject_Time_Start=null, subject_Time_End=null WHERE `subject_name`='$sName'";
            $conn->query($nullsql);
        }
    }    
    
    
    $status_heading = "Update Subject";
    header("Location:subjects.php?status_heading=".$status_heading."&status=". $status. "&type=notif");


//     UPDATE posts
// SET subject='This is a test', content='This is the new content'
// WHERE id='1'