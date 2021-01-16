<?php
include 'db.php';
$_SESSION["active_page"] = 2;
include 'navbar.php';
?>

<div class="reg">
    <form id="form" action="registracia.php" method="post">
        <div class="container-fluid padding" id="registracia">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="form-group">
                        <h1>Registrácia</h1>

                        <div class="info">
                            <p>Všetky údaje sú povinné!!!</p>
                        </div>

                        <hr class=mb-2>
                        <label for="user"><b>Prihlasovacie meno:</b></label>
                        <input class="form-control" type="text" name="user" id="user" required autocomplete="off"
                               onkeyup="checkName(); return false;"> <br>

                        <div class="mb-2">
                            <span id="confirmMsg" class="confirmMsg"></span>
                        </div>

                        <label for="password"><b>Heslo:</b></label>
                        <input class="form-control" type="password" name="password" id="password"
                               onkeyup="checkPass(); return false;" required> <br>

                        <label for="passwordCheck"><b>Overenie hesla:</b></label>
                        <input class="form-control" type="password" name="passwordCheck" id="passwordCheck"
                               onkeyup="checkPass(); return false;" required><br>

                        <div class="mb-2">
                            <span id="confirmMessage" class="confirmMessage"></span>
                        </div>

                        <div class="info">
                            <p> Ak už máte vytvorený účet, môžete sa <a href="prihlasenie_form.php">prihlásiť</a></p>
                        </div>

                        <hr class=mb-2>
                        <button class="btn btn-light" type="submit" name="register">Zaregistrovať</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
