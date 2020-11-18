<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

<?php
include('conn.php');

$whitespace = array(" ", "\t", "\n", "\r", "\0", "\x0B");

$task_Name = "'" . trim($_POST['task_Name']) . "'";
$task_Desc = !empty($_POST['task_Desc']) ? "'" . trim($_POST['task_Desc']) . "'" : "NULL";
$task_Due = !empty($_POST['task_Due']) ? "'" . $_POST['task_Due'] . "'" : "NULL";
$task_Reminder = !empty($_POST['task_Reminder']) ? "'" . $_POST['task_Reminder'] . "'" : "NULL";
$task_Tags = !empty($_POST['task_Tags']) ? "'" . implode(",", array_unique(explode(",", str_replace($whitespace, "", $_POST['task_Tags'])), SORT_STRING)) . "'" : "NULL";
$user_ID = is_numeric($_GET['user_ID']) ? $_GET['user_ID'] : "NULL";

$query = "SELECT task_Name FROM task WHERE task_Name=$task_Name AND task.user_ID=$user_ID";

if ($conn->query($query)->num_rows > 0) {
    $status = "$task_Name already exists!";
} else if ($conn->query("SELECT * FROM task WHERE task.user_ID=$user_ID")->num_rows > 500) {
    // 500 tasks per user only
    $status = "Task limit has been reached. Delete existing tasks and try again.";
} else {
    $query = "INSERT INTO `task` (`task_Name`, `task_Desc`, `task_Due`, `task_Reminder`, `task_Tags`, `user_ID`) VALUES ($task_Name, $task_Desc, $task_Due, $task_Reminder, $task_Tags, $user_ID)";
    if ($conn->query($query)) {
        $status = "Successfully added task $task_Name.";
    } else {
        $status = "Failed to add task.";
    }
}

header("Location:tasks.php?status_heading=Tasks&status=$status&isNotif=true");
