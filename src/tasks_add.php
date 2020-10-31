<?php
include('conn.php');

$task_Name = "'" . $_POST['task_Name'] . "'";
$task_Desc = !empty($_POST['task_Desc']) ? "'" . $_POST['task_Desc'] . "'" : "NULL";
$task_Due = !empty($_POST['task_Due']) ? "'" . $_POST['task_Due'] . "'" : "NULL";
$task_Reminder = !empty($_POST['task_Reminder']) ? "'" . $_POST['task_Reminder'] . "'" : "NULL";
$task_Tags = !empty($_POST['task_Tags']) ? "'" . $_POST['task_Tags'] . "'" : "NULL";
$user_ID = is_numeric($_POST['user_ID']) ? $_POST['user_ID'] : "NULL";

$query = "INSERT INTO `task` (`task_Name`, `task_Desc`, `task_Due`, `task_Reminder`, `task_Tags`, `user_ID`) VALUES ($task_Name, $task_Desc, $task_Due, $task_Reminder, $task_Tags, $user_ID)";

if (!$conn->query($query)) {
    $status = "Failed to add task " . $task_Name . " (possible duplicate).";
} else {
    $status = "Successfully added task " . $task_Name . ".";
}

header('Location:tasks.php?status=' . $status);
