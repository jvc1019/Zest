<?php include('header.php'); ?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Notebook editor</title>
		<script src="ckeditor/ckeditor.js"></script>
	</head>


	<body>
		<center><h1 style="padding: 20px"> Note <h1></center>

		<div class="container">
			<form method="post" action="notes_add.php">

				<!-- TITLE AND TAG TEXTBOXES -->
				<div class="row mx-5 px-4 justify-content-between">
					<textarea name="title" id="note_Title" placeholder="Note Title"></textarea> <!-- please change title holder-->
					<textarea name="tags" id="note_Tags" placeholder="Tags"></textarea>
				</div>

				<!-- RICHTEXT EDITOR -->
				<div class="row justify-content-center my-1">
					<textarea name="content" id="content" rows="10" cols="80" value="Input notes here!"></textarea>
				</div>

				<div class="row justify-content-center my-1">
					<input type="submit" name="submit" value="Submit">
				</div>
			</form>
		<div>


		<!-- FOR CKEDITOR -->
		<script>
    		CKEDITOR.replace('content', {
      				extraPlugins: 'editorplaceholder',
      				editorplaceholder: 'Start typing here...'

   				});
 		 </script>

	</body>
</html>