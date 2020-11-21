<?php include('header.php'); ?>
<?php include('notification.php'); ?>

<body class="index-bg">
	<!-- navigation bar -->
	<?php include('navbar.php'); ?>

	<div class="container" id="main">
		<div class="row">
			<div class="col-md-12" id="clockHeader">
				<div id="time"></div>
				<div id="date"></div>
				<script src="js/clock.js"></script>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" id="reminderHeader">
				<?php include("reminders.php"); ?>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-lg hidden-md-down"></div>
			<div class="col-md-6 col-lg-4">
				<div class="row">
					<div class="col-md-4">
						<a href="subjects.php">
							<div class="iconholder">
								<img class="appIcon" src="/cmsc128/resources/icons/book-half.svg"><br>
								<h6>Subjects</h6>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="tasks.php">
							<div class="iconholder">
								<img class="appIcon" src="/cmsc128/resources/icons/ui-checks.svg"><br>
								<h6>Task</h6>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="notes.php">
							<div class="iconholder">
								<img class="appIcon" src="/cmsc128/resources/icons/journal-text.svg"><br>
								<h6>Notebook</h6>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-lg hidden-md-down"></div>
		</div>
	</div>