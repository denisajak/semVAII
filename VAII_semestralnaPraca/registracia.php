<?php

include "db.php";
$db = new db();

if (isset($_REQUEST["user"]) && isset($_REQUEST["password"]) && isset($_REQUEST["passwordCheck"])) {
    $user = $_REQUEST["user"];
    $password = $_REQUEST["password"];
    $passwordCheck = $_REQUEST["passwordCheck"];

    if ($password != $passwordCheck) {
        echo "Heslá sa nezhodujú";
    } else {
        if (!$db->getUser($user)) {
            $db->registration($user, $password);
        } else {
            echo "Zadané používateľské meno už existuje";
        }
    }
} else {
    echo 'Nastala neočakávaná chyba..';
}
