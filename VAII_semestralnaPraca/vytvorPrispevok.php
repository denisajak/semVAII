<?php
include "db.php";
$db = new db();

if (isset($_REQUEST["p_content"]) && !empty($_REQUEST['p_content'])) {
    $p_content = $_REQUEST["p_content"];
}
$db->insertPost($p_content);

