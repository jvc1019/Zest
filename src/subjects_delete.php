<?php

    include("conn.php");
    $sID = $_POST["sID"];
    $sqlDelete = "DELETE FROM subject WHERE subject_ID='$sID'";
    $conn->query($sqlDelete);
    header('location:subjects.php');
