<?php

class Controller_Boutique extends Controller {

    public function action_boutique() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["query"])){
            var_dump(tokenize($_POST["query"]));
        }
        $this->render("boutique");
    
    }

    public function action_default(){
        $this->action_boutique();
    }

}


?>