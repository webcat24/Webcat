<?php

class Controller_Utilisateur extends Controller {

    public function action_Compte() {
        $m = Model::getModel();
        $fav = $m->getFav($limite = 10);
        $panier = $m->getPanier($limite = 10);
        $historique = $m->getHistorique($limite = 10);
        $data = ["fav" => $fav, "panier" => $panier, "historique" => $historique];
        var_dump($data);
        $this->render("compte", $data);
    }

    public function action_default(){
        $this->action_Compte();
    }
}


?>