<?php
include('conn.php');

$task_ID = $_GET['task_ID'];

$task_Name = $_POST['task_Name'];
$task_Desc = isset($_POST['task_Desc']) ? $_POST['task_Desc'] : null;
$task_Due = isset($_POST['task_Due']) ? $_POST['task_Due'] : null;
$task_Reminder_Date = isset($_POST['task_Reminder_Date']) ? $_POST['task_Reminder_Date'] : null;
$task_Reminder_Time = isset($_POST['task_Reminder_Time']) ? $_POST['task_Reminder_Time'] : null;
$task_Tags = isset($_POST['task_Tags']) ? $_POST['task_Tags'] : null;

$query = "UPDATE task 
          SET task_Name='$task_Name', 
              task_Desc='$task_Desc', 
              task_Due='$task_Due', 
              task_Reminder_Date='$task_Reminder_Date',
              task_Reminder_Time='$task_Reminder_Time',
              task_Tags='$task_Tags' 
          WHERE task_ID='$task_ID'";

if (!$conn->query($query)) {
    echo '<script>';
    echo 'alert("Failed to edit task: Possible duplicate.")';
    echo '</script>';
} else {
    echo '<script>';
    echo 'Successfuly edited task.';
    echo '</script>';
}

header('Location:tasks.php');
