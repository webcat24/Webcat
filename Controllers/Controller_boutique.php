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

        $lengthProduitsStocked = $m->getNombreTotalProduits();
        $totalProduits = isset($lengthProduitsStocked["quantite"]) ? $lengthProduitsStocked["quantite"] : 0;

        $nbrPagination = round($totalProduits / 4, 0);

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        if ($page <= 0 || $page > $nbrPagination) {
            $page = 1;
        }

        $debut = 4 * ($page - 1) + 1;
        $fin = 4 * $page;
        $data = [
            "produits" => $m->getProduitsPaginés($debut, $fin),
            "taillePageNav" => $nbrPagination,
            "currentPage" => $page,
        ];

        $this->render('boutique', $data);
    }





}
