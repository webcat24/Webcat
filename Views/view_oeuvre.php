<?php
$title = "Oeuvres";
require 'view_begin.php';
// var_dump(value: $data)
?>
<?php
$backgrounds = [
    "linear-gradient(#603524, #d69041)",
    "linear-gradient(#fdefe5, #faaec6)",
    "linear-gradient(#3474d4, #83c2ef)",
    "linear-gradient(#f0a60c, #97c9f7)",
    "linear-gradient(#bc60a1, #2c3151)",
    "linear-gradient(#dfb66d, #5b6f75)",

];
$desiredIndexes = [0, 2, 3, 4, 6, 8];

?>
<div class="carousel next">
    <div class="list">
        <?php foreach ($desiredIndexes as $key => $index): ?>
            <?php $oeuvre = $data["dataTableaux"][$index]; ?>
            <article class="item <?= $key === 0 ? 'active' : ($key === 1 ? 'other_1' : ($key === 2 ? 'other_2' : '')) ?>">
                <div class="main-content" style="background: <?= $backgrounds[$key % count($backgrounds)] ?>;">
                    <div class="content">
                        <h2>Exprimez-vous en couleurs.</h2>
                    </div>
                </div>
                <figure class="image">
                    <img src="<?= $oeuvre['lien_image'] ?>" alt="<?= htmlspecialchars($oeuvre['nom_oeuvre']) ?>"
                        crossorigin="anonymous">
                </figure>
            </article>
        <?php endforeach; ?>
    </div>
    <div class="arrows">
        <button id="prev">&#10094;</button>
        <button id="next">&#10095;</button>
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
<div class="entoure" id="oeuvre">
    <section id="menu">
        <h2 class="section-title ff-damion espace">Nos Œuvres</h2>
        <div class="dishes">
            <?php foreach ($data["dataTableaux"] as $oeuvre): ?>
                <div class="dish">
                    <img src="<?= $oeuvre['lien_image'] ?>" alt="Dish Image">
                    <h2><?= e($oeuvre['nom_oeuvre']) ?></h2>
                    <span><?= e($oeuvre['nom_artiste']) ?></span>
                    <!-- pipette icon -->
                    <i id="pipetteSmallEcran" class="bi bi-eyedropper"
                        onclick="showImage(<?= $oeuvre['id_oeuvres'] - 1 ?>)"></i>
                </div>
            <?php endforeach; ?>

            <div class="modal">
                <span class="close" onclick="closeModal()">&times;</span>

                <img src="" alt="Fullscreen Image">
                <canvas id="canvas"></canvas>
                <div id="notifCouleurPipette" class="notifCouleurPipette">
                    <div class="textNotifPipete">
                        <p>Code couleur : <span id="colorCodePipette">#------</span></p>
                    </div>
                    <div id="colorDisplayPipette"></div>
                </div>
                <div class="arrow left" onclick="navigateImage(-1)">&#10094;</div>
                <div class="arrow right" onclick="navigateImage(1)">&#10095;</div>
            </div>


            <!-- <div class="modal">
                <span class="close" onclick="closeModal()">&times;</span>

                <!-- Section gauche --
                <div class="modal-page modal-left">
                    <h2 id="modal-title">Titre Exemple</h2>
                    <p id="modal-description">
                        Ceci est une description d'exemple pour l'image.
                    </p>
                    <p id="modal-artist">
                        Artiste : <span id="modal-artist-name">Artiste Exemple</span>
                    </p>
                    <button class="modal-button">Voir les détails</button>
                </div>

                <!-- Section droite --
                <div class="modal-page modal-right">
                    <img src="path-to-your-image.jpg" alt="Image de l'œuvre" />
                </div>
                <div class="arrow left" onclick="navigateImage(-1)">&#10094;</div>
                <div class="arrow right" onclick="navigateImage(1)">&#10095;</div>
            </div> -->





        </div>

    </section>
</div>
<div class="conteneurBarreNavOeuvre">
    <nav class="navBarreNavOeuvre">
        <ul>
            <?php if ($data["currentPage"] > 1): ?>
                <li>
                    <a href="?controller=inspiration&action=afficheroeuvre&page=<?= $data["currentPage"] - 1 ?>#oeuvre">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($data["currentPage"] > 5): ?>
                <li>
                    <a
                        href="?controller=inspiration&action=afficheroeuvre&page=<?= max(1, $data["currentPage"] - 5) ?>#oeuvre">
                        <span class="dots">&bull;&bull;&bull;</span>
                    </a>
                </li>
            <?php endif ?>
            <?php
            $windowSize = 5;
            $start = max(1, $data["currentPage"] - floor($windowSize / 2));
            $end = min($data["taillePageNav"], $start + $windowSize - 1);
            $start = max(1, $end - $windowSize + 1); // Réajuster le début si on est proche de la fin
            ?>

            <?php for ($i = $start; $i <= $end; $i++): ?>
                <li>
                    <a <?php if ($i == $data["currentPage"]) {
                        echo "class=\"pageActive\"";
                    } ?>
                        href="?controller=inspiration&action=afficheroeuvre&page=<?= $i ?>#oeuvre">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor ?>

            <!-- Bouton pour avancer de 5 pages -->
            <?php if ($data["currentPage"] <= $data["taillePageNav"] - 5): ?>
                <li>
                    <a
                        href="?controller=inspiration&action=afficheroeuvre&page=<?= min($data["taillePageNav"], $data["currentPage"] + 5) ?>#oeuvre">
                        <span class="dots">&bull;&bull;&bull;</span>
                    </a>
                </li>
            <?php endif ?>

            <!-- Bouton Suivant -->
            <?php if ($data["currentPage"] < $data["taillePageNav"]): ?>
                <li>
                    <a href="?controller=inspiration&action=afficheroeuvre&page=<?= $data["currentPage"] + 1 ?>#oeuvre">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</div>

<script src="Content\js\pipette.js"></script>

<?php
require 'view_end.php';
?>