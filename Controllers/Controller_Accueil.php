<?php 
class Controller_Accueil extends Controller {

    public function action_accueil(){   
        $m=Model::getModel();
        $allProduits = $m->getProduits();
        $fiveOeuvres = $m->getOeuvres();
        $data = [
            "produits" => $allProduits,
            "dataTableaux" => $fiveOeuvres,
        ];
        $this->render("accueil", $data);
    }

    public function action_default(){
        $this->action_accueil();
    }
}
?>