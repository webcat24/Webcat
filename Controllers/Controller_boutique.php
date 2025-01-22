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
    // public function action_boutique()
    // {
    //     $m = Model::getModel();

    //     $lengthProduitsStocked = $m->getNombreTotalProduits();
    //     $totalProduits = isset($lengthProduitsStocked["quantite"]) ? $lengthProduitsStocked["quantite"] : 0;

    //     $nbrPagination = round($totalProduits / 4, 0);

    //     $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

    //     if ($page <= 0 || $page > $nbrPagination) {
    //         $page = 1;
    //     }

    //     $debut = 4 * ($page - 1) + 1;
    //     $fin = 4 * $page;
    //     $data = [
    //         "produits" => $m->getProduitsPaginés($debut, $fin),
    //         "taillePageNav" => $nbrPagination,
    //         "currentPage" => $page,
    //     ];

    //     $this->render('boutique', $data);
    // }



    public function action_boutique()
    {
        $m = Model::getModel();

        // Récupérer les filtres depuis l'URL
        $filters = [
            'category' => $_GET['category'] ?? null,
            'color' => $_GET['color'] ?? null,
            'shade' => $_GET['shade'] ?? null,
        ];

        // Récupérer tous les produits correspondant aux filtres
        $allProduits = $m->getProduits($filters); // Applique les filtres
        // $totalProduits = count($allProduits); // Compte le total des produits filtrés

        // // Calcul du nombre total de pages
        // $nbrPagination = ceil($totalProduits / 4);

        // // Déterminer la page actuelle
        // $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        // if ($page <= 0 || $page > $nbrPagination) {
        //     $page = 1;
        // }

        // // Calcul des indices pour la pagination
        // $debut = 4 * ($page - 1) + 1;
        // $fin = 4 * $page;

        // // Récupérer uniquement les produits de la page actuelle
        // $produitsPaginés = array_slice($allProduits, $debut - 1, 4);

        // Passer les données à la vue
        $data = [
            // "produits" => $produitsPaginés,
            // "taillePageNav" => $nbrPagination,
            // "currentPage" => $page,
            // "filters" => $filters, // Transmettre les filtres pour les inclure dans les liens
            "produits" => $allProduits,
        ];

        $this->render('boutique', $data);
    }


}
