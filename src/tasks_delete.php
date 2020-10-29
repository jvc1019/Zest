<?php
include('conn.php');

$task_ID = $_GET['task_ID'];

$query = "DELETE FROM task WHERE task_ID='$task_ID'";

if (!$conn->query($query)) {
    echo '<script>';
    echo 'alert("Failed to delete task!")';
    echo '</script>';
} else {
    echo '<script>';
    echo 'Successfuly deleted task.")';
    echo '</script>';
}

header('Location:tasks.php');
