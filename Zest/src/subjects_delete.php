<!--Simple code for deleting subjects-->
<?php

    include("conn.php");
    $sID = $_POST["sID"];
    $sqlDelete = "DELETE FROM subject WHERE subject_ID='$sID'";
    $conn->query($sqlDelete);
    $status = "Successfully deleted subject";

    header("Location:subjects.php?status_heading=Subjects&status=". $status. "&type=notif");
