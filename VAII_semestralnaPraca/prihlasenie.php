<?php
include "db.php";
$db = new db();

if (isset($_REQUEST["user"]) && isset($_REQUEST["password"])) {
    $user = $_REQUEST["user"];
    $password = $_REQUEST["password"];
}

$db->getLogin($user, $password);
