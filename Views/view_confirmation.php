<?php
$title = "Confirmation";
$bodyClass = "background-modifie";
require "view_begin.php";
?>

<div class="confi">
    <h1> Votre produit a été ajouté avec succés !<h1>
    <img class="logoconfi" src="Content/img/logo_rond.png" alt="">
    <a class="log-out-confi" href="?controller=Connexion&action=logout">Se déconnecter</a>
</div>

<?php require "view_end.php"; ?>