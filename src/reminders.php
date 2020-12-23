<div>
	<div class="reminderHolder">
		<h4 class="text-light border-light border-bottom">Due today</h4>

		<ul class="list-group">
			<?php
			$query = "SELECT * FROM task WHERE user_ID = $user_ID AND DATE(task_Due) = CURDATE() ORDER BY task_Due";
			$result = $conn->query($query);
			$count = 0;

			if (!($result->num_rows > 0)) {
				echo "<div class='text-light'>No tasks due today.</div>";
			} else {
				while ($row = $result->fetch_assoc()) {
					$name = html_entity_decode($row['task_Name'], ENT_QUOTES);
			?>
					<li class="list-group-item">
						<h6 class="text-truncate"><?php echo $name; ?></h6>
						<?php echo date("g:i A", strtotime($row['task_Due'])); ?>
						<!-- dot/divider icon -->
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dot" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
						</svg>
						<script>
							var time = "<?php echo date("g:i A", strtotime($row['task_Due'])); ?>";
							document.write(moment(time, "h:mm A").fromNow());
						</script>
					</li>
			<?php
					$count++;

					if ($count > 3) {
						echo "<a class='text-light text-center' href='tasks.php'>See More...</a>";
						break;
					}
				}
			}
			?>
		</ul>
	</div>
	<br>
	<div class="reminderHolder">
		<h4 class="text-light border-light border-bottom">Due tomorrow</h4>

		<ul class="list-group">
			<?php
			$query = "SELECT * FROM task WHERE user_ID = $user_ID AND DATE(task_Due) = CURDATE() + INTERVAL 1 DAY ORDER BY task_Due";
			$result = $conn->query($query);
			$count = 0;

			if (!($result->num_rows > 0)) {
				echo "<div class='text-light'>No tasks due tomorrow.</div>";
			} else {
				while ($row = $result->fetch_assoc()) {
					$name = html_entity_decode($row['task_Name'], ENT_QUOTES);
			?>
					<li class="list-group-item">
						<h6 class="text-truncate"><?php echo $name; ?></h6>
						<?php echo date("g:i A", strtotime($row['task_Due'])); ?>
						<!-- dot/divider icon -->
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dot" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
						</svg>
						Tomorrow
						<script>
							var time = "<?php echo date("g:i A", strtotime($row['task_Due'])); ?>";
						</script>
					</li>
			<?php
					$count++;

					if ($count > 3) {
						echo "<a class='text-light text-center' href='tasks.php'>See More...</a>";
						break;
					}
				}
			}
			?>
		</ul>
	</div>
</div>