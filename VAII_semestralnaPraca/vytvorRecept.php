<?php
include "db.php";
$db = new db();

if (isset($_REQUEST["r_title"]) && isset($_REQUEST["r_content"])) {

    $r_title = $_REQUEST["r_title"];
    $r_content = $_REQUEST["r_content"];

}
$db->insertRecept($r_title, $r_content);