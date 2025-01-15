<?php
$title = "Oeuvres";
require 'view_begin.php';
var_dump($data)
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
<!-- section  menu -->
<div class="wrapper">
    <div class="search-input">
        <a href="" target="_blank" hidden></a>
        <input type="text" placeholder="Type to search..">
        <div class="autocom-box">
        </div>
        <div class="icon">
            <i class="fas fa-search"></i>
        </div>
    </div>
</div>
<div class="entoure">
    <section id="menu">
        <h2 class="section-title ff-damion espace">Nos Œuvres</h2>
        <div class="dishes">
        <?php foreach ($data["dataTableaux"] as $oeuvre):?>
            <div class="dish">
                <img src="<?=$oeuvre['lien_image']?>" alt="Dish Image">
                <h2><?=e($oeuvre['nom_oeuvre'])?></h2>
                <span><?=e($oeuvre['nom_artiste'])?></span>
                <!-- pipette icon -->
                <i id="pipetteSmallEcran" class="bi bi-eyedropper" onclick="showImage(<?=$oeuvre['id_oeuvres'] - 1?>)"></i>
                <!-- <a href="#" class="buy-button">Acheter</a> -->
            </div>
        <?php endforeach;?>   

            <div class="modal">
                <span class="close" onclick="closeModal()">&times;</span>

                <img src="" alt="Fullscreen Image">
                <canvas id="canvas"></canvas>
                <div id ="notifCouleurPipette" class="notifCouleurPipette">
                    <div class="textNotifPipete">
                        <p>Code couleur : <span id="colorCodePipette">#------</span></p>
                    </div>
                    <div id="colorDisplayPipette"></div>
                </div>
                <div class="arrow left" onclick="navigateImage(-1)">&#10094;</div>
                <div class="arrow right" onclick="navigateImage(1)">&#10095;</div>
            </div>
        </div>

    </section>
</div>
<!-- Barre nav -->
<div class="conteneurBarreNavOeuvre">
    <nav class="navBarreNavOeuvre">
        <ul>
            <?php for($i=1; $i <= $data["taillePageNav"]; $i++) :?>
            <li>
                <a <?php if($i==$data["currentPage"]){ echo"class=\"pageActive\"";} ?>
                    href="http://localhost/SAE5/git/Webcat/?controller=Controller_inspiration&action=afficheroeuvre&page=<?=$i?>">
                    <?=$i?>
                </a>
            </li>
            <?php endfor?>
        </ul>
    </nav>
</div> 

<script src="Content\js\pipette.js"></script>

<?php
require 'view_end.php';
?>