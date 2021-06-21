<?php
    session_start();

    include("conn.php");

    $ID = $_POST['userID'];

    $sqlDelete = "DELETE FROM `user` WHERE `user_ID`='$ID'";
    $conn->query($sqlDelete);

    header("Location:landing.php?status_heading=Account Deleted&status=You have permanently deleted your account&type=notif");
?>