<?php
$query = "SELECT task_Tags FROM task WHERE task.user_ID=$user_ID AND task_Tags IS NOT NULL";
$all_tasks = $conn->query($query);

$task_Tags = array();

if ($all_tasks->num_rows > 0) {
    while ($row = $all_tasks->fetch_assoc()) {
        $_tag = !empty(explode(",", $row["task_Tags"])) ? explode(",", $row["task_Tags"]) : $row["task_Tags"];
        $task_Tags = array_merge($task_Tags, $_tag);
    }
    // TODO: Sort the array by appearance
    $valueCount = array_count_values($task_Tags);
    usort($task_Tags, function ($a, $b) use ($valueCount) {
        return $valueCount[$b] - $valueCount[$a];
    });

    $task_Tags_Intersect = array_unique($task_Tags);
?>
    <hr>
    <div class="row">
        <div class="col-sm-10 text-left">
            <?php
            $count = 0;
            foreach ($task_Tags_Intersect as $value) {
                if ($count > 9) {
                    break;
                } ?>
                <a href="tasks.php?tag=<?php echo $value; ?>" class="badge">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 2v4.586l7 7L13.586 9l-7-7H2zM1 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2z" />
                        <path fill-rule="evenodd" d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                    </svg>
                    <?php echo $value; ?>
                </a>
            <?php
                $count++;
            }
            ?>
        </div>
        <div class="col-sm-2 text-right">
            <a href="#tags" data-toggle="modal" class="btn text-primary btn-sm">
                All tags
            </a>
        </div>
    </div>
<?php
}
?>