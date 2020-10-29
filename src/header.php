<?php include('conn.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>[Dev] Student Organizer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Stylesheets -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">

	<!-- Custom stylesheet overriding the default ones -->
	<?php
	$user_ID = isset($_POST['user_ID']) ? $_POST['user_ID'] : 001;
	$user = $conn->query("SELECT * FROM user WHERE user_ID='$user_ID'")->fetch_assoc();
	$theme = $user['user_Theme'];
	if (file_exists("themes/" . $theme)) {
		echo "<link href='$theme.css' rel='stylesheet'>";
	}
	?>

	<!-- Favicon -->
	<link rel="icon" href="./CMSC128/resources/favicon.jpg">

	<!-- Bootstrap JS, jQuery, and Popper -->
	<script src="js/jquery-3.5.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>