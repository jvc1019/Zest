<?php include('header.php'); ?>
    <body>
        <div class="mx-auto" style="width: 1200px; margin-top: 50px">
        <form method="POST" id="addnote" action="notes_add.php" enctype="multipart/form-data">
            <input type="text" name="note_Title" placeholder="Note Title" required>  
            <input type=" text" name="note_Tags" placeholder="Tags (separated by a comma)">
            <textarea name="note_Content" id="note_Content" rows="10" cols="80">Input note content here</textarea>
            <input type="text" name="user_ID" value=<?php echo $user_ID; ?> hidden>
            
            <button type="button" class="btn btn-sm text-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="submit" class="btn btn-sm text-primary">Save</button>            
        </form>
        </div>

        <script>
            CKEDITOR.replace('note_Content');
        </script>
    </body>