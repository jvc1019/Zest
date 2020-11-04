<?php include('header.php'); ?>
<?php include('notification.php') ?>
<link href="css/home.css" rel="stylesheet">


<body>
	<!-- navbar goes here -->
	<div class="container">
		<h1>Login</h1>
		<div class="row">
			<div class="col-lg"></div>
			<div class="col-md-6" >
				hello.
				<div class="row form-bg">
					<div class="col-md form-field"></div>
					<div class="col-md-7 text-center">
						<div class="rounded-top rounded-bottom" style="background-color: pink">
							<form method="POST" action="user_login.php">
								<div class="form-group">
									<div class="text-right">Need help?</div>
								</div>
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
						<div class="text-gray-dark">Don't have an account yet?</div>
						<a class="text-light" href="signup.php">Create an Account</a>
					</div>
				</div>
			</div>
			<div class="col-lg"></div>
		</div>






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