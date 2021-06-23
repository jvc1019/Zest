<?php include('header.php'); ?>
<?php include('notification.php'); ?>

<body>
    <script>
        spawnNotification();
    </script>
    <div class="container-fluid fullpage landing-bg">
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
                            <br>
                            <form method="POST" action="user_login.php">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Enter username" required="">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-rounded" name="password" placeholder="Enter password" required="">
                                    <a class="forgot" href="recover.php" target="_blank"><br>Forgot your password?</a>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Log In</button>
                                </div>
                            </form>
                        </div>
                        <div class="form-links">
                            <div class="text-gray-dark">Don't have an account yet?</div>
                            <a class="text-light" href="signup-page.php">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
