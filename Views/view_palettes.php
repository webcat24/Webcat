<?php
$title = "Palettes";
require 'view_begin.php';
?>
<!-- section  images -->
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
<div class="palette-container" id="paletteContainer">
</div>
<div class="modalpalette hidden">
    <div class="modal-content">
        <span class="close" onclick="closeModalPalette()">&times;</span>
        <button class="nav-button left" onclick="navigatePalette(-1)">&#10094;</button>
        <div id="modal-palette" class="palette"></div>
        <div id="modal-tags" class="tags"></div> <!-- Section pour les mots -->
        <button class="nav-button right" onclick="navigatePalette(1)">&#10095;</button>
    </div>
</div>

<?php
require 'view_end.php';
?>