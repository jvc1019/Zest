<?php include('conn.php'); ?>
<?php include('header.php'); ?>
<?php include('notification.php'); ?>
<?php
//php file for resetting the password in the database
//
session_start();
$username = $_SESSION['user'];
$key = $_SESSION['key'];
$email = $_SESSION['email'];
?>
<body>
    <script>
        spawnNotification();
    </script>
    <div class="container-fluid fullpage landing-bg">
        <?php include('resetter.php'); ?>
        <div class="row">
            <div class="col-sm-6 p-5">
                <div class="p-5 my-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="../resources/icons/lemon-icon.png" class="img-fluid title-img">
                        </div>
                        <div class="col-sm-6">
                            <br><br>
                            <h1 class="text-light title my-0">Zest</h1>
                            <h4 class="text-light">Work + Productivity</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 p-5">
               <div class="row rounded form-box shadow mx-5">
                    <div class="col-md text-center">
                        <div class="form-group rounded-top form-head shadow p-3 sticky-top">
                            <div class="text-right"><a href="help.php?help=help" target="_blank">Need help?</a></div> 
                        </div>
                        <div class="rounded-top rounded-bottom form-inner shadow p-3">
                            <div>
                                <h4>New Password</h4>
                                <p>Please enter your new password.</p>
                            </div>
                            <form method="POST" action="#">
                                <div class="form-group">
                                <input type="text" class="form-control" name="pass" placeholder="Enter new password" required="">
                                </div>
                                
                                <div class="form-group" data-toggle="tooltip" data-html="true" title="Password must contain at least 8 characters">
                                    <input type="text" class="form-control form-rounded" name="repass" placeholder="Re-enter new password" required="">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit" name="resetpass">Reset My Password</button>
                                </div>
                                <div class="form-group">
                                    <a class="forgot" href="login.php" ><br>Login to my account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

