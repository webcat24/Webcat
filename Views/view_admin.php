<?php require "view_begin.php"; ?>

    <h1>Ajouter un produit</h1>
    <form action="?action=add_product" method="POST">
        <label for="name">Nom du produit :</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Prix :</label>
        <input type="number" step="0.01" id="price" name="price" required><br><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description"></textarea><br><br>

        <button type="submit">Ajouter</button>
    </form>
</body>

<?php require "view_end.php"; ?>