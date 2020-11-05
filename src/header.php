<?php include('conn.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>[Dev] Productivity App</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Stylesheets -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/home.css" rel="stylesheet">

	<!-- Scripts -->
	<script src="js/sidebar.js"></script>


	<!-- Favicon -->
	<link rel="icon" href="../resources/favicon.jpg"> <!-- Replace this with the proper icon -->

	<!-- Bootstrap JS, jQuery, and Popper -->
	<script src="js/jquery-3.5.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>


	<?php
	// Stores the user_Name and user_ID
	session_start();
	date_default_timezone_set("Asia/Manila");

	if (
		!isset($_SESSION['user_Name'])
		&& (strcmp($_SERVER['REQUEST_URI'], "/CMSC128/src/landing.php") != 0)
		&& (strcmp($_SERVER['REQUEST_URI'], "/CMSC128/src/login.php") != 0)
		&& (strcmp($_SERVER['REQUEST_URI'], "/CMSC128/src/signup-page.php") != 0)
	) {
		header("Location: landing.php");
	} else if (isset($_SESSION['user_Name'])) {
		$user_Name = $_SESSION['user_Name']; /* you can also access $user_Name on your php as long as you 
											include header.php*/
		$user = $conn->query("SELECT * FROM user WHERE user_Name='$user_Name'")->fetch_assoc();
		$user_ID = $user['user_ID']; /* you can also access $user_ID on your php as long as you 
										include header.php*/
		$user_Theme = $user['user_Theme'];

		// Custom CSS user theme overriding the default ones.
		if (file_exists("css/" . $user_Theme)) {
			echo "<link href='$user_Theme.css' rel='stylesheet'>";
		}
	}
	?>
</head>