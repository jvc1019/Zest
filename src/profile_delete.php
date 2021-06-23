<?php
    session_start();

    include("conn.php");

    $ID = $_POST['userID'];
    $RePass = $_POST['verifyPass'];

    $user = $conn->query("SELECT * FROM user WHERE user_ID='$ID'")->fetch_assoc();
    $user_Password = $user['user_Password'];

    if ($user_Password == $RePass){
        $sqlDelete = "DELETE FROM `user` WHERE `user_ID`='$ID'";
    	$conn->query($sqlDelete);
        
        session_destroy();
        header("Location:landing.php?status_heading=Account Deleted&status=You have permanently deleted your account&type=notif");
    }else{
        header('location:profile.php?help=change&status_heading=Account Not Deleted&status=Password is incorrect&type=notif');
    }
?>