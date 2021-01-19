<?php
include "db.php";
$db = new db();

if (isset($_REQUEST['r_title']) && isset($_REQUEST['r_content'])) {
    $db->insertRecept($_REQUEST['r_title'], $_REQUEST['r_content']);
}
?>


<div class="recepty">
    <?php
    $results = $db->getRecept();
    while ($value = $results->fetch_object()):?>
        <div class="card-header">
            <strong class="text-primary"> <?= $value->user ?> </strong>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $value->r_title ?></h5>
            <p class="card-text"><?= $value->r_content ?></p>
        </div>
        <div class="card-footer">
            <small class="text-muted"> <?= $value->date ?> </small>
        </div>
        <br>
    <?php endwhile; ?>
</div>

