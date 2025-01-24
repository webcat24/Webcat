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
        $produits = $m->getProduits();
        if (isset($_GET["search"]) && $_GET["search"] != "") {
            $p = create_sql_from_tokens(tokenize(($_GET["search"])));
            if ($p != null) {
                $produits = $m->getListProduit($p);
            } else {
                $produits = [];
            }
        }
        header('Content-Type: application/json');
        echo json_encode($produits);
        exit;
    }

    public function action_addToCart()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_GET["id"])) {
            exit;
        }

        if (!isset($_SESSION["id"])) {
            header("Location: ?controller=Connexion&action=connexion");
            exit;
        }

        if (!isset($_GET["id"]) || empty($_GET["id"])) {
            header("Location: ?controller=boutique&action=boutique&error=missing_id");
            exit;
        }

        $idProduit = intval($_GET["id"]);
        $m = Model::getModel();

        $produit = $m->getProduitById($idProduit);
        if (!$produit) {
            header("Location: ?controller=boutique&action=boutique&error=product_not_found");
            exit;
        }

        $added = $m->addToPanier($_SESSION["id"], $idProduit);
        if ($added) {
            header("Location: ?controller=boutique&action=boutique&success=added_to_cart");
        } else {
            header("Location: ?controller=boutique&action=boutique&error=add_failed");
        }
        exit;
    }

}
