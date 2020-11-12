<?php

    include("header.php");
    $sID = $_POST["subjectID"];
    $sqlDelete = "DELETE FROM subject WHERE subject_ID='$sID'";
    $conn->query($sqlDelete);
    header('location:subjects.php');
