<div>
	<fieldset>
		<h5>DUE TODAY<h5>
		<table>
			<?php
				$query = "SELECT * FROM task where DATE(task_Due) = CURDATE()";
				$result = $conn->query($query);

				if (!($result->num_rows > 0)) {
	            	echo "<div>No tasks due today.</div>";
	        	} else {
	        		while ($row = $result->fetch_assoc()) {
	        	?>
	        			<tr><td><?php echo $row['task_Name'];?></td></tr><?php
	        		}
	        	}
	        ?>
		</table>
		<h5>DUE TOMORROW<h5>
		<table>
			<?php
				$query = "SELECT * FROM task where DATE(task_Due) = CURDATE() + INTERVAL 1 DAY";
				$result = $conn->query($query);

				if (!($result->num_rows > 0)) {
	            	echo "<div>No tasks due tomorrow.</div>";
	        	} else {
	        		while ($row = $result->fetch_assoc()) {
	        	?>
	        			<tr><td><?php echo $row['task_Name'];?></td></tr><?php
	        		}
	        	}
	        ?>
		</table>
	</fieldset>
</div>