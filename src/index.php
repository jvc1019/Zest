<?php include('header.php'); ?>
<?php include('notification.php'); ?>

<body class="index-bg">
	<!-- navigation bar -->
	<?php include('navbar.php'); ?>

	<div class="container" id="main">
		<div class="row">
			<div class="col-md-6" id="mainHeader">
				<div class="row">
					<div class="col-md-10" id="clockHeader">
						<div id="time"></div>
						<div id="date"></div>
						<script src="js/clock.js"></script>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1 col-lg hidden-md-down"></div>
					<div class="col-md-9 col-lg-9">
						<div class="row">
							<div class="col-md-3" data-toggle="tooltip" title="Organize your Subjects">
								<a href="subjects.php">
									<div class="iconholder">
										<img class="appIcon" src="/cmsc128/resources/icons/book-half.svg"><br>
										<h6>Subjects</h6>
									</div>
								</a>
							</div>
							<div class="col-md-3" data-toggle="tooltip" title="Keep Track of your Activities">
								<a href="tasks.php">
									<div class="iconholder">
										<img class="appIcon" src="/cmsc128/resources/icons/ui-checks.svg"><br>
										<h6>Tasks</h6>
									</div>
								</a>
							</div>
							<div class="col-md-3" data-toggle="tooltip" title="Take Note of your Thoughts">
								<a href="notes.php">
									<div class="iconholder">
										<img class="appIcon" src="/cmsc128/resources/icons/journal-text.svg"><br>
										<h6>Notebook</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-lg hidden-md-down"></div>
				</div>
			</div>
			<div class="col-md-6" id="reminderHeader">
				<?php include("reminders.php"); ?>
			</div>
		</div>
	</div>
	<script>
		// Enable all tooltips
		$(function() {
			$("[data-toggle='tooltip']").tooltip()
		})
	</script>
</body>