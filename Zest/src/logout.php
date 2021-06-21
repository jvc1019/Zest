<!-- temporary logout -->
<?php 
	session_start();
	session_destroy();
	header('Location: /CMSC128/src/landing.php');
 ?>