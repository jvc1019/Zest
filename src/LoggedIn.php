<?php include('header.php'); ?>
<link href="css/home.css" rel="stylesheet">

<body>
    <!-- navigation bar -->
    <?php include 'navbar.php'; ?>

    <div class="container" id="main">
    	<div class = "row">
    		<div class="col-md-12" id="clockHeader">
    			<div id="time"></div>
				<div id="date"></div>
				<script src="js/clock.js"></script>
				<br><br>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-4 hidden-md-down"></div>
    		<div class="col-md-4">
    			<div class="row">
		    		<div class="col-md-4">
		    			<a href="tasks.php">
		    				<div class = "iconholder">
		    					<img class="appIcon" src="/cmsc128/resources/book.svg"><br>
		    					<h6>Subjects</h6>
		    				</div>
		    			</a>
		    		</div>
		    		<div class="col-md-4">
		    			<a href="tasks.php">
		    				<div class = "iconholder">
		    					<img class="appIcon" src="/cmsc128/resources/checklist.svg"><br>
		    					<h6>Task</h6>
		    				</div>
		    			</a>
		    		</div>
		    		<div class="col-md-4">
		    			<a href="tasks.php">
		    				<div class = "iconholder">
		    					<img class="appIcon" src="/cmsc128/resources/notebook.svg"><br>
		    					<h6>Notebook</h6>
		    				</div>
		    			</a>
		    		</div>
    			</div>
    		</div>
    		<div class="col-md-4 hidden-md-down"></div>
    	</div>
    </div>

    	






