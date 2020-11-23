<?php include('header.php');
include('user_details.php'); ?>

<!-- <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Notebook editor</title>
		<script src="ckeditor/ckeditor.js"></script>
	</head> -->

<body>
	<center>
		<h1 style="padding: 20px"> Notes <h1>
	</center>

	<div class="container">
		<form method="post" action="notes_add.php" id="#addnote" enctype="multipart/form-data">

			<!-- TITLE AND TAG TEXTBOXES -->
			<div class="row mx-5 px-4 justify-content-center">
				<input class="mr-2" type="text" name="note_Title" placeholder="Note Title" required>
				<input class="ml-0" type=" text" name="note_Tags" placeholder="Tags (separated by a comma)">
			</div>

			<!-- RICHTEXT EDITOR -->
			<div class="row justify-content-center my-1">
				<?php include("texteditor/text_editor.php"); ?>
			</div>
			<input type="hidden" name="user_ID" value="<?php echo (isset($user_ID) ? $user_ID : ''); ?>" />

			<div class="row justify-content-center my-1">
				<button type="button" class="btn btn-sm text-secondary" name="cancel" value="cancel" onClick="window.location.href='notes.php';">Cancel</button>
				<button type="submit" name="submit" class="btn btn-sm text-primary">Save</button>
			</div>
		</form>
		<div>

</body>

</html>