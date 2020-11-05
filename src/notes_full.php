
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Notebook editor</title>

    <script src="ckeditor/ckeditor.js"></script>


  </head>
  <body>

    <form method="post" action="notes_add.php">
    <textarea name = "title" id= "note_Title"></textarea> <!-- please change title holder-->
    <textarea name = "tags" id= "note_Tags"></textarea>
    <textarea name="content" id="content" rows="10" cols="80">
    Input note content here
    </textarea>
    <input type="submit" name="submit" value="SUBMIT">
    </form>


</form>

      <script>
      CKEDITOR.replace('content');
      </script>

  </body>
</html>