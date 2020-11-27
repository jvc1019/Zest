<?php

    include("conn.php");

    $ID = $_POST['userID'];
    $Name = $_POST ["userName"];
    $Email = $_POST ["userEmail"];
    $Desc = $_POST ["userDesc"];
    $Theme = $_POST ['userTheme'];

    $sqlUpdate = "UPDATE user SET user_Name='$Name', user_Email='$Email', user_Desc='$Desc', user_Theme='$Theme' WHERE user_ID='$ID'";
    $conn->query($sqlUpdate);

    header('location:profile.php');
?>