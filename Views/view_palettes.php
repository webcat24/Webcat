<?php
$title = "Palettes";
require 'view_begin.php';
?>
<div class="carousel next">
    <div class="list">
        <article class="item other_1">
            <div class="main-content" style="background: linear-gradient(#d98398, #4b3d4f);">
                <div class="content">
                    <h2>Exprimez-vous en couleurs.</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/pale2.jpg" alt="" crossorigin="anonymous">
            </figure>
        </article>
        <article class="item active">
            <div class="main-content" style="background: linear-gradient(#e8c8ce, #f86771);">
                <div class="content">
                    <h2>Les couleurs de votre art</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/pale1.jpg" alt="" crossorigin="anonymous">
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
            </figure>
        </article>
        <article class="item">
            <div class="main-content" style="background: linear-gradient(#bc60a1, #2c3151);">
                <div class="content">
                    <h2>Exprimez-vous en couleurs.</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/pale3.jpg" alt="" crossorigin="anonymous">
            </figure>
        </article>
    </div>
    <div class="arrows">
        <button id="prev">
            < </button>
                <button id="next">></button>
    </div>
</div>
<section id="menu">
    <h2 class="section-title ff-damion espace">Nos Palettes</h2>
    <div class="palette-container" id="paletteContainer">
        <?php foreach ($palettes as $palette_name => $colors): ?>
            <div class="palette-card" data-index="<?php echo htmlspecialchars($palette_name); ?>">
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
</section>
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