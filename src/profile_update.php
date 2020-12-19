<?php

    include("conn.php");

    $ID = $_POST['userID'];
    $Name = $_POST ["userName"];
    $Email = $_POST ["userEmail"];
    $Desc = $_POST ["userDesc"];
    $Theme = $_POST ['userTheme'];
    $Avatar = $_POST ['userAvatar'];

    $sqlUpdate = "UPDATE user SET user_Name='$Name', user_Email='$Email', user_Desc='$Desc', user_Theme='$Theme', user_Avatar='$Avatar' WHERE user_ID='$ID'";
    $conn->query($sqlUpdate);

    header("Location:profile.php?status_heading=Profile Updated $username&status=You have succesfully updated your profile&type=notif");
?>