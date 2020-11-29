<?php include('header.php'); ?>

<body>
    <div class="container-fluid fullpage landing-bg">
        <br><br>
        <div class="row">
            <div class="col-md " id="leftbox">
                <div class="innerLeft">
                    <img class="logo" src="/cmsc128/resources/icons/circle-square.svg"><br>
                    <h4>This is an example of random words <br>to be added here. It's all about <br> the App we are making.</h4>
                </div>
            </div>
            <div class="col-md-1" id="leftbox"></div>
            <div class="col-md-5 login-window">
                <div class="innerRight">
                    <div class="row rounded-bottom rounded-top form-box shadow p-3">
                        <div class="col-md text-center">
                            <div class="form-group rounded-top form-head shadow p-3 sticky-top">
                                <div class="text-right"><a href="help.php?help=need" target="_blank">Need help?</a></div>
                            </div>
                            <div class="rounded-top rounded-bottom form-inner shadow p-3">
                                <br>
                                <form method="POST" action="user_login.php">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Enter username" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-rounded" name="password" placeholder="Enter password" required="">
                                        <a class="forgot" href="help.php?help=forgot" target="_blank">Forgot your password?</a>
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