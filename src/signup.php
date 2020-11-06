<?php 

include('conn.php');
$errorMsg = "";
$username = $email = $password = "";

if (isset($_POST['register'])) {

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];

	//check if password and re-entered password are the same
	if ($password !== $re_password) {
		$errorMsg = "Password doesn't match";
		?>
		<script>
			 $(document).ready(function(){
				$("#errorSignupModal").modal("show");
			});
		</script>
		<?php
	} else {

		$sql = "SELECT * FROM user WHERE `user_Name` = '$username';";

		//if username is nonexistent
		if (! mysqli_query($conn, $sql)) { 
			
			$sql = "INSERT INTO user(`user_Name`, `user_Email`, `user_Password`) VALUES ('$username', '$email', '$password');";

			if (mysqli_query($conn, $sql)) {
				session_start();
				$_SESSION['user_Name'] = $username;
				header("Location:index.php?status=Signup successfull. Welcome $username");
			}
		} else {
			$errorMsg = "Username already taken.";
			?>
				<script>
					 $(document).ready(function(){
						$("#errorSignupModal").modal("show");
					});
				</script>
			<?php
		}

	}

}

 ?>


