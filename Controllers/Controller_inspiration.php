<?php
/**
 * @brief Classe du gestionnaire contenant toutes les fonctionnalités du gestionnaire
 * 
 * Pas encore fonctionnel
 *
 */
class Controller_inspiration extends Controller
{
    /**
     * @inheritDoc
     * Action par défaut qui appelle l'action clients
     */
    public function action_default()
    {
        $this->action_afficherinspiration();
    }

    public function action_afficherinspiration()
    {

        $this->render('inspiration');
    }
    public function action_afficheroeuvre()
    {
        $m = Model::getModel();

        // Récupérer le nombre total d'œuvres
        $lenghtOeuvresStocked = $m->getNombreTotalOeuvres();
        $totalOeuvres = isset($lenghtOeuvresStocked["quantite"]) ? $lenghtOeuvresStocked["quantite"] : 0;

        // Calcul du nombre total de pages
        $nbrPagination = round($totalOeuvres / 9, 0);

        // Récupérer la page demandée et valider
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // Convertir en entier

        // Vérification que la page est un entier positif et si elle ne depasse pas le nbr de pagination
        if ($page <= 0 || $page > $nbrPagination) {
            $page = 1;  // Valeur par défaut
        }

        // Calcul des indices de début et de fin
        $debut = 9 * ($page-1) + 1;
        $fin =  9 * $page;

        $data = [
            "dataTableaux" => $m->getOeuvresWithTheirArtisteAndImg($debut, $fin),
            "taillePageNav" => $nbrPagination,
            "currentPage" => $page
        ];

        $this->render('oeuvre', $data);
    }
    public function action_afficherentreprise()
    {

        $this->render('entreprise');
    }
    // public function action_affichepalettes()
    // {

    //     $this->render('palettes');
    // }

    public function action_affichepalettes()
    {
        $model = Model::getModel();
        $palettes = $model->getPalettes();

        // Organiser les palettes et leurs couleurs
        $palette_data = [];
        foreach ($palettes as $row) {
            $palette_name = $row['palette_name'];
            if (!isset($palette_data[$palette_name])) {
                $palette_data[$palette_name] = [];
            }
            $palette_data[$palette_name][] = [
                'color_name' => $row['color_name'],
                'hex_code' => $row['hex_code']
            ];
        }

        // Envoyer les données à la vue
        $this->render('palettes', ['palettes' => $palette_data]);
    }
    public function action_boutique()
    {
        $model = Model::getModel();

        $produits = $model->getProduits();

        $this->render('boutique', ['produits' => $produits]);
    }



}
