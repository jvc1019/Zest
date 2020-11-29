<?php include('header.php'); ?>
<?php include("user_details.php") ?>
<?php include('notification.php'); ?>

<body>
	<!-- navigation bar -->
	<?php include('sidebar.php'); ?>

	<div class="container-fluid fullpage with-sidebar index-bg">
		<div class="row py-5">
			<div class="card profileHolder mx-auto">
				<?php echo "<img class='card-img-top' src='/cmsc128/resources/avatars/$user_Avatar.jpg'>" ?>
				<div class="card-body">
					<h2 class="text-center"><?php echo $user_Name ?></h2>
					<p class="text-center"><?php echo $user_Email ?></p>
					<?php
					if (empty($user_Desc)) {
						$user_Desc = "<div style='color:gray'>User has no description.</div>";
					}
					?>
					<?php echo $user_Desc ?>
					<button data-toggle="modal" data-target="#updateProfileModal<?php echo $user['user_ID']; ?>" class="btn btn-sm btn-primary btn-block">Edit Profile</button>
				</div>

			</div>
		</div>
		<?php include("profile_modal.php"); ?>
	</div>
</body>