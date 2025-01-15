<?php
$title = "Accueil";
require "view_begin.php";
?>

<div id="myCarousel" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Content/img/femme-monet.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h5>Les couleurs de votre art</h5>
                <p>Pinceaux, chevalet, peinture aquarelle, à l'huile, acrylique, ...</p>
                <a href="?controller=Boutique&action="><button class="bouton2">Découvrir nos produits</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="Content/img/argenteuil-monet.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h5>Les couleurs de votre art</h5>
                <p>Pinceaux, chevalet, peinture aquarelle, à l'huile, acrylique, ...</p>
                <a href="?controller=Boutique&action="><button class="bouton2">Découvrir nos produits</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="Content/img/rochers-monet.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h5>Les couleurs de votre art</h5>
                <p>Pinceaux, chevalet, peinture aquarelle, à l'huile, acrylique, ...</p>
                <a href="?controller=Boutique&action="><button class="bouton2">Découvrir nos produits</button></a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="accueil-bloc">
    <div class="article-bloc">
        <h5>Peinture à la une</h5>
        <div class="container article">
            <div class="row">
                <div class="col">
                    <img src="Content/img/pont-monet.jpeg" alt="Article 1">
                </div>
                <div class="col">
                    <img src="Content/img/femme-monet.jpg" alt="Article 2">
                </div>
                <div class="col">
                    <img src="Content/img/argenteuil-monet.jpg" alt="Article 3">
                </div>
                <div class="col">
                    <img src="Content/img/rochers-monet.jpg" alt="Article 4">
                </div>
            </div>
        </div>
        <a href="?controller=Boutique&action="><button class="bouton3">En découvrir plus</button></a>
    </div>
    <div class="article-bloc">
        <h5>Galerie d'art</h5>
        <div class="container article">
            <div class="row">
                <div class="col">
                    <img src="Content/img/pont-monet.jpeg" alt="Article 1">
                </div>
                <div class="col">
                    <img src="Content/img/femme-monet.jpg" alt="Article 2">
                </div>
                <div class="col">
                    <img src="Content/img/argenteuil-monet.jpg" alt="Article 3">
                </div>
                <div class="col">
                    <img src="Content/img/rochers-monet.jpg" alt="Article 4">
                </div>
            </div>
        </div>
        <a href="?controller=Boutique&action="><button class="bouton3">En découvrir plus</button></a>
    </div>
</div>

<?php require "view_end.php"; ?>