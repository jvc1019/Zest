<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

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

if (!$conn->query($query)) {
        if ($task_isChecked === "true") {
                $status = "Failed to mark task as incomplete.";
        } else {
                $status = "Failed to mark task as complete.";
        }
} else {
        $query = "SELECT * FROM task WHERE task_ID='$task_ID'";
        $task_Name = ($conn->query($query)->fetch_assoc())['task_Name'];

        if ($task_isChecked === "true") {
                $status = " has been marked as incomplete.";
        } else {
                $status = " has been marked as completed.";
        }
}

header("Location:tasks.php?status_heading=\"" . $task_Name . "\"&status=" . $status . "&isNotif=true");
