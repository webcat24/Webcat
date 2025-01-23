<?php

class Controller_Utilisateur extends Controller
{

    public function action_Compte()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION["is_connected"]) || $_SESSION["is_connected"] !== true) {
            header("Location: ?controller=Connexion&action=connexion");
            exit;
        }

        // Récupération des données
        $m = Model::getModel();
        $fav = $m->getFav(limit: 10);
        $panier = $m->getPanier(limit: 10);
        $historique = $m->getHistorique(limit: 10);

        $data = ["fav" => $fav, "panier" => $panier, "historique" => $historique];
        $this->render("compte", $data);
    }

    public function action_default()
    {
        $this->action_Compte();
    }
    public function action_Profile()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION["is_connected"]) || $_SESSION["is_connected"] !== true) {
            header("Location: ?controller=Connexion&action=connexion");
            exit;
        }

        // Récupérer les informations utilisateur par ID
        $m = Model::getModel();
        $userInfo = $m->getUserInfoBy('Id_Utilisateur', $_SESSION["id"]);

        $this->render("profile", ["userInfo" => $userInfo]);
    }

}


?>