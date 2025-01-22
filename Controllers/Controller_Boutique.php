<?php

class Controller_Boutique extends Controller {

    public function action_boutique() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["query"])){
            $test = create_sql_from_tokens(tokenize($_POST["query"]));
            var_dump($test);
        }
        $this->render("boutique");
    
    }

    public function action_default(){
        $this->action_boutique();
    }

}


?>