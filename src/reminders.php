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
	        	?>
	        		<tr><td><a href="tasks.php"><pre class="remindText"> - <?php echo $row['task_Name'];?>	<?php echo $row['task_Due'];?></pre></a></td></tr>
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
	        	?>
	        		<tr><td><a href="tasks.php"><pre class="remindText"> - <?php echo $row['task_Name'];?>	<?php echo $row['task_Due'];?></pre></a></td></tr>
	        		<?php
	        		}
	        	}
	        ?>
		</table>
	</fieldset>
</div>