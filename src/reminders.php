<div>
	<fieldset class="reminderholder">
		<h5 class="remindTitle">DUE TODAY<h5>
		<table>
			<?php
				$query = "SELECT * FROM task where DATE(task_Due) = CURDATE()";
				$result = $conn->query($query);

				if (!($result->num_rows > 0)) {
	            	echo "<div class='notasksdue'>No tasks due today.</div>";
	        	} else {
	        		while ($row = $result->fetch_assoc()) {
	        			if (intval(substr($row['task_Due'], 11, 2)) < 10){
	        				$time = " " . substr($row['task_Due'], 12, 4) . " A.M.";
	        			}
	        			else if (intval(substr($row['task_Due'], 11, 2)) == 12){
	        				$time = substr($row['task_Due'], 11, 5) . " P.M.";
						}
						else if (intval(substr($row['task_Due'], 11, 2)) > 12){
	        				$time = (intval(substr($row['task_Due'], 11, 2)) - 12);
	        				if ($time < 10){
	        					$time = " " . substr($time, 1) . substr($row['task_Due'], 13, 3) . " P.M.";
	        				}
	        				else{
	        					$time = (string)$time . substr($row['task_Due'], 13, 3) . " P.M.";
	        				}
						}
						else{
							$time = substr($row['task_Due'], 11, 5) . " A.M.";
						}
	        		?>
	        		<tr><td><a href="tasks.php"><div class="remindText"> - <?php echo $row['task_Name'];?></div></a></td><td><div class="remindText"><?php echo $time?></div></td></tr>
	        		<?php
	        		}
	        	}       	
	        ?>
		</table>
	</fieldset>
	<br>
	<fieldset class="reminderholder">
		<h5 class="remindTitle">DUE TOMORROW<h5>
		<table>
			<?php
				$query = "SELECT * FROM task where DATE(task_Due) = CURDATE() + INTERVAL 1 DAY";
				$result = $conn->query($query);

				if (!($result->num_rows > 0)) {
	            	echo "<div class='notasksdue'>No tasks due tomorrow.</div>";
	        	} else {
	        		while ($row = $result->fetch_assoc()) {
	        			if (intval(substr($row['task_Due'], 11, 2)) < 10){
	        				$time = " " . substr($row['task_Due'], 12, 4) . " A.M.";
	        			}
	        			else if (intval(substr($row['task_Due'], 11, 2)) == 12){
	        				$time = substr($row['task_Due'], 11, 5) . " P.M.";
						}
						else if (intval(substr($row['task_Due'], 11, 2)) > 12){
	        				$time = (intval(substr($row['task_Due'], 11, 2)) - 12);
	        				if ($time < 10){
	        					$time = " " . substr($time, 1) . substr($row['task_Due'], 13, 3) . " P.M.";
	        				}
	        				else{
	        					$time = (string)$time . substr($row['task_Due'], 13, 3) . " P.M.";
	        				}
						}
						else{
							$time = substr($row['task_Due'], 11, 5) . " A.M.";
						}
	        		?>
	        		<tr><td><a href="tasks.php"><div class="remindText"> - <?php echo $row['task_Name'];?></div></a></td><td><div class="remindText"><?php echo $time?></div></td></tr>
	        		<?php
	        		}
	        	}       	
	        ?>
		</table>
	</fieldset>
</div>