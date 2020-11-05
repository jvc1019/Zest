<div id="search">
    <ul class="list-group">
        <?php
        $query = "SELECT * FROM note LEFT JOIN user ON note.user_ID=user.user_ID $search";
        $result = $conn->query($query);
        if (!($result->num_rows > 0)) {
            echo "<h6>No results found.</h6>";
        } else {
            while ($row = $result->fetch_assoc()) {
        ?>
                <li class="list-group-item">
                    <!-- note title and content | edit button | delete button -->
                    <!--              9          |     1       |      1        -->
                    <div class="row col-12 form-inline">
                        <!-- note title and content -->
                        <div class="col-sm-9">
                                <h6><?php echo $row['note_Title']; ?></h6>
                            <small>
                                <h6><?php echo $row['note_Content']; ?></h6>
                            </small>
                        </div>
                        <!-- edit and delete button -->
                        <div class="col-sm-2">
                            <a href="#notedetails<?php echo $row['note_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                                <!-- info icon?--> Details</a> <a href="#notedelete<?php echo $row['note_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                <!-- garbage bin icon--></span> Delete</a>
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