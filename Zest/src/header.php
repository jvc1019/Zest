<?php include("conn.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Zest - Work with Productivity</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Stylesheets -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/home.css" rel="stylesheet">
	<link href="css/sidebar.css" rel="stylesheet">
	<link href="css/overrides.css" rel="stylesheet">

	<!-- Favicon -->
	<link rel="icon" href="../resources/icons/lemon-icon.png">

	<!-- Bootstrap JS and jQuery-->
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Scripts -->
	<script src="js/sidebar.js"></script>
	<script src="js/moment.min.js"></script>
	<script>
		$(function() {
			$("[data-toggle='tooltip']").tooltip()
		})
	</script>

	<!-- Setting the default timezone for all PHP date() calls -->
	<?php date_default_timezone_set("Asia/Manila"); ?>
</head>