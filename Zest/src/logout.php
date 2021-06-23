<!-- temporary logout -->
<?php 
	session_start();
	session_destroy();
	header('Location: /Zest/src/landing.php');
 ?>