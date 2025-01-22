<?php
$title = "Boutique";
$bodyClass = "profile";
require 'view_begin.php';
?>
<div class="product-container">
    <div class="filters">
        <div>
            <div class="filter-title">Catégories</div>
            <ul class="indicator categories"></ul>
        </div>

        <div>
            <div class="filter-title">Couleurs</div>
            <ul class="indicator colors"></ul>
        </div>

        <div>
            <div class="filter-title">Nuances</div>
            <ul class="indicator shades"></ul>
        </div>
    </div>
    <div class="product-field">
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
        <ul class="items">
            <?php foreach ($produits as $produit): ?>
                <li class="product-item" data-category="<?= htmlspecialchars($produit['categories'] ?? 'Non spécifié') ?>"
                    data-color="<?= htmlspecialchars($produit['colors'] ?? 'rgb(0,0,0)') ?>"
                    data-shade="<?= htmlspecialchars($produit['shades'] ?? 'Non spécifié') ?>"
                    data-name="<?= htmlspecialchars($produit['categories'] ?? '') ?>"
                    data-description="<?= htmlspecialchars($produit['description_materiel'] ?? '') ?>"
                    data-price="<?= number_format($produit['prix_materiel'] ?? 0, 2) ?>"
                    data-image="<?= htmlspecialchars($produit['image'] ?? '') ?>"
                    data-code_hexadecimal="<?= htmlspecialchars($produit['code_hexadecimal'] ?? '') ?>">

                    <picture>
                        <img src="<?= htmlspecialchars($produit['image'] ?? '') ?>"
                            alt="<?= htmlspecialchars($produit['categories'] ?? '') ?>">
                    </picture>
                    <div class="detail">
                        <p class="icon">
                            <span><i class="far fa-heart"></i></span>
                            <span><i class="far fa-share-square"></i></span>
                            <span><i class="fas fa-shopping-basket"></i></span>
                        </p>
                        <strong><?= htmlspecialchars($produit['categories'] ?? '') ?></strong>
                        <!-- <span><?= htmlspecialchars($produit['description_materiel'] ?? '') ?></span> -->
                    </div>
                    <h4>$<?= number_format($produit['prix_materiel'] ?? 0, 2) ?></h4>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php foreach ($produits as $produit): ?>

    <div class="modalboutique">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <div class="modal-body">
                <div class="modal-left">
                    <img id="modal-image" src="" alt="Product Image">
                    <div class="navigation-buttons">
                        <span id="prev-button" class="nav-button">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <span id="next-button" class="nav-button">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </div>
                </div>

                <div class="modal-right">
                    <h2 id="modal-title"></h2>
                    <p id="modal-price"></p>
                    <button><span><i class="fas fa-shopping-basket"></i></span></button>
                    <h3>Information produit</h3>
                    <p id="modal-description">Description</p>

                    <ul>
                        <li id="modal-color">Couleurs : </li>
                        <li id="modal-hex">Code Hex : </li>
                        <li>Collection</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- <div class="conteneurBarreNavOeuvre">
    <nav class="navBarreNavOeuvre">
        <ul>
            <!-- Bouton Précédent --
            <?php if ($currentPage > 1): ?>
                <li>
                    <a href="?controller=boutique&action=boutique&page=<?= $currentPage - 1 ?>">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            <?php endif ?>

            <!-- Bouton pour reculer de 5 pages --
            <?php if ($currentPage > 5): ?>
                <li>
                    <a href="?controller=boutique&action=boutique&page=<?= max(1, $currentPage - 5) ?>">
                        <span class="dots">&bull;&bull;&bull;</span>
                    </a>
                </li>
            <?php endif ?>

            <?php
            $windowSize = 5;
            $start = max(1, $currentPage - floor($windowSize / 2));
            $end = min($taillePageNav, $start + $windowSize - 1);
            $start = max(1, $end - $windowSize + 1); // Ajustement
            ?>

            <?php for ($i = $start; $i <= $end; $i++): ?>
                <li>
                    <a <?php if ($i == $currentPage)
                        echo "class=\"pageActive\""; ?>
                        href="?controller=boutique&action=boutique&page=<?= $i ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor ?>

            <!-- Bouton pour avancer de 5 pages --
            <?php if ($currentPage <= $taillePageNav - 5): ?>
                <li>
                    <a href="?controller=boutique&action=boutique&page=<?= min($taillePageNav, $currentPage + 5) ?>">
                        <span class="dots">&bull;&bull;&bull;</span>
                    </a>
                </li>
            <?php endif ?>

            <!-- Bouton Suivant --
            <?php if ($currentPage < $taillePageNav): ?>
                <li>
                    <a href="?controller=boutique&action=boutique&page=<?= $currentPage + 1 ?>">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</div> -->



<?php
require 'view_end.php';
?>