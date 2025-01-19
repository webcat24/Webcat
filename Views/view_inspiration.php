<?php
$title = "Inspiration";
require 'view_begin.php';
?>

<div class="home" id="home">
    <div class="home-content">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <video class="home-img" src="Content/img/test.mp4" autoplay muted loop playsinline></video>

                    <div class="home-details">
                        <div class="home-text">
                            <h4 class="homeSubtitle">Exprimez-vous en couleurs.</h4>
                            <h2 class="homeTitle"> Les couleurs de <br>votre art</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="https://th.bing.com/th/id/OIP.GXMvjgr-sSB8Uqqos6JNCwHaFa?rs=1&pid=ImgDetMain" alt=""
                        class="home-img">

                    <div class="home-details">
                        <div class="home-text">
                            <h4 class="homeSubtitle">Slogan different si on veut.</h4>
                            <h2 class="homeTitle">Slogan different si on veut <br> reflechir</h2>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <img src="https://static.vecteezy.com/system/resources/previews/002/744/052/original/trendy-beautiful-gradient-color-palettes-vector.jpg"
                        alt="" class="home-img">

                    <div class="home-details">
                        <div class="home-text">
                            <h4 class="homeSubtitle">Slogan different si on veut.</h4>
                            <h2 class="homeTitle">Slogan different si on veut <br> reflechir</h2>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <img src="https://www.johnbeckley.com/images/2017/04/Marilyn-monroe-painting-john-beckley-2017-edition.jpg"
                        alt="" class="home-img">

                    <div class="home-details">
                        <div class="home-text">
                            <h4 class="homeSubtitle">Slogan different si on veut.</h4>
                            <h2 class="homeTitle">Slogan different si on veut <br> reflechir</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
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
                                        <h3><a href="?controller=Controller_inspiration&action=affichepalettes">Palettes
                                                Créatives</a></h3>
                                    </div>
                                    <div class="witr_pslide_custom">
                                        <a href="?controller=Controller_inspiration&action=affichepalettes"><span
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
                                        <h3><a href="?controller=Controller_inspiration&action=afficheroeuvre">Galerie
                                                des Œuvres</a></h3>
                                    </div>
                                    <div class="witr_pslide_custom">
                                        <a href="?controller=Controller_inspiration&action=afficheroeuvre"><span
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