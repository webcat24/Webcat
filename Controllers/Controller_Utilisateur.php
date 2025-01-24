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
        $m = Model::getModel();
        $userInfo = $m->getUserInfoBy('Id_Utilisateur', $_SESSION["id"]);

        $this->render("profile", ["userInfo" => $userInfo]);
    }

    public function action_removeFromCart()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION["id"])) {
            header("Location: ?controller=Connexion&action=connexion");
            exit;
        }

        if (!isset($_GET["id"])) {
            header("Location: ?controller=Utilisateur&action=compte&error=missing_id");
            exit;
        }

        $idMateriel = intval($_GET["id"]);
        $m = Model::getModel();

        $removed = $m->removeFromPanier($_SESSION["id"], $idMateriel);
        if ($removed) {
            header("Location: ?controller=Utilisateur&action=compte&success=removed_from_cart");
        } else {
            header("Location: ?controller=Utilisateur&action=compte&error=remove_failed");
        }
        exit;
    }





}


?>