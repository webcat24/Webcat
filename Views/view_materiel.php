<?php require "view_begin.php"; ?>
<form action="?controller=Materiel&action=add_materiel" method="POST" enctype="multipart/form-data">
    <!-- Description -->
    <label for="description">Description :</label>
    <input type="text" id="description" name="description" placeholder="Entrez la description" required>

    <!-- Prix -->
    <label for="prix">Prix :</label>
    <input type="number" id="prix" name="prix" step="0.01" placeholder="Entrez le prix" required>

    <!-- Nom -->
    <label for="nom_materiel">Nom du matériel :</label>
    <input type="text" id="nom_materiel" name="nom_materiel" placeholder="Entrez le nom du matériel" required>


    <button type="submit">Ajouter</button>
</form>
<?php require "view_end.php"; ?>

