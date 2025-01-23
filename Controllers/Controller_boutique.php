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



}
