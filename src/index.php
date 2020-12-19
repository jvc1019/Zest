<?php
include("header.php");
include("user_details.php");
include("notification.php");
?>

<body class="index-bg">
	<?php include("logout_modal.php");?>
	<?php include("sidebar.php") ?>
	<div class="container-fluid py-5 fullpage with-sidebar">
		<div class="row">
			<div class="col-sm-6 px-5 py-4">
				<h2 class="text-light text-center">Hey there, <?php echo $user_Name; ?>!</h2>
				<h5 class="text-light text-center">What do you want to do today?</h5><br>
				<h5 class="text-center">
					<a href="profile.php" class="btn btn-sm btn-light mr-1">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
						</svg>
						My Profile
					</a>
					<a href="#logoutModal" data-toggle="modal" class="btn btn-sm btn-danger">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-closed-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M4 1a1 1 0 0 0-1 1v13H1.5a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2a1 1 0 0 0-1-1H4zm2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
						</svg>
						Logout
					</a>
				</h5>
				<div class="card-deck mt-5">
					<div class="card shadow text-center applink" data-toggle="tooltip" title="Organize your subjects">
						<div class="card-body">
							<svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-book-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M8.5 2.687v9.746c.935-.53 2.12-.603 3.213-.493 1.18.12 2.37.461 3.287.811V2.828c-.885-.37-2.154-.769-3.388-.893-1.33-.134-2.458.063-3.112.752zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
							</svg>
							<h6 class="my-2">Subjects</h6>
							<a class="stretched-link" href="subjects.php"></a>
						</div>
					</div>
					<div class="card shadow text-center applink" data-toggle="tooltip" title="Keep track of your day">
						<div class="card-body">
							<svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-ui-checks" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
								<path fill-rule="evenodd" d="M2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646l2-2a.5.5 0 1 0-.708-.708L2.5 4.293l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0zm0 8l2-2a.5.5 0 0 0-.708-.708L2.5 12.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0z" />
								<path d="M7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
								<path fill-rule="evenodd" d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
							</svg>
							<h6 class="my-2">Tasks</h6>
							<a class="stretched-link" href="tasks.php"></a>
						</div>
					</div>
					<div class="card shadow text-center applink" data-toggle="tooltip" title="Take note of your thoughts">
						<div class="card-body">
							<svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
								<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
								<path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
							</svg>
							<h6 class="my-2">Notes</h6>
							<a class="stretched-link" href="notes.php"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 px-5 py-3">
				<div class="card-body applink">
					<h1 class="text-light" id="time"></h1>
					<p class="text-light" id="date"></p>
					<script>
						spawnNotification();
						
						function setTime() {
							$("#time").text(moment().format("h:mm A"));
							$("#date").text(moment().format("dddd, MMMM DD YYYY"));
						}

						setTime();
						setInterval(setTime, 1000);
					</script>
					<br>
					<?php include("reminders.php"); ?>
				</div>
			</div>

		</div>
	</div>
</body>