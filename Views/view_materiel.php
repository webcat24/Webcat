<?php
$title = "Administrateur";
$bodyClass = "background-modifie";
require "view_begin.php";
?>

<div id="cont_co" class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 form_co">
            <p class="ma"><strong>Ajouter du matériel</strong></p>

            <form action="?controller=Materiel&action=add_materiel" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- Description -->
                    <label for="description">Description</label>
                    <input class="form-control" type="text" id="description" name="description" placeholder="Entrez la description" required>
                </div>
                <div class="form-group">
                    <!-- Prix -->
                    <label for="prix">Prix</label>
                    <input class="form-control" type="number" id="prix" name="prix" step="0.01" placeholder="Entrez le prix" required>
                </div>
                <div class="form-group">
                    <!-- Nom -->
                    <label for="nom_materiel">Nom du matériel</label>
                    <input class="form-control" type="text" id="nom_materiel" name="nom_materiel" placeholder="Entrez le nom du matériel" required>
                </div>
                <label>
                    <input class="bouton3" type="submit" value="Ajouter" />
                </label>
            </form>
        </div>
    </div>
</div>


<?php require "view_end.php"; ?>

