<?php 

include('conn.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];

//check if password and re-entered password are the same
if ($password !== $re_password) {
	header("Location: landing.php?status=Password doesn't match&isNotif=true");
} else {

	$sql = "INSERT INTO user(`user_Name`, `user_Email`, `user_Password`) VALUES ('$username', '$email', '$password');";

	if (mysqli_query($conn, $sql)) {
		session_start();
		$_SESSION['user_Name'] = $username;
		header("Location:index.php?status=Signup successfull. Welcome $username");
	} else {
		header("Location:login.php?status=Signup Error&isNotif=true");
	}

}


 ?>
