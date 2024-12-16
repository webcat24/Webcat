<?php $title= "S'enregistrer";
require "view_begin.php";
?>

<style>
    body {
        background-image: url('Content/img/pont-monet.jpeg'); /* Remplacez par le chemin de votre image */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        margin: 0; /* Supprime les marges par défaut */
    }
</style>

    <!--container-fluid permet d'obtenir un affichage responsive-->
    <div id="cont_co" class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12 form_co">
                <p class="co"><strong>Créer un compte</strong></p>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="id">
                            <img class='icone_co' src='Content/img/mail.png'/>
                            Email
                        </label>
                        <input class="form-control" type="text" name="email" id="email" required/>
                    </div>
                    
                    <div class="form-group">
                        <label for="mdp">
                            <img class='icone_co' src='Content/img/mdp.png' />
                            Mot de passe
                        </label>
                        <input class="form-control" type="password" name="mdp" id="mdp" required/>
                    </div>
                    <p>
                        <a href="?controller=Connexion&action=connexion">Se connecter</a>
                    </p>
                    <label>
                        <input class="bouton" type="submit" value="S'enregistrer" />
                    </label>
                </form>
            </div>
        </div>
    </div>

<?php require "view_end.php"; ?>