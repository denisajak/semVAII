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

<div class="row bootstrap snippets">
    <div class="container-fluid padding">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="comment-wrapper">
                    <div class="posts">
                        <ul class="media-list">
                            <?php
                            $results = $db->getPosts();
                            while ($value = $results->fetch_object()): ?>
                                <li class="media">
                                    <div class="media-body">
                                        <div class="post-meta align-items-center text-left clearfix">
                                    <span class="d-inline-block mt-3 mb-3 "> Autor: <strong
                                                class="text-primary author"> <?= $value->user ?> </strong> </span>
                                            <span> <small class="text-muted"> <?= $value->date ?> </small></span>
                                            <p>
                                                <?= $value->p_content ?>
                                            </p>
                                            <?php if (isset($_SESSION['user'])): ?>
                                                <?php
                                                if ($ses_user == $value->user) {
                                                    ?>
                                                    <button class="btn btn-link" id="delete" name="delete"
                                                            onclick="deletePost(<?= $value->p_id ?>)"> vymazať
                                                    </button>

                                                    <button class="btn btn-link" id="edit" name="edit"
                                                            onclick="editPost(<?= $value->p_id ?>)"> upraviť
                                                    </button>

                                                    <?php
                                                }
                                                ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('body').on('click', '#send', function () {
            var data = {
                'p_content': $("#p_content").val()
            };

            $.ajax({
                url: "nahrajPrispevok.php",
                type: "POST",
                data: data,
                success: function (results) {
                    $(".posts").html(results);
                    $("#p_content").val("");
                }

            });
        });
    });

    function deletePost(p_id) {
        var data = {
            'p_id': p_id
        };

        $.ajax({
            url: "zmazPrispevok.php",
            type: "POST",
            data: data,
            success: function (results) {
                alert('Príspevok úspešne zmazaný');
                $(".posts").html(results);
            }
        })
    }

    function editPost(p_id) {
        var data = {
            'p_id': p_id,
        };

        $.ajax({
            url: "upravPrispevok.php",
            type: "POST",
            data: data,
            success: function (results) {
                $(".form-group").html(results);
            }
        })
    }

</script>

<?php include 'paticka.php'; ?>
