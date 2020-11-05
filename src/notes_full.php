<?php include('header.php'); ?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Notebook editor</title>
		<script src="ckeditor/ckeditor.js"></script>
	</head>


	<body>
		<center><h1 style="padding: 20px"> Notes <h1></center>

		<div class="container">
			<form method="post" action="notes_add.php">

				<!-- TITLE AND TAG TEXTBOXES -->
				<div class="row mx-5 px-4 justify-content-left">
					<input class="mr-2" type="text" name="note_Title" placeholder="Note Title" required>  
            		<input class="ml-0" type=" text" name="note_Tags" placeholder="Tags (separated by a comma)">
				</div>

				<!-- RICHTEXT EDITOR -->
				<div class="row justify-content-center my-1">
					<textarea name="content" id="content" rows="10" cols="80" value="Input notes here!"></textarea>
				</div>

				<div class="row justify-content-center my-1">
					<button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">Cancel</button>
            		<button type="submit" name="submit" class="btn btn-sm text-primary">Save</button>
				</div>
			</form>
		<div>


		<!-- FOR CKEDITOR -->
		<script>
    		CKEDITOR.replace('content', {
      				extraPlugins: 'editorplaceholder',
      				editorplaceholder: 'Input note content here'

   				});
 		 </script>

	</body>
</html>

