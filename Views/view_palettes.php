<?php
$title = "Palettes";
require 'view_begin.php';
?>
<!-- section  images -->
<!-- <div class="home" id="home">
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
</div> -->

<!-- <div class="home" id="home">
    <div class="home-content">
        <div class="swiper mySwiper"> -->
<div class="carousel next">
    <div class="list">
        <article class="item other_1">
            <div class="main-content" style="background: linear-gradient(#d98398, #4b3d4f);">
                <!-- <div class="main-content" style="background: linear-gradient(to right, #b26c86, #4b3d4f);"> -->

                <div class="content">
                    <h2>Exprimez-vous en couleurs.</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/pale2.jpg" alt="" crossorigin="anonymous">
                <!-- <figcaption>Les couleurs de votre art</figcaption> -->
            </figure>
        </article>
        <article class="item active">
            <!-- <div class="main-content" style="background-color: #f5bfaf;"> -->
            <div class="main-content" style="background: linear-gradient(#e8c8ce, #f86771);">
                <div class="content">
                    <h2>Les couleurs de votre art</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/pale1.jpg" alt="" crossorigin="anonymous">
                <!-- <figcaption>Les couleurs de votre art</figcaption> -->
            </figure>
        </article>
        <article class="item other_2">
            <div class="main-content" style="background: linear-gradient(#f7d7e2, #84909d);">
                <div class=" content">
                    <h2>Exprimez-vous en couleurs.</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/pale5.jpg" alt="" crossorigin="anonymous">
                <!-- <figcaption>Les couleurs de votre art</figcaption> -->
            </figure>
        </article>
        <article class="item">
            <div class="main-content" style="background: linear-gradient(#bc83a6, #a4a5b4);">
                <div class="content">
                    <h2>Les couleurs de votre art</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/pale4.jpg" alt="" crossorigin="anonymous">
                <!-- <figcaption>Les couleurs de votre art</figcaption> -->
            </figure>
        </article>
        <article class="item">
            <!-- <div class="main-content" style="background: linear-gradient(to right, #bc60a1, #2c3151);"> -->
            <div class="main-content" style="background: linear-gradient(#bc60a1, #2c3151);">
                <div class="content">
                    <h2>Exprimez-vous en couleurs.</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/pale3.jpg" alt="" crossorigin="anonymous">
                <!-- <figcaption>Les couleurs de votre art</figcaption> -->
            </figure>
        </article>
    </div>
    <div class="arrows">
        <button id="prev">
            < </button>
                <button id="next">></button>
    </div>

    <!-- <div class="swiper-button-next swiper-navBtn" id="prev"></div>
    <div class="swiper-button-prev swiper-navBtn" id="next"></div>
    <div class="swiper-pagination"></div>

</div>
</div>
</div> -->
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
<!-- <div class="palette-container" id="paletteContainer">
</div> -->
<div class="palette-container" id="paletteContainer">
    <?php foreach ($palettes as $palette_name => $colors): ?>
        <div class="palette-card" data-index="<?php echo htmlspecialchars($palette_name); ?>">
            <!-- <div class="palette-title">
                <h3><?php echo htmlspecialchars($palette_name); ?></h3>
            </div> -->
            <div class="palette">
                <?php foreach ($colors as $color): ?>
                    <div class="color" style="background-color: <?php echo htmlspecialchars($color['hex_code']); ?>;"
                        data-color="<?php echo htmlspecialchars($color['hex_code']); ?>">
                        <?php echo htmlspecialchars($color['hex_code']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="palette-footer">
                <a href="#" class="expand-icon">⤢</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="modalpalette hidden">
    <div class="modal-content">
        <span class="close" onclick="closeModalPalette()">&times;</span>
        <button class="nav-button left" onclick="navigatePalette(-1)">&#10094;</button>
        <div id="modal-palette" class="palette"></div>
        <div id="modal-tags" class="tags"></div>
        <button class="nav-button right" onclick="navigatePalette(1)">&#10095;</button>
    </div>
</div>


<?php
require 'view_end.php';
?>