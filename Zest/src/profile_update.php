<?php
    session_start();

    include("conn.php");

    $ID = $_POST['userID'];
    $Name = $_POST ["userName"];
    $Email = $_POST ["userEmail"];
    $Desc = $_POST ["userDesc"];
    $Theme = $_POST ['userTheme'];
    $Avatar = $_POST ['userAvatar'];

    if (!empty($_POST['userInts'])){
        $Ints = "";
        foreach ($_POST['userInts'] as $userInts){
            $Ints = $Ints.$userInts;
        }
    } else {
        $Ints = null;
    }

    $sqlUpdate = "UPDATE `user` SET `user_Name`='$Name', `user_Email`='$Email', `user_Desc`='$Desc', `user_Ints`='$Ints', `user_Theme`='$Theme', `user_Avatar`='$Avatar' WHERE `user`.`user_ID`='$ID'";
    $conn->query($sqlUpdate);

    $_SESSION['user_Name'] = $Name;

    header("Location:profile.php?status_heading=Profile Updated&status=You have succesfully updated your profile, $Name&type=notif");
?>