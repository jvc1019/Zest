<?php include('header.php'); ?>
<?php include('notification.php') ?>


<body class="index-bg">
	<!-- navbar goes here -->
	<div class="container">
		<div class="row page-center">
			<div class="col-lg"></div>
			<div class="col-md-8" >
				<div class="row rounded-bottom rounded-top form-box shadow p-3">
					<div class="col-md login-cover rounded-left"></div>
					<div class="col-md-7 text-center">
						<div class="form-group rounded-top form-head shadow p-3 sticky-top">
							<div class="text-right">Need help?</div>
						</div>
						<div class="rounded-top rounded-bottom form-inner shadow p-3">
							<br>
							<form method="POST" action="user_login.php">
								<div class="form-group">
									<input type="text" class="form-control" name="username" placeholder="Enter username" required="">
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-rounded" name="password" placeholder="Enter password" required="">
									<a class="forgot" href="#">Forgot your password?</a>
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit">Log In</button>
								</div>
							</form>
						</div>
						<div class="form-links">
							<div class="text-gray-dark">Don't have an account yet?</div>
							<a class="text-light" href="landing.php">Create an Account</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg"></div>
		</div>





		<!-- modal -->
		<div class="modal fade" id="errorLoginModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Login Error</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<img src="../resources/icons/circle-x-8x.png">
						<h6>Error Login</h6>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">Dismiss</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>