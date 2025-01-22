<?php
$title = "À Propos";
$bodyClass = "about-page"; // Classe pour le body
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
                <a href="?controller=boutique"><button class="bouton2">Découvrir nos produits</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="Content/img/argenteuil-monet.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h5>Les couleurs de votre art</h5>
                <p>Pinceaux, chevalet, peinture aquarelle, à l'huile, acrylique, ...</p>
                <a href="?controller=boutique"><button class="bouton2">Découvrir nos produits</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="Content/img/rochers-monet.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h5>Les couleurs de votre art</h5>
                <p>Pinceaux, chevalet, peinture aquarelle, à l'huile, acrylique, ...</p>
                <a href="?controller=boutique"><button class="bouton2">Découvrir nos produits</button></a>
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
<main>
    <section class="contained row">
        <div class="col-balance">
            <h2 class="section-title ff-damion espace">À Propos de nous</h2>

            <span class="fc-primary fs-h2">
                Notre histoire
            </span>
            <p>
                Peinturia est <strong>née en 2016</strong>, de l’amitié et de la passion commune pour l’art de cinq anciens camarades de classe. Ces passionnés, réunis autour de la même vision, ont voulu <strong>rendre l’art accessible tout en valorisant des matériaux de qualité</strong>. Ils ont commencé modestement dans un atelier improvisé, développant des produits pensés par des artistes pour des artistes. Aujourd’hui, Peinturia est devenue une <strong>référence dans le domaine des peintures et du matériel artistique</strong>, tout en restant <strong>fidèle à ses racines</strong> et à <strong>son engagement</strong> envers l’excellence et la créativité.
            </p>
        </div>
        <div class="col-balance">
            <div class="sticky-img-dual">
                <img src="Content/img/locaux.jpg" alt="" class="caher">
                <!-- <img src="Content/img/arbre.avif" alt="" class="blob"> -->
                <img src="Content/img/atelier.jpg" alt="">
            </div>
        </div>
        <div class="sticky-img-dual-spacer"></div>



        <div class="col-balance ordi">
            <div class="sticky-img-dual">
                <img src="Content/img/artiste.jpg" alt="">
                <!-- <img src="Content/img/arb.avif" alt="" class="blob"> -->
                <img src="Content/img/atelierluxe.jpg" alt="" class="caher">
            </div>
        </div>
        <div class="col-balance">
            <span class="fc-primary fs-h2">
                Notre mission
            </span>
            <p>
                Chez Peinturia, nous avons une mission claire : <strong>inspirer et équiper les artistes</strong>, qu’ils soient amateurs ou professionnels, en leur offrant <strong>des produits de qualité supérieure</strong>. Nous croyons que chaque coup de pinceau raconte une histoire et mérite les meilleures matières premières pour la sublimer. En proposant des peintures éclatantes, des palettes inspirantes et un matériel durable, <strong>nous accompagnons nos clients dans leur quête de beauté et d’expression artistique</strong>.
            </p>

        </div>
        <div class="sticky-img-dual-spacer"></div>

        <div class="col-balance">
            <span class="fc-primary fs-h2">
                Nos Valeurs
            </span>
            <p>
            L’engagement de Peinturia repose sur des valeurs fortes qui guident chaque étape de notre activité : nous favorisons des procédés <strong>respectueux de l’environnement</strong> et collaborons avec <strong>des producteurs locaux</strong> pour réduire notre empreinte carbone, notre équipe reflète <strong>une diversité de talents et de cultures</strong> en mettant en avant l’égalité des chances, nous travaillons avec <strong>des partenaires français</strong> pour garantir des produits authentiques et <strong>soutenir l’artisanat local</strong>, et enfin, notre passion pour l’art et la création se retrouve dans chaque produit, <strong>conçu pour inspirer et respecter nos valeurs de durabilité</strong>.
            </p>
        </div>
        <div class="col-balance">
            <div class="sticky-img-dual">
                <img src="Content/img/reunion.jpg" alt="">
                <!-- <img src="Content/img/arbr.avif" alt="" class="blob"> -->
                <img src="Content/img/champsfleurs.jpg" alt="" class="caher">
            </div>
        </div>
        <div class="sticky-img-dual-spacer"></div>

    </section>

</main>

<!-- Debut du FOOTER -->

<!-- Fin du FOOTER -->
<?php require "view_end.php"; ?>