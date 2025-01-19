<?php $title= "Mon compte";
require "view_begin.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Favoris</h1>
        <?php foreach($fav as $v): ?>
            <div style="background: #F5F5DC; border: 5px solid black;">
               <p><?= $v["nom"] ?></p>
               <p>Prix : <?= $v["prix"] ?>€</p>
               <p><img src="<?= $v["img_link"] ?>" alt="image du produit"></p>
        </div>
        <?php endforeach ?>
        <h1>Panier</h1>
        <?php foreach($panier as $v): ?>
            <div style="background: #F5F5DC; border: 5px solid black;">
               <p><?= $v["nom"] ?></p>
               <p>Prix : <?= $v["prix"] ?>€</p>
               <p><img src="<?= $v["img_link"] ?>" alt="image du produit"></p>
        </div>
        <?php endforeach ?>
        <h1>Historique</h1>
        <?php foreach($historique as $v): ?>
            <div style="background: #F5F5DC; border: 5px solid black;">
               <p><?= $v["nom"] ?></p>
               <p>Prix : <?= $v["prix"] ?>€</p>
               <p><img src="<?= $v["img_link"] ?>" alt="image du produit"></p>
        </div>
        <?php endforeach ?>
    </div>
</body>
</html>

<?php require "view_end.php"; ?>