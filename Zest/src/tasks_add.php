<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

<?php
require_once("conn.php");

$whitespace = array(" ", "\t", "\n", "\r", "\0", "\x0B");

$task_Name = "'" . trim(htmlentities($_POST['task_Name'], ENT_QUOTES)) . "'";
$task_Desc = !empty($_POST['task_Desc']) ? "'" . trim(htmlentities($_POST['task_Desc'], ENT_QUOTES)) . "'" : "NULL";
$task_Due = !empty($_POST['task_Due']) ? "'" . $_POST['task_Due'] . "'" : "NULL";
$task_Reminder = !empty($_POST['task_Reminder']) ? "'" . $_POST['task_Reminder'] . "'" : "NULL";
$task_Tags = !empty($_POST['task_Tags']) ? "'" . implode(",", array_unique(explode(",", str_replace($whitespace, "", $_POST['task_Tags'])))) . "'" : "NULL";
$user_ID = is_numeric($_GET['user_ID']) ? $_GET['user_ID'] : "NULL";

$query = "SELECT task_Name FROM task WHERE task_Name=$task_Name AND task.user_ID=$user_ID";

if ($conn->query($query)->num_rows > 0) {
    $status = "Task already exists!";
} else if ($conn->query("SELECT * FROM task WHERE task_isDone=0 AND task.user_ID=$user_ID")->num_rows > 150) {
    // 150 incomplete tasks per user only
    $status = "You can only have up to 150 incomplete tasks at a time. Delete existing tasks and try again.";
} else {
    $query = "INSERT INTO `task` (`task_Name`, `task_Desc`, `task_Due`, `task_Reminder`, `task_Tags`, `user_ID`) VALUES ($task_Name, $task_Desc, $task_Due, $task_Reminder, $task_Tags, $user_ID)";
    if ($conn->query($query)) {
        $status = "Successfully added task.";
    } else {
        $status = "Failed to add task.";
    }
}

header("Location:tasks.php?status_heading=Tasks&status=$status&type=notif");
