<?php
$pass = $repass = $oldPass = "";

if(isset($_POST['resetpass'])){                                                                                                                        
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $oldPass = $_POST['oldPass'];
    if ($user['user_Password'] !== $oldPass) {
        ?>               
        <script>
            spawnNotificationBase("Password Error", "The current password you entered does not match our records. Please try again.", "notif", 0);
        </script>
        <?php
    //password minimum length is 8
    } else if (strlen($pass) < 8) {
        ?>               
        <script>
            spawnNotificationBase("Password Error", "Password should be at least 8 characters", "notif", 0);
        </script>
        <?php
        // password and reentered password should be the same
    } else if ($pass!== $repass) {
        ?>
        <script>
            spawnNotificationBase("Password Error", "Passwords does not match", "notif", 0);
        </script>
        <?php
    } else {
        $changeQuery = "UPDATE `user` SET `user_Password`='".$pass."' WHERE `user_Name`='".$user_Name."' AND `user_Email`='".$user_Email."';";
        if(mysqli_query($conn, $changeQuery)){
            $deleteQuery = "DELETE FROM `resetkey` WHERE `user_Name`='".$username."' AND `passkey`='".$key."';";
            mysqli_query($conn, $deleteQuery);   
            ?>                                                     
            <script>                                           
                window.location.href = "login.php?status_heading=Password Change Successful&status=Stay productive.&type=notif";
            </script>                                                                                                       
            <?php
        } else {
            ?>
            <script>
                spawnNotificationBase("Update Error", "An error occured on our part. Please try again.", "notif", 0);
            </script>
            <?php
        }
    }

}

?>

