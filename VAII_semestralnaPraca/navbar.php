<?php include 'hlavicka.php'; ?>

<!-- horna lista -->
<div id="topheader">
    <nav class="navbar navbar-expand-md navbar-light sticky-top" style="background-color: #669999;">
        <!--<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">-->
        <div class="container-fluid">
            <a class="navbar-brand" href="domov.php"><i class="fas fa-utensils"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <!-- je to tlacidlo na vyrolovanie menu ked sa zmmensi sirka -->
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!-- ked zmenim sirku tak sa to automaticky zmensi -->
                <ul class="navbar-nav ml-auto">

                    <?php if ($_SESSION['active_page'] == 1): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="domov.php">Domov</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="domov.php">Domov</a>
                        </li>
                    <?php endif; ?>

                    <?php if ($_SESSION['active_page'] == 6): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="diskusia.php">Diskusia</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="diskusia.php">Diskusia</a>
                        </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['id_user'])) : ?>
                        <?php if ($_SESSION['active_page'] == 4): ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="recepty.php">Recepty</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="recepty.php">Recepty</a>
                            </li>
                        <?php endif; ?>


                        <li class="nav-item">
                            <a class="nav-link" href="odhlasenie.php">Odhlásenie</a>
                        </li>
                    <?php
                    else :
                        ?>
                        <?php if ($_SESSION['active_page'] == 2): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="registracia_form.php">Registrácia</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="registracia_form.php">Registrácia</a>
                        </li>
                    <?php endif; ?>
                        <?php if ($_SESSION['active_page'] == 3): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="prihlasenie_form.php">Prihlásenie</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="prihlasenie_form.php">Prihlásenie</a>
                        </li>
                    <?php
                    endif;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</div>