<?php 
class Controller_Accueil extends Controller {

    public function action_accueil(){   
        $m=Model::getModel();
        $this->render("accueil");
    }

    public function action_default(){
        $this->action_accueil();
    }
}
?>