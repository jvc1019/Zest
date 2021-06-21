<!-- All tags -->
<div class="modal fade" id="tags" tabindex="-1" role="dialog" aria-labelledby="All tags" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">All tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body list-group list-group-flush">
                <?php
                sort($task_Tags_Intersect);
                $start = " ";
                foreach ($task_Tags_Intersect as $value) {
                    if (strtolower($value[0]) !== $start) {
                        $start = strtolower($value[0]); ?>
                        </li>
                        <li class="list-group-item">
                            <h6><?php echo $start; ?></h6>
                        <?php
                    }
                        ?>
                        <a href="tasks.php?tag=<?php echo $value; ?>" class="badge">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 2v4.586l7 7L13.586 9l-7-7H2zM1 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2z" />
                                <path fill-rule="evenodd" d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                            </svg>
                            <?php echo $value; ?>
                        </a>
                    <?php
                }
                    ?>
            </div>
        </div>
    </div>
</div>