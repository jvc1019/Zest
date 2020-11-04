<?php include('header.php'); ?>
<?php include('notification.php') ?>

<body>
	<!-- navbar goes here -->
	<div class="container">
		<h1>Login</h1>
		<div class="">
			<form method="POST" action="user_login.php">
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="Enter username" required="">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Enter password" required="">
				</div>
				<div class="form-group">
					<button type="submit" class="btn text-primary">Login</button>
				</div>
			</form>
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