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
        <!-- <ul class="items">
            <li data-category="Watch" data-color="Blue,Rouge" data-shade="col">
                <picture>
                    <img src="Content/img/R.jfif" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Watch</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$45.78</h4>
            </li>
            <li data-category="Blazer" data-color="Blue" data-shade="col">
                <picture>
                    <img src="Content/img/arbre.avif" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Blazer</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$35.78</h4>
            </li>
            <li data-category="Watch" data-color="Blue" data-shade="col">
                <picture>
                    <img src="Content/img/er.jfif" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Watch</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$40.78</h4>
            </li>
            <li data-category="Blazer" data-color="Blue" data-shade="col">
                <picture>
                    <img src="Content/img/oeuvre1.jpg" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Blazer</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$42.78</h4>
            </li>
            <li data-category="Watch" data-color="Blue" data-shade="col">
                <picture>
                    <img src="Content/img/oeuvre2.jpg" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Watch</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$46.78</h4>
            </li>
            <li data-category="Blazer" data-color="Blue" data-shade="col">
                <picture>
                    <img src="Content/img/oeuvre3.jpg" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Blazer</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$55.78</h4>
            </li>
            <li data-category="Shoes" data-color="Blue" data-shade="col">
                <picture>
                    <img src="Content/img/oeuvre4.jpg" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Shoes</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$25.78</h4>
            </li>
            <li data-category="Mobile" data-color="Blue" data-shade="col">
                <picture>
                    <img src="Content/img/image.png" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Mobile</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$20.78</h4>
            </li>
            <li data-category="Shoes" data-color="Blue" data-shade="col">
                <picture>
                    <img src="image/so1.png" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Shoes</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$15.78</h4>
            </li>
            <li data-category="Shoes" data-color="Blue" data-shade="col">
                <picture>
                    <img src="image/so2.png" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Shoes</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$22.78</h4>
            </li>
            <li data-category="Mobile" data-color="Blue" data-shade="col">
                <picture>
                    <img src="image/one.png" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Mobile</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$33.78</h4>
            </li>
            <li data-category="Shoes" data-color="Blue" data-shade="col">
                <picture>
                    <img src="image/so3.png" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="far fa-heart"></i></span>
                        <span><i class="far fa-share-square"></i></span>
                        <span><i class="fas fa-shopping-basket"></i></span>
                    </p>
                    <strong>Shoes</strong>
                    <span>Lorem, ipsum dolor sit amet consectetur.</span>

                </div>
                <h4>$44.78</h4>
            </li>
        </ul> -->
        <ul class="items">
            <?php foreach ($produits as $produit): ?>
                <li data-category="<?= htmlspecialchars($produit['categories']) ?>"
                    data-color="<?= htmlspecialchars($produit['colors']) ?>"
                    data-shade="<?= htmlspecialchars($produit['shades']) ?>">
                    <picture>
                        <img src="<?= htmlspecialchars($produit['id_image']) ?>"
                            alt="<?= htmlspecialchars($produit['nom_materiel']) ?>">
                    </picture>
                    <div class="detail">
                        <p class="icon">
                            <span><i class="far fa-heart"></i></span>
                            <span><i class="far fa-share-square"></i></span>
                            <span><i class="fas fa-shopping-basket"></i></span>
                        </p>
                        <strong><?= htmlspecialchars($produit['nom_materiel']) ?></strong>
                        <span><?= htmlspecialchars($produit['description_materiel']) ?></span>
                    </div>
                    <h4>$<?= number_format($produit['prix_materiel'], 2) ?></h4>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php
require 'view_end.php';
?>