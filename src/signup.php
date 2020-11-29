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
	$theme = "default";
	$avatar = "default";


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

		$sql = "INSERT INTO user(`user_Name`, `user_Email`, `user_Password`, `user_Desc`, `user_Theme`, `user_Avatar`) VALUES ('$username', '$email', '$password', '$desc', '$theme', '$avatar');";

		//if username is nonexistent
		if ($conn->query($sql)) { 
			session_start();
			$_SESSION['user_Name'] = $username;
			header("Location:index.php?status=Signup successfull. Welcome $username");
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


