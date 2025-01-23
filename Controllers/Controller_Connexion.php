<?php
class Controller_Connexion extends Controller
{
    public function action_connexion()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $m = Model::getModel();

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["email"]) && $m->isUserInDB($_POST["email"])) {
            $user = $m->getUserInfoBy('mail', $_POST["email"]);

            // Stocker les informations dans la session
            $_SESSION["id"] = $user["Id_Utilisateur"];
            $_SESSION["is_connected"] = true;
            $_SESSION["user_name"] = $user["nom_utilisateur"];
            $_SESSION["user_prenom"] = $user["prenom_utilisateur"];
            $_SESSION["user_email"] = $user["mail"];
            header("Location: ?controller=Utilisateur");
            exit;
        }
        $this->render("connexion");
    }
    public function action_default()
    {
        $this->action_connexion();
    }

    public function action_register()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $m = Model::getModel();
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["email"]) && !$m->isUserInDB($_POST["email"])) {
            $infos["email"] = $_POST["email"];
            $m->addUserInDB($infos);
            header("Location: ?controller=Connexion&action=connexion");
            exit;
        }

        $this->render("register");
    }
    public function action_logout()
    {
        session_start();

        // Détruit la session
        session_destroy();
        header("Location: ?controller=Connexion&action=connexion");
        exit;
    }

}

?>