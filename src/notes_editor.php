<?php include('header.php'); ?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Notebook editor</title>
		<script src="ckeditor/ckeditor.js"></script>
	</head>


	<body>
		<center><h1 style="padding: 20px"> Edit Note <h1></center>

		<div class="container">
			<form method="post" action="notes_edit.php?note_ID=<?php echo $row['note_ID']; ?>" enctype="multipart/form-data">

				<!-- TITLE AND TAG TEXTBOXES -->
				<div class="row mx-5 px-4 justify-content-left">
					<input class="mr-2" type="text" name="note_Title" value="<?php echo $row['note_Title']; ?>">  
            		<input class="ml-0" type=" text"  name="note_Tags" value="<?php echo $row['note_Tags']; ?>" placeholder="Tags (separated by a comma)" rows="3">
				</div>

				<!-- RICHTEXT EDITOR -->
				<div class="row justify-content-center my-1">
					<textarea name="content" id="content" rows="10" cols="80" ><?php echo $row['note_Content']; ?></textarea>
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

