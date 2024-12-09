<?php
$title = "Oeuvres";
require 'view_begin.php';
?>
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
            <div class="dish">
                <img src="Content/img/R.jfif" alt="Dish Image">
                <h2>Nom</h2>
                <span>Nom de l'artist</span>
                <label for="color-select" class="multicolor-text">Couleur :</label>
                <select id="color-select" class="color-dropdown">
                    <option value="red" style="color: red;">Rouge</option>
                    <option value="blue" style="color: blue;">Bleu</option>
                    <option value="green" style="color: green;">Vert</option>
                    <option value="yellow" style="color: yellow;">Jaune</option>
                </select>
                <!-- <a href="#" class="buy-button">Acheter</a> -->
            </div>
            <div class="dish">
                <img src="Content/img/arbre.avif">
                <h2>Nom</h2>
                <span>Nom de l'artist</span>
                <label for="color-select" class="multicolor-text">Couleur :</label>
                <select id="color-select" class="color-dropdown">
                    <option value="red" style="color: red;">Rouge</option>
                    <option value="blue" style="color: blue;">Bleu</option>
                    <option value="green" style="color: green;">Vert</option>
                    <option value="yellow" style="color: yellow;">Jaune</option>
                </select>
                <!-- <a href="#">bUY</a> -->
            </div>
            <div class="dish">
                <img src="Content/img/er.jfif">
                <h2>Nom</h2>
                <span>Nom de l'artist</span>
                <label for="color-select" class="multicolor-text">Couleur :</label>
                <select id="color-select" class="color-dropdown">
                    <option value="red" style="color: red;">Rouge</option>
                    <option value="blue" style="color: blue;">Bleu</option>
                    <option value="green" style="color: green;">Vert</option>
                    <option value="yellow" style="color: yellow;">Jaune</option>
                </select>
                <!-- <a href="#">bUY</a> -->
            </div>
            <div class="dish">
                <img src="Content/img/arb.avif">
                <h2>Nom</h2>
                <span>Nom de l'artist</span>
                <label for="color-select" class="multicolor-text">Couleur :</label>
                <select id="color-select" class="color-dropdown">
                    <option value="red" style="color: red;">Rouge</option>
                    <option value="blue" style="color: blue;">Bleu</option>
                    <option value="green" style="color: green;">Vert</option>
                    <option value="yellow" style="color: yellow;">Jaune</option>
                </select>
                <!-- <a href="#">bUY</a> -->
            </div>
            <div class="dish">
                <img src="Content/img/arbr.avif">
                <h2>Nom</h2>
                <span>Nom de l'artist</span>
                <label for="color-select" class="multicolor-text">Couleur :</label>
                <select id="color-select" class="color-dropdown">
                    <option value="red" style="color: red;">Rouge</option>
                    <option value="blue" style="color: blue;">Bleu</option>
                    <option value="green" style="color: green;">Vert</option>
                    <option value="yellow" style="color: yellow;">Jaune</option>
                </select>
                <!-- <a href="#">bUY</a> -->
            </div>
            <div class="dish">
                <img src="Content/img/R.jfif">
                <h2>Nom</h2>
                <span>Nom de l'artist</span>
                <label for="color-select" class="multicolor-text">Couleur :</label>
                <select id="color-select" class="color-dropdown">
                    <option value="red" style="color: red;">Rouge</option>
                    <option value="blue" style="color: blue;">Bleu</option>
                    <option value="green" style="color: green;">Vert</option>
                    <option value="yellow" style="color: yellow;">Jaune</option>
                </select>
            </div>
            <div class="modal">
                <span class="close" onclick="closeModal()">&times;</span>
                <img src="" alt="Fullscreen Image">
                <div class="arrow left" onclick="navigateImage(-1)">&#10094;</div>
                <div class="arrow right" onclick="navigateImage(1)">&#10095;</div>
            </div>
        </div>
    </section>
</div>
<?php
require 'view_end.php';
?>