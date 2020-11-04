<?php
include('conn.php');

$note_ID = $_GET['note_ID'];

$note_Title = "'" . $_POST['note_Title'] . "'";
$note_Content = !empty($_POST['note_Content']) ? "'" . $_POST['note_Content'] . "'" : "NULL";
$note_Tags = !empty($_POST['note_Tags']) ? "'" . $_POST['note_Tags'] . "'" : "NULL";

$query = "UPDATE `note` 
          SET `note_Title`=$note_Title, 
              `note_Content`=$note_Content, 
              `note_Tags`=$note_Tags
          WHERE `note_ID`=$note_ID";

if (!$conn->query($query)) {
    $status = "Failed to edit note " . $note_Title . ".";
} else {
    $status = "Successfully edited note " . $note_Title . ".";
}

header('Location:notes.php?status=' . $status . "&isNotif=true");
