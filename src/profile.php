<?php include('header.php'); ?>
<?php include("user_details.php") ?>
<?php include('notification.php'); ?>

<body class="index-bg">
	<!-- navigation bar -->
	<?php include('sidebar.php'); ?>
	<div class="container-fluid fullpage with-sidebar">
		<div class="row py-5">
			<div class="card profileHolder mx-auto">
				<?php echo "<img class='card-img-top' src='/cmsc128/resources/avatars/$user_Avatar.jpg'>" ?>
				<div class="card-body">
					<h2 class="text-center"><?php echo $user_Name ?></h2>
					<p class="text-center font-italic"><?php echo $user_Email ?></p>
					<button data-toggle="modal" data-target="#updateProfileModal<?php echo $user['user_ID']; ?>" class="btn btn-sm btn-primary btn-block">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  						<path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
						</svg> Edit Profile
					</button>
					<br>
					<div>
						<?php
						if (empty($user_Desc)) {
							$user_Desc = "<div style='color:gray'>User has no description.</div>";
						}
						echo $user_Desc;
						?>
					</div>
				</div>
			</div>
		</div>
		<?php include("profile_modal.php"); ?>
		<script>
			spawnNotification();
		</script>
	</div>
</body>