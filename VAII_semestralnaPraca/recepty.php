<?php
include 'db.php';
$_SESSION["active_page"] = 4;
include 'navbar.php';
$db = new db(); ?>

    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Recepty</h1>
            </div>
            <hr>
        </div>
    </div>
<?php include 'paticka.php'; ?>