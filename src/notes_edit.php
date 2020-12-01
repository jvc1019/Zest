<?php
include('conn.php');

$note_ID = $_POST['note_ID'];

$note_Title = "'" . trim(htmlentities($_POST['note_Title'], ENT_QUOTES)) . "'";
$note_Content = !empty($_POST['note_Content']) ? "'" . $_POST['note_Content'] . "'" : "NULL";
$note_Tags = !empty(trim(htmlentities($_POST['note_Tags'], ENT_QUOTES))) ? "'" . implode(",", array_unique(explode(",", str_replace($whitespace, "", trim(htmlentities($_POST['note_Tags'], ENT_QUOTES)))))) . "'" : "NULL";

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
