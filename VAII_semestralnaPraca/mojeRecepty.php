<?php
include "db.php";
$_SESSION["active_page"] = 5;
include 'navbar.php';
$db = new db();
$id = $_SESSION['id_user'];
?>

    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Moje recepty</h1>
            </div>
            <hr>
        </div>
        <div class="container">
            <!--        <div class="card text-center" style="border: #669999;">-->
            <div class="card text-center"">
            <div class="recepty" style="background-color: #669999;">
                <?php
                $results = $db->getMyRecept($id);
                if ($results) :
                    while ($value = $results->fetch_object()):?>
                        <br>
                        <div class="card-header" style="background-color: #FFFFFF">
                            <span> Autor: <strong class="text-primary author"> <?= $value->user ?> </strong> </span>
                        </div>
                        <div class="card-body" style="background-color: #FFFFFF">
                            <h5 class="card-title"><?= $value->r_title ?></h5>
                            <p class="card-text"><?= $value->r_content ?></p>
                        </div>
                        <div class="card-footer mb-4" style="background-color: #FFFFFF">
                            <small class="text-muted"> <?= $value->date ?> </small>
                        </div>
                        <br>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div>
                        <p class="missing-r">
                            Zatiaľ ste nepridali žiadne recepty.
                            Môžete ich pridať <a class="link" href="recepty.php">tu</a>
                        </p>
                    </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
    </div>

<?php include 'paticka.php'; ?>