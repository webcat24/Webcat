<?php require "view_begin.php"; ?>






    <h1>Ajouter une peinture</h1>
    <form method="POST" action="/peinture/ajouter">
        <label for="id_materiel">ID Matériel :</label>
        <input type="number" id="id_materiel" name="id_materiel" required><br><br>

        <label for="quantite">Quantité :</label>
        <input type="number" id="quantite" name="quantite" required><br><br>

        <label for="nom_type_peinture">Type de peinture :</label>
<select id="nom_type_peinture" name="nom_type_peinture" required>
    <?php if (!empty($typesPeinture)): ?>
        <?php foreach ($typesPeinture as $type): ?>
            <option value="<?= htmlspecialchars($type['nom_type_peinture']) ?>">
                <?= htmlspecialchars($type['nom_type_peinture']) ?>
            </option>
        <?php endforeach; ?>
    <?php else: ?>
        <option disabled>Aucun type de peinture disponible</option>
    <?php endif; ?>
</select>


</select>
<br><br>

        <button type="submit">Ajouter</button>
    </form>

<?php require "view_end.php"; ?>
