<?php include('header.php'); ?>
<?php    
    if (isset($_SESSION['username'])) {
        header("Location:index.php");
    }
?>
<link href="css/home.css" rel="stylesheet">

<body>
    <!-- navigation bar -->
    <?php include 'navbar.php'; ?>

    <div class="container" id="main">
    	<div class = "row">
    		<div class = "col-md-7 " id="leftbox">
    			<div class="innerLeft">
    				<img class="logo" src="/cmsc128/resources/icons/circle-square.svg"><br>
    				<h4 >This is an example of random words <br>to be added here. It's all about <br> the App we are making.</h4>
    			</div>
    		</div>
    		<div class ="col-md-5" id="rightbox">
    			<div class="innerRight">
	    			<div class=""></div>
	    			<div id="time"></div>
	    			<div id="date"></div>
					<script src="js/clock.js"></script>
					<br><br>
					<h3>Think Positive Bruhhhh</h3>
					<h4>Start using *AppName* tagline</h4><br>
					<a href="login.php"><button class="btn btn-primary" type="button">Log In</button><br><br></a>
					<button class="btn btn-primary" type="button">Sign Up</button>
				</div>
    		</div>
    	</div>

    	</div>
    	






