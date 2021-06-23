<?php
$pass = $repass = "";

if(isset($_POST['resetpass'])){                                                                                                                        
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    
    //password minimum length is 8
    if (strlen($pass) < 8) {
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
        $changeQuery = "UPDATE `user` SET `user_Password`='".$pass."' WHERE `user_Name`='".$username."' AND `user_Email`='".$email."';";
        if(mysqli_query($conn, $changeQuery)){
            $deleteQuery = "DELETE FROM `resetkey` WHERE `user_Name`='".$username."' AND `passkey`='".$key."';";
            mysqli_query($conn, $deleteQuery);   
            ?>                                                     
            <script>                                           
                window.location.href = "login.php?status_heading=Password Reset Successful&status=You can now try to login on your account. Stay productive.&type=notif";
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

