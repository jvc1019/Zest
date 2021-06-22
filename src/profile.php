<?php include('header.php'); ?>
<?php include("user_details.php"); ?>
<?php include('notification.php'); ?>

<body class="index-bg">
	<!-- navigation bar -->
	<?php include('sidebar.php'); ?>
	<div class="container-fluid fullpage with-sidebar">
		<div class="row py-2">
			<div class="card profileHolder mx-auto shadow p-3">
				<?php echo "<img src='../resources/avatars/$user_Avatar.jpg' alt='Profile Avatar'>" ?>
				<div class="card-body">
					<h2 class="text-center"><?php echo $user_Name ?></h2>
					<p class="text-center font-italic"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  					<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
					</svg>
					<?php echo $user_Email ?></p>
					<button data-toggle="modal" data-target="#updateProfileModal<?php echo $user['user_ID']; ?>" class="btn btn-sm btn-primary btn-block">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  						<path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
						</svg> Edit Profile
					</button>
					<br>
					<div class="mx-auto text-justify" style="font-style:italic <?php if (empty($user_Desc)) { echo ', color:gray'; }?> ">
						<?php
						if (empty($user_Desc)) {
							$user_Desc = "User has no description.";
						}
						echo $user_Desc;
						?>
					</div><br>
					<div>
	            		<button data-toggle="modal" data-target="#deleteAccountModal<?php echo $user['user_ID']; ?>" class="btn btn-sm btn-danger btn-block">
	                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
	                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
	                    </svg>
	                    Delete Account
	                	</button>
                	</div>
				</div>
			</div>
		</div>
		<?php include("profile_modal.php"); ?>
		<?php include("profile_delete_modal.php"); ?>
		<script>
			spawnNotification();
		</script>
	</div>
</body>