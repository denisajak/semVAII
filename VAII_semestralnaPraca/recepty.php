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
        <div class="recept">
            <div class="container-fluid padding" id="recept">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <div class="form-group">
                            <h1>Pridať recept</h1>

                            <input class="form-control" type="text" name="r_title" id="r_title"
                                   placeholder="Názov" required autocomplete="off"> <br>

                            <textarea class="form-control" id="r_content" name="r_content" rows="15"
                                      placeholder="Recept" required></textarea> <br>

                            <button class="btn btn-light" name="send" id="send">Odoslať</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card text-center">
            <div class="recepty">
                <?php
                $results = $db->getRecept();
                if ($results) :
                    while ($value = $results->fetch_object()):?>
                        <div class="card-header">
                            <span> Autor: <strong class="text-primary author"> <?= $value->user ?> </strong> </span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $value->r_title ?></h5>
                            <p class="card-text"><?= $value->r_content ?></p>
                        </div>
                        <div class="card-footer mb-4">
                            <small class="text-muted"> <?= $value->date ?> </small>
                        </div>
                        <br>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p></p>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('body').on('click', '#send', function () {
                var data = {
                    'r_title': $("#r_title").val(),
                    'r_content': $("#r_content").val()
                };
                $.ajax({
                    url: "nahrajRecept.php",
                    type: "POST",
                    data: data,
                    success: function (results) {
                        $(".recepty").html(results);
                        $("#r_title").val("");
                        $("#r_content").val("");
                    }
                });
            })
        });
    </script>

<?php include 'paticka.php'; ?>