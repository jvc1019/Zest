<?php
include('conn.php');

$note_ID = $_GET['note_ID'];

$query = "DELETE FROM `note` WHERE `note_ID`='$note_ID'";

if (!$conn->query($query)) {
    $status = "Failed to delete note.";
} else {
    $status = "Successfully deleted note.";
}

header('Location:notes.php?status=' . $status . "&isNotif=true");
