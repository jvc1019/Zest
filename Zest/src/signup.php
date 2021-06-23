<?php 

include('conn.php');
$errorMsg = "";
$username = $email = $password = "";

if (isset($_POST['register'])) {

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];
	$desc = "";
	$ints = "";
	$theme = "default";
	$avatar = "default";


	//password minimum length is 8
	if (strlen($password) < 8) {
		?>
		<script>
			spawnNotificationBase("Password Error", "Password should be at least 8 characters", "notif", 0);
		</script>
		<?php
	// password and reentered password should be the same
	} else if ($password !== $re_password) {
		?>
		<script>
			spawnNotificationBase("Password Error", "Passwords does not match", "notif", 0);
		</script>
		<?php
	} else {

		$sql = "INSERT INTO user(`user_Name`, `user_Email`, `user_Password`, `user_Desc`, `user_Ints`, `user_Theme`, `user_Avatar`) VALUES ('$username', '$email', '$password', '$desc', '$ints', '$theme', '$avatar');";

		//if username is nonexistent
		if ($conn->query($sql)) { 
			session_start();
			$_SESSION['user_Name'] = $username;
			header("Location:index.php?status_heading=Welcome $username&status=You have succesfully logged in&type=notif");
		} else {
			?>
				<script>
					spawnNotificationBase("Signup Error", "Username already taken", "alarm", 0);
				</script>
			<?php
		}

	}

}

 ?>


