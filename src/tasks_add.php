<?php
include('conn.php');

$task_Name = $_POST['task_Name'];
$task_Desc = isset($_POST['task_Desc']) ? $_POST['task_Desc'] : null;
$task_Due = isset($_POST['task_Due']) ? $_POST['task_Tags'] : null;
$task_Tags = isset($_POST['task_Tags']) ? $_POST['task_Tags'] : null;

$query = "INSERT INTO task (task_Name, task_Desc, task_Due, task_Tags) VALUES ('$task_Name', '$task_Desc', '$task_Due', '$task_Tags')";

if (!$conn->query($query)) {
    echo '<script>';
    echo 'alert("Failed to add task: Possible duplicate.")';
    echo '</script>';
} else {
    echo '<script>';
    echo 'Successfuly added task.")';
    echo '</script>';
}

header('Location:tasks.php');
