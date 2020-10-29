<?php
include('conn.php');

$task_ID = $_GET['task_ID'];
$task_isChecked = $_GET['task_isChecked'];

// if the task was checked, then upon clicking, it is unchecked or set as incomplete. task_isDone = 0
// else it is set as completed, task_isDone = 1

if ($task_isChecked === "true") {
        $query = "UPDATE task SET task_isDone=0 WHERE task_ID='$task_ID'";
} else {
        $query = "UPDATE task SET task_isDone=1 WHERE task_ID='$task_ID'";
}

$conn->query($query);

header("Location:tasks.php");
