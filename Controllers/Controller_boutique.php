<?php
/**
 * @brief Classe du gestionnaire contenant toutes les fonctionnalités du gestionnaire
 * 
 * Pas encore fonctionnel
 *
 */
class Controller_boutique extends Controller
{
    /**
     * @inheritDoc
     * Action par défaut qui appelle l'action clients
     */
    public function action_default()
    {
        $this->action_boutique();
    }

    public function action_boutique()
    {
        $m = Model::getModel();

        $allProduits = $m->getProduits();
        $data = [
            "produits" => $allProduits,
        ];
        $this->render('boutique', $data);
    }

    public function action_apiGetProduits()
    {
        $m = Model::getModel();
        /*if(! isset($_SESSION["produits"])){
            $_SESSION["produits"] = $m->getProduits();
        }*/
        $produits = $m->getProduits();//$_SESSION["produits"];
        if(isset($_GET["search"]) && $_GET["search"] != ""){
            $p = create_sql_from_tokens(tokenize(($_GET["search"])));
            //var_dump($p);
            if ($p != null) {
                $produits = $m->getListProduit($p);
            }
            else{
                $produits = [];
            }
        }
        header('Content-Type: application/json');
        echo json_encode($produits);
        exit;
        // var_dump($produits);
        // $this->render('test');
    }


}
