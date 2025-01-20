<?php $title = "Mon compte";
$bodyClass = "profile";
require "view_begin.php";
?>
<section id="content">
    <nav>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <a href="#" class="profile">
            <img src="Content/img/image.png">
        </a>
    </nav>
    <main>
        <h3>Favoris</h3>
        <ul class="box-info">
            <?php foreach ($fav as $v): ?>
                <li>
                    <img src="<?= htmlspecialchars($v["img_link"]) ?>" alt="image du produit" class='bx'>
                    <span class="text">
                        <h3><?= htmlspecialchars($v["nom"]) ?></h3>
                        <p>Prix : <?= htmlspecialchars($v["prix"]) ?>€</p>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Historique</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Tableau</th>
                            <th>Prix</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historique as $v): ?>
                            <tr>
                                <td>
                                    <img src="<?= $v["img_link"] ?>" alt="image du produit">
                                    <p><?= $v["nom"] ?></p>
                                </td>
                                <td><?= $v["prix"] ?>€ </td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Panier</h3>
                    <div class="actions">
                        <button class="btn add-item" title="Ajouter un produit">
                            <i class='bx bx-plus'></i>
                        </button>
                        <button class="btn filter-items" title="Filtrer les produits">
                            <i class='bx bx-filter'></i>
                        </button>
                    </div>
                </div>
                <ul class="todo-list">
                    <?php foreach ($panier as $v): ?>
                        <li class="completed">
                            <div class="product-image">
                                <img src="<?= htmlspecialchars($v["img_link"]) ?>" alt="image du produit">
                            </div>
                            <div class="product-details">
                                <p class="product-name">Nom : <?= htmlspecialchars($v["nom"]) ?></p>
                                <p class="product-price">Prix : <?= htmlspecialchars($v["prix"]) ?>€</p>
                            </div>
                            <div class="product-actions">
                                <button class="btn remove-item" title="Retirer">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        </div>
    </main>
</section>
<?php require "view_end.php"; ?>