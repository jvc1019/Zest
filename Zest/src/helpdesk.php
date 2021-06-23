<?php include('header.php'); ?>
<?php include('notification.php'); ?>
<?php
	session_start();

	if($_GET){
		$_SESSION['default'] = $_GET['help'];
	} 
	if(!$_GET){
		$_SESSION['default'] ='help';
	} 
	;
?>

<body class="help-bg">
	<nav class="navbar fixed-top navbar-dark bg-dark">
  		<a class="navbar-brand" href="../src">
			<img src="../resources/icons/lemon-icon.png" width="30" height="30" class="d-inline-block align-top">  ZEST 
  		</a>
	</nav>
	<div class="container-fluid">
		<div id="carousel" class="carousel slide" data-ride="carousel">
	  		<div class="carousel-inner">
	   		 	<div class="carousel-item active">
	      			<img src="/Zest/resources/bg/solid.jpg" alt="First slide">
	    		</div>
	    		<div class="carousel-item">
	      			<img src="/Zest/resources/bg/study.jpg" alt="Second slide">
	    		</div>
	    		<div class="carousel-item">
	      			<img src="/Zest/resources/bg/default.jpg" alt="Third slide">
	    		</div>
	  		</div>
		</div>
	</div>

	
		<script>
			spawnNotification()
		</script>
	</div>
</body>