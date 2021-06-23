<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$username = $email = "";

if(isset($_POST['sendkey'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    
    $userQuery = "SELECT * FROM `user` WHERE `user_Name` = '".$username."' AND `user_Email`= '".$email."';";
    $result = mysqli_query($conn, $userQuery);
    $row = mysqli_fetch_array($result);


    if (mysqli_num_rows($result)==1){
        $_SESSION['user']=$username;
        $_SESSION['email']=$email;
        // get current time
        $timenow = new DateTime(null, new DateTimeZone('Asia/Taipei')); 
        $timenow->add(new DateInterval('PT30M')); //add 30 mins for expiration of key
        $expiretime  =$timenow->format('Y-m-d H:i');

        // generate private key
        $privatekey = bin2hex(random_bytes(12));
        // insert into database
        $insertQuery = "INSERT INTO `resetkey` (`user_Name`,`passkey`,`expire`) VALUES ('".$row['user_Name']."', '".$privatekey."', '".$expiretime."');";
        $insertRes = mysqli_query($conn, $insertQuery);
        if (!$insertRes){
            ?>                                                     
            <script>                                           
                window.location.href = "recover.php?status_heading=Error&status=Something went wrong on our side. Please try again&type=notif";
            </script>                                                                                                       
            <?php
        }
        // send email
        // email composition
        $mail = new PHPMailer();  
        $mail->IsSMTP();

        $mail->SMTPDebug  = 0;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "zestproductivityapp@gmail.com";
        $mail->Password   = "zestadmin";

        $mail->IsHTML(true);
        $mail->AddAddress($row['user_Email'],$row['user_Name']);
        $mail->SetFrom("zestproductivityapp@gmail.com", "The Zest Team");
        $mail->Subject = "Zest Account Password Recovery";
        $content = "<p>Dear <b>".$row['user_Name']."</b>,</p>";
        $content .= "<p>The following is your private key for you Zest account:</p>";
        $content .= "<p>     Key: <b>".$privatekey."</b></p>";
        $content .= "<p>Copy the key and paste it in the Zest password recovery window. This key will only be valid for 30 minutes until ".$expiretime."</p>";
        $content .= "<br><p>Stay productive,</p>";
        $content .= "<p><b>The Zest Team</b></p>";
        $content .= "<br><br><p><i>This is a system-generated message.</i></p>";

        $mail->MsgHTML($content); 
        // email not sent
        if(!$mail->Send()) {
            ?>                                                     
            <script>                                           
                spawnNotificationBase("Message Error", "An error occured when sending the email. Try again later.", "notif", 0);
            </script>                                                                                                       
            <?php
        // if successful reload to verify
        } else {
            ?>                                                     
            <script>                                           
                window.location.href = "verify_user.php?status_heading=Email Sent&status=Please check your email for the private key&type=notif";
            </script>                                                                                                       
            <?php
        }

        // else spawnnotification
    } else {
        ?>
        <script>
            spawnNotificationBase("Account Not Found", "Please check your username and email.", "notif", 0);
        </script>
        <?php
    }
}


?>
