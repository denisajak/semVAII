<?php
include "db.php";
$db = new db();
$ses_user = $_SESSION['user'];

if (isset($_REQUEST["p_id"]) && ($_REQUEST["p_content"])) {
    $db->editPost(($_REQUEST["p_id"]), ($_REQUEST["p_content"]));
} ?>

<div class="form-group">
    <label for="p_content">Príspevok</label>
    <textarea name="p_content" id="p_content" cols="30" rows="5" class="form-control"
              placeholder="Zadaj príspevok"></textarea>
    <button class="btn btn-light" id="send" name="send">Odoslať</button>
    </button>
</div>
