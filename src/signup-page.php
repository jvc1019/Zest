<?php include('header.php'); ?>
<?php include('notification.php'); ?>

<body class="default-bg">
	<!-- navbar goes here -->
	<div class="container-fluid fullpage index-bg">
		<!-- processor for signup form -->
		<?php include('signup.php'); ?>
		<div class="row page-center">
			<div class="col-lg"></div>
			<div class="col-md-8">
				<div class="row rounded-bottom rounded-top form-box shadow p-3">
					<div class="col-md login-cover rounded-left"></div>
					<div class="col-md-7 text-center">
						<div class="form-group rounded-top signup-head shadow p-3 sticky-top">
							<div class="text-right"><a href="help.php?help=need">Need help?</a></div>
						</div>
						<div class="rounded-top rounded-bottom form-inner shadow p-3">
							<br>
							<form method="POST" action="#">
								<div class="form-group">
									<input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo $username; ?>" required="">
								</div>
								<div class="form-group" data-toggle="tooltip" title="username@example.com">
									<input type="text" class="form-control" name="email" placeholder="Enter email address" value="<?php echo $email; ?>" required="">
								</div>
								<div class="form-group" data-toggle="tooltip" data-html="true" title="<b>Password must contain:</b> <br> &#8226 8 characters <br> &#8226 upper and lowercase letters <br> &#8226 at least 1 number <br> &#8226 at least 1 special character">
									<input type="password" class="form-control" name="password" placeholder="Enter password" required="">
								</div>
								<div class="form-group">
									<?php include('notification.php'); ?>
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-rounded" name="re_password" placeholder="Re-enter password" required="">
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit" name="register">Sign Up</button>
								</div>
							</form>
						</div>
						<div class="signup-links">
							<div class="text-gray-dark">Have an account?</div>
							<a class="text-light" href="login.php">Login</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg"></div>
		</div>

		<!-- modal -->
		<div class="modal fade" id="errorSignupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Signup Error</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<img src="../resources/icons/circle-x-8x.png">
						<br>
						<h6><?php echo $errorMsg ?></h6>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Dismiss</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>