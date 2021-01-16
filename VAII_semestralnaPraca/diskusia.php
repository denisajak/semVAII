<?php
include 'db.php';
$_SESSION["active_page"] = 6;
include 'navbar.php';
$db = new db();
if (isset($_SESSION['user'])) {
    $ses_user = $_SESSION['user'];
}

?>
<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">Diskusia</h1>
        </div>
        <hr>
    </div>
</div>

<div class="container-fluid padding" id="post">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="form-group">
                <label for="p_content"><strong>Príspevok</strong></label>
                <textarea name="p_content" id="p_content" cols="30" rows="5" class="form-control"
                          placeholder="Zadaj príspevok"></textarea>
                <?php if (isset($_SESSION['id_user'])): ?>
                    <button class="btn btn-light" id="send" name="send">Odoslať</button>
                <?php else: ?>
                    <div class="info">
                        <p> Ak chceš pridať komentár, musíš sa <a href="prihlasenie_form.php">prihlásiť</a></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'paticka.php'; ?>
