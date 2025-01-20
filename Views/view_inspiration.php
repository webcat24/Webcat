<?php
$title = "Inspiration";
require 'view_begin.php';
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
<main>
    <!-- Menu Section -->
    <section id="menu">
        <h2 class="section-title ff-damion espace">L'Art au Cœur de la Vision.</h2>

        <!-- solutech_about_area -->
        <div class="solutech_about_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="witr_section_title">
                            <div class="witr_section_title_inner text-center">
                                <h3>EXPLOREZ LA FUSION ENTRE ART ET COULEURS</h3>
                                <h1>Palettes & Œuvres.</h1>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="witr_pslide3 all_pslides_color ps1 ps3 service_active">
                    <div class="witr_cslide3_idany service_top">
                        <!-- solutech_serivce_01 -->
                        <div class="item_pos col-lg-12">
                            <div class="witr_single_pslide">
                                <div class="witr_pslide_image">
                                    <img src="Content/img/palet2.webp" alt="image">
                                </div>
                                <div class="witr_content_pslide_text">
                                    <div class="witr_number_pslide">
                                        <h4>01.</h4>
                                    </div>
                                    <div class="witr_content_pslide">
                                        <p>EXPLORATION DES NUANCES</p>
                                        <h3><a href="?controller=inspiration&action=affichepalettes">Palettes
                                                Créatives</a></h3>
                                    </div>
                                    <div class="witr_pslide_custom">
                                        <a href="?controller=inspiration&action=affichepalettes"><span
                                                class="fas fa-arrow-right"></span></a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- solutech_serivce_02 -->
                        <div class="item_pos col-lg-12">
                            <div class="witr_single_pslide">
                                <div class="witr_pslide_image">
                                    <img src="Content/img/arbre.avif" alt="image">
                                </div>
                                <div class="witr_content_pslide_text">
                                    <div class="witr_number_pslide">
                                        <h4>02.</h4>
                                    </div>
                                    <div class="witr_content_pslide">
                                        <p>EXPRESSION ARTISTIQUE</p>
                                        <h3><a href="?controller=inspiration&action=afficheroeuvre">Galerie
                                                des Œuvres</a></h3>
                                    </div>
                                    <div class="witr_pslide_custom">
                                        <a href="?controller=inspiration&action=afficheroeuvre"><span
                                                class="fas fa-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php
require 'view_end.php';
?>