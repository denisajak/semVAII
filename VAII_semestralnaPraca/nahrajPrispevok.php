<?php
include "db.php";
$db = new db();
$ses_user = $_SESSION['user'];

if (isset($_REQUEST['p_content']) && !empty($_REQUEST['p_content'])) {
    $db->insertPost($_REQUEST['p_content']);
}
?>

<ul class="media-list">
    <?php
    $results = $db->getPosts();
    while ($value = $results->fetch_object()): ?>
        <li class="media">
            <div class="media-body">
                <div class="post-meta align-items-center text-left clearfix">
                                        <span class="d-inline-block mt-3 mb-3 "> Autor: <strong
                                                class="text-primary author"> <?= $value->user ?> </strong> </span>
                    <span> <small class="text-muted"> <?= $value->date ?> </small></span>

                    <p>
                        <?= $value->p_content ?>
                    </p>
                    <?php
                    if ($ses_user == $value->user) {
                        ?>
                        <button class="btn btn-link" id="delete" name="delete"
                                onclick="deletePost(<?= $value->p_id ?>)"> vymazať
                        </button>
                        <button class="btn btn-link" id="edit" name="edit"
                                onclick="editPost(<?= $value->p_id ?>)">
                            upraviť
                        </button>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </li>
    <?php endwhile; ?>
</ul>
