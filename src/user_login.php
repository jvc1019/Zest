<?php 

include('conn.php');

$username = $_POST['username'];
$password = $_POST['password'];
//for future reference
// $hashed = password_hash($password);
// $sql = "SELECT *  FROM `user` WHERE `user_Name` = $username";

$sql = "SELECT *  FROM `user` WHERE `user_Name` = '".$username."';";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$logged = false;

if ($row['user_Name'] == $username && $row['user_Password'] == $password) {
	session_start();
	$_SESSION['username'] = $username;
	$logged = true;
	header("Location:index.php");
} else {
	header("Location:login.php?status=Login Error&isNotif=true");
}

?>
