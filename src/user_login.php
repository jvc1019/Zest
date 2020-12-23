<?php

include('conn.php');

$username = $_POST['username'];
$password = $_POST['password'];
//for future reference
// $hashed = password_hash($password);
// $sql = "SELECT *  FROM `user` WHERE `user_Name` = $username";

$sql = "SELECT *  FROM `user` WHERE `user_Name` = '" . $username . "';";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$logged = false;

if ($row['user_Name'] == $username && $row['user_Password'] == $password) {
	session_start();
	$_SESSION['user_Name'] = $username;
	$logged = true;
	header("Location:index.php?status_heading=Welcome $username&status=You have succesfully logged in&type=notif");
} else {
	header("Location:login.php?status_heading=Login failed&status=Invalid username or password&type=notif");
}
