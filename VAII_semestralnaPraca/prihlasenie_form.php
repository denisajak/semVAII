<?php
include 'db.php';
$_SESSION["active_page"] = 3;
include 'navbar.php'; ?>
<div class="log">
    <form id="form" action="prihlasenie.php" method="post">
        <div class="container-fluid padding" id="prihlasenie">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="form-group">
                        <h1>Prihlásenie</h1>
                        <hr class=mb-2>
                        <label for="user"><b>Prihlasovacie meno:</b></label>
                        <input class="form-control" type="text" name="user" id="user" required autocomplete="off"> <br>

                        <label for="password"><b>Heslo:</b></label>
                        <input class="form-control" type="password" name="password" id="password" required> <br>

                        <div class="info">
                            <p>Ešte nemáte účet? <a href="registracia_form.php">Zaregistrujte sa</a></p>
                        </div>
                        <hr class=mb-2>
                        <button class="btn btn-light" type="submit" name="register"
                                onkeyup="checkPass(); return false;">Prihlásiť
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $("#form").validate({
            rules:
                {
                    user:
                        {
                            required: true,
                        },
                    password:
                        {
                            required: true,
                        }
                }
        });
    });


</script>
<?php include 'paticka.php'; ?>

