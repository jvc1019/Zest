<div id="notes_list">
    <ul id="complete_notes" class="list-group">
        <?php
        $query = "SELECT * FROM note LEFT JOIN user ON note.user_ID=user.user_ID WHERE note.user_ID=$user_ID";
        $result = $conn->query($query);
        if (!($result->num_rows > 0)) {
            ?>
                <h6 class="text-center">☜(ﾟヮﾟ☜) There's nothing around here. You're all set!</h6>
            <?php
            } else {
                while ($row = $result->fetch_assoc()) {
            ?>
                <li class="list-group-item">
                <div class="row">
                    <div class="col-sm">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['note_Title']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['note_Tags']; ?></h6>
                                <p class="card-text"><?php echo $row['note_Content']; ?></p>
                                <a href="#notedetails<?php echo $row['note_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                                    <!-- info icon?--> Details</a> <a href="#notedelete<?php echo $row['note_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                    <!-- garbage bin icon--></span> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('notes_modal.php'); ?>
                </li>
            <?php
            }
        }
        ?>
    </ul>
</div>