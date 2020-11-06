<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

<?php
include('conn.php');

$task_ID = $_GET['task_ID'];

$task_Name = "'" . $_POST['task_Name'] . "'";
$task_Desc = !empty($_POST['task_Desc']) ? "'" . $_POST['task_Desc'] . "'" : "NULL";
$task_Due = !empty($_POST['task_Due']) ? "'" . $_POST['task_Due'] . "'" : "NULL";
$task_Reminder = !empty($_POST['task_Reminder']) ? "'" . $_POST['task_Reminder'] . "'" : "NULL";
$task_Tags = !empty($_POST['task_Tags']) ? "'" . $_POST['task_Tags'] . "'" : "NULL";

$query = "UPDATE `task` 
          SET `task_Name`=$task_Name, 
              `task_Desc`=$task_Desc, 
              `task_Due`=$task_Due, 
              `task_Reminder`=$task_Reminder,
              `task_Tags`=$task_Tags
          WHERE `task_ID`=$task_ID";

if (!$conn->query($query)) {
    $status = "Failed to edit task " . $task_Name . ".";
} else {
    $status = "Successfully edited task " . $task_Name . ".";
}

header('Location:tasks.php?status=' . $status . "&isNotif=true");
