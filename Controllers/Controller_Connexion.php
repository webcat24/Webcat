<?php

class Controller_Connexion extends Controller {

    public function action_connexion() {
        $m = Model::getModel();
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["email"]) && $m->isUserInDB($_POST["email"])){
            $_SESSION["id"] = $m->getUserID($_POST["email"]);
            header("Location: ?controller=Utilisateur");
        }
        $this->render("connexion");
    }

    public function action_default(){
        $this->action_connexion();
    }

    public function action_register(){
        $m = Model::getModel();
        //register_check();
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["email"]) && !$m->isUserInDB($_POST["email"])){
            $infos["email"] = $_POST["email"];
            $m->addUserInDB($infos);
            header("Location: ?controller=Connexion&action=connexion");
        }
        $this->render("register");
    }

    private function register_check(){
        return;
    }
}


?>