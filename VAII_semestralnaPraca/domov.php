<?php
include 'db.php';
$_SESSION["active_page"] = 1;
include 'navbar.php';
?>

<div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Recepty na mieru</h1>
            </div>
            <hr>
        </div>
    </div>
</div>

<!-- slideshow -->
<div class="row justify-content-center">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="obrazky/obrazok1.jpg" alt="img" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="obrazky/obrazok2.jpg" alt="img" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="obrazky/obrazok3.jpg" alt="img" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="obrazky/obrazok4.jpg" alt="img" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="obrazky/obrazok5.jpg" alt="img" class="d-block">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<?php
include 'paticka.php';
?>
