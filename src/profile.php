<?php include('header.php'); ?>
<?php include("user_details.php") ?>
<?php include('notification.php'); ?>

<body class="index-bg">
	<!-- navigation bar -->
	<?php include('navbar.php'); ?>

	<div class="container" id="main">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-4 profileHolder">
				<h3>USER PROFILE</h3>
				<!-- <button class="edit" data-toggle="tooltip" title="Edit your User Profile">Edit</button>
				<br><br> -->
				<img class="profilePic" src="/cmsc128/resources/profile.jpg">
				<br><br>
				<div class="profileTitle"> Username:</div>
				<div class="profileText"><?php echo $user_Name ?></div>
				<div class="profileTitle"> Email:</div>
				<div class="profileText"><?php echo $user_Email ?></div>
				<br>
				<div class="profileTitle description">Description</div>
				<?php
					if ($user_Desc == ""){
						$user_Desc = "<div style='color:gray'>User has no description.</div>";
					}
				?>
				<div class="profileText description"><?php echo $user_Desc ?></div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<script>
		// Enable all tooltips
		$(function() {
			$("[data-toggle='tooltip']").tooltip()
		})
	</script>
</body>