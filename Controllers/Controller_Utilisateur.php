<?php

class Controller_Utilisateur extends Controller {

    public function action_Compte() {
        $m = Model::getModel();
        $fav = $m->getFav(limit: 10);
        $panier = $m->getPanier(limit: 10);
        $historique = $m->getHistorique(limit: 10);
        $data = ["fav" => $fav, "panier" => $panier, "historique" => $historique];
        $this->render("compte", $data);
    }

    public function action_default(){
        $this->action_Compte();
    }
}


?>