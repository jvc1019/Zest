<?php
    $query = "SELECT * FROM note WHERE note.user_ID=$user_ID AND note_Tags IS NOT NULL";
    $result = $conn->query($query);
    $note_Tags = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tags = !empty(explode(",", $row["note_Tags"])) ? explode(",", $row["note_Tags"]) : $row["note_Tags"];
            $note_Tags = array_merge($note_Tags, $tags);
        }?><hr>

<!-- all tags display -->
<div class="row">
<div class="col-sm-10 text-left">
<?php
    $num = 0;
    foreach (array_unique($note_Tags) as $tags) {
        if ($num > 10) {
            break;
        } ?>
        <a href="notes.php?tag=<?php echo $tags; ?>" class="badge" id="search">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 2v4.586l7 7L13.586 9l-7-7H2zM1 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2z" />
            <path fill-rule="evenodd" d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
        </svg><?php echo $tags; ?></a>
        <?php $num++; }?>
    </div>
    <div class="col-sm-2 text-right">
        <a href="#note_tags" data-toggle="modal" class="btn text-primary btn-sm"> All tags </a>
    </div>
</div><?php }?></div>

<!-- all tags modal -->
<div class="modal fade" id="note_tags" tabindex="-1" role="dialog" aria-labelledby="All tags" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">All tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body list-group list-group-flush">
            <?php
                $num = 0;
                foreach (array_unique($note_Tags) as $tags) { ?>
                <li class="list-group-item">
                    <a href="notes.php?tag=<?php echo $tags;  ?>" class="badge" id="search">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 2v4.586l7 7L13.586 9l-7-7H2zM1 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2z" />
                        <path fill-rule="evenodd" d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                    </svg>
                    <?php echo $tags; ?></a>
                    <?php $num++; }?>
                </li>
        </div>
    </div>
</div>