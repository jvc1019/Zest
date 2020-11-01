<?php include('conn.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>[Dev] Student Organizer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Stylesheets -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Favicon -->
	<link rel="icon" href="../resources/favicon.jpg"> <!-- Replace this with the proper icon -->

	<!-- Bootstrap JS, jQuery, and Popper -->
	<script src="js/jquery-3.5.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom CSS user theme overriding the default ones. Also stores the user_ID -->
	<?php
	session_start();
	if (!isset($_SESSION['user_ID'])) {
		// if the username is not set, redirect to login page. 
		// header("Location: loginpage.php");
		/* for testing purposes (assuming the loginpage was not created yet) 
		   you can change the line above to the one below: */
		$user_ID = 1;                        // $user_ID = 1; // superuser
	} else {
		$user_ID = $_SESSION['user_ID']; /* you can also access $user_ID on your php as long as you 
			                                include header.php*/
	}

	$user = $conn->query("SELECT * FROM user WHERE user_ID='$user_ID'")->fetch_assoc();
	$user_Theme = $user['user_Theme'];
	if (file_exists("themes/" . $user_Theme)) {
		echo "<link href='$user_Theme.css' rel='stylesheet'>";
	}
	?>
</head>