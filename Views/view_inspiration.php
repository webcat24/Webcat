<?php
$title = "Inspiration";
require 'view_begin.php';
?>

<body>
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