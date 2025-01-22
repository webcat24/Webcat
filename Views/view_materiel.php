<?php require "view_begin.php"; ?>

<form action="?controller=Materiel&action=add_materiel" method="POST" enctype="multipart/form-data">
    <label for="description">Description :</label>
    <input type="text" id="description" name="description" placeholder="Entrez la description" required>

    <label for="prix">Prix :</label>
    <input type="number" id="prix" name="prix" step="0.01" placeholder="Entrez le prix" required>

    <!-- image -->
    <label for="image">Image du produit :</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <label for="nom_materiel">Nom du matériel :</label>
    <input type="text" id="nom_materiel" name="nom_materiel" placeholder="Entrez le nom du matériel" required>

    <label for="type">Type de matériel :</label>
    <select id="type" name="type" onchange="toggleFields()">
        <option value="peinture">Peinture</option>
        <option value="autre">Autre matériau</option>
    </select>

    <!-- Champs spécifiques pour Peinture -->
    <div id="peintureFields" style="display: none;">
        <label for="id_type_peinture">Type de peinture :</label>
        <select id="id_type_peinture" name="id_type_peinture">
            <option value="" disabled selected>Choisissez un type de peinture</option>
            <?php foreach ($typesPeinture as $typePeinture): ?>
                <option value="<?= htmlspecialchars($typePeinture['id_type_peinture']) ?>">
                    <?= htmlspecialchars($typePeinture['nom_type_peinture']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="quantite">Quantité :</label>
        <input type="text" id="quantite" name="quantite" placeholder="Entrez la quantité">

        <label for="id_couleur">Couleur :</label>
        <select id="id_couleur" name="id_couleur">
            <option value="" disabled selected>Choisissez une couleur</option>
            <?php foreach ($couleurs as $couleur): ?>
                <option value="<?= htmlspecialchars($couleur['id_couleur']) ?>">
                    <?= htmlspecialchars($couleur['coloris']) ?> (<?= htmlspecialchars($couleur['code_hexadecimal']) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Champs spécifiques pour Autre matériau -->
    <div id="autreFields" style="display: none;">
        <label for="type_materiel">Type de matériau :</label>
        <input type="text" id="type_materiel" name="type_materiel" placeholder="Entrez le type de matériau">
    </div>

    <button type="submit">Ajouter</button>
</form>

<script>
    function toggleFields() {
        const type = document.getElementById("type").value;
        document.getElementById("peintureFields").style.display = (type === "peinture") ? "block" : "none";
        document.getElementById("autreFields").style.display = (type === "autre") ? "block" : "none";
    }
</script>

<?php require "view_end.php"; ?>
