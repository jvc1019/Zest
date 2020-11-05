<?php
include('conn.php');

$note_Title = "'" . $_POST['note_Title'] . "'";
$note_Content = !empty($_POST['note_Content']) ? "'" . $_POST['note_Content'] . "'" : "NULL";
$note_Tags = !empty($_POST['note_Tags']) ? "'" . $_POST['note_Tags'] . "'" : "NULL";
$user_ID = is_numeric($_POST['user_ID']) ? $_POST['user_ID'] : "NULL";

$query = "INSERT INTO `note` (`note_Title`, `note_Content`, `note_Tags`, `user_ID`) VALUES ($note_Title, $note_Content, $note_Tags, $user_ID)";

if (!$conn->query($query)) {
    $status = "Failed to add note " . $note_Title . " (possible duplicate).";
} else {
    $status = "Successfully added note " . $note_Title . ".";
}

header('Location:notes.php?status=' . $status . "&isNotif=true");
