<?php
$username = $_SESSION['user'];
$key = "";

if(isset($_POST['verifyme'])){
    $key = $_POST['privkey'];
    
    if ($username != $_POST['username']){
        $_SESSION['user'] = $_POST['username'];
    } 
    
    $userQuery = "SELECT * FROM `resetkey` WHERE `user_Name` = '".$username."' AND `passkey`= '".$key."';";
    $result = mysqli_query($conn, $userQuery);
    $row = mysqli_fetch_array($result);


    if (mysqli_num_rows($result)==1){
        // get current time
        $timenow = new DateTime(null, new DateTimeZone('Asia/Taipei')); 
        $expiretime  =$timenow->format('Y-m-d H:i');

        // check expire time 
        if($expiretime<=$row['expire']){
            $_SESSION['key'] = $key;
            header("Location:reset.php");
        } else {
            ?>                                                     
            <script>                                           
                window.location.href = "recover.php?status_heading=Expired Key&status=It appears that your key has expired. Please try again.&type=notif";
            </script>                                                                                                       
            <?php
        // else spawnnotification
    } else {
        ?>
        <script>
            spawnNotificationBase("Record Not Found", "We have not found your private key in our record. Please check your username and key.", "notif", 0);
        </script>
        <?php
    }
}

?>
