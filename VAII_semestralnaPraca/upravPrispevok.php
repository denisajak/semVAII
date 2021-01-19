<?php
include "db.php";
$db = new db();

if (isset($_REQUEST["p_id"])) {

} ?>

<div class="form-group">
    <?php
    $results = $db->getPost(($_REQUEST["p_id"]));
    while ($value = $results->fetch_object()): ?>

        <label for="p_content">Príspevok</label>
        <textarea name="p_content" id="p_content" cols="30" rows="5"
                  class="form-control"> <?= $value->p_content ?></textarea>
        <button class="btn btn-light" id="update" name="update" onclick="edit(<?= $value->p_id ?>)"> Upraviť
        </button>
    <?php endwhile; ?>
</div>

<script>
    $(document).ready(function () {
        $('form-group').on('click', '#update', function () {
            edit($(this).attr("p_id"));
        })
    });

    function edit(p_id) {
        var data = {
            'p_id': p_id,
            'p_content': $("#p_content").val()
        };

        $.ajax({
            url: "uprav.php",
            type: "POST",
            data: data,
            success: function (results) {
                $(".form-group").html(results);
                $("#p_content").val("");

                $.ajax({
                    url: "nacitajPrispevky.php",
                    type: "POST",
                    success: function (posts) {
                        $(".posts").html(posts);
                    }
                });

            }
        });
    }
</script>

