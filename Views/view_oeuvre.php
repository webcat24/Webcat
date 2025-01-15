<?php
$title = "Oeuvres";
require 'view_begin.php';
var_dump($data)
?>
<div class="carousel next">
    <div class="list">
        <article class="item other_1">
            <div class="main-content" style="background: linear-gradient(#603524, #d69041);">
                <!-- <div class="main-content" style="background: linear-gradient(to right, #b26c86, #4b3d4f);"> -->

                <div class="content">
                    <h2>Exprimez-vous en couleurs.</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/oeuvre1.jpg" alt="" crossorigin="anonymous">
                <figcaption>Les couleurs de votre art</figcaption>
            </figure>
        </article>
        <article class="item active">
            <!-- <div class="main-content" style="background-color: #f5bfaf;"> -->
            <div class="main-content" style="background: linear-gradient(#fdefe5, #faaec6);">
                <div class="content">
                    <h2>Exprimez-vous en couleurs.</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/oeuvre2.jpg" alt="" crossorigin="anonymous">
                <figcaption>Les couleurs de votre art</figcaption>
            </figure>
        </article>
        <article class="item other_2">
            <div class="main-content" style="background: linear-gradient(#3474d4, #83c2ef);">
                <div class=" content">
                    <h2>Exprimez-vous en couleurs.</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/oeuvre3.jpg" alt="" crossorigin="anonymous">
                <figcaption>Les couleurs de votre art</figcaption>
            </figure>
        </article>
        <article class="item">
            <div class="main-content" style="background: linear-gradient(#f0a60c, #97c9f7);">
                <div class="content">
                    <h2>Exprimez-vous en couleurs.</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/oeuvre4.jpg" alt="" crossorigin="anonymous">
                <figcaption>Les couleurs de votre art</figcaption>
            </figure>
        </article>
        <article class="item">
            <!-- <div class="main-content" style="background: linear-gradient(to right, #bc60a1, #2c3151);"> -->
            <div class="main-content" style="background: linear-gradient(#dfb66d, #5b6f75);">
                <div class="content">
                    <h2>Exprimez-vous en couleurs.</h2>
                </div>
            </div>
            <figure class="image">
                <img src="Content/img/oeuvre6.jpg" alt="" crossorigin="anonymous">
                <figcaption>Les couleurs de votre art</figcaption>
            </figure>
        </article>
    </div>
    <div class="arrows">
        <button id="prev">
            < </button>
                <button id="next">></button>
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