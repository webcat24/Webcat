<?php

class Controller_admin extends Controller {

    public function action_admin() {   
        $m = Model::getModel();
        
        // Récupérer les types de peinture depuis le modèle
        $typesPeinture = $m->recupererTypePeinture();
    
        // Passer les données à la vue
        $data = [
            "typesPeinture" => $typesPeinture
        ];
    
        // Rendu de la page admin avec les données
        $this->render("admin", $data);
    }

    public function action_add_product() {
        $m = Model::getModel();
        
        // Vérification si une requête POST a été envoyée
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["quantite"], $_POST["nom_type_peinture"])) {
            $quantite = htmlspecialchars($_POST["quantite"]);
            $nom_type_peinture = htmlspecialchars($_POST["nom_type_peinture"]);

            // Génération automatique d'Id_Materiel et d'Id_Couleur
            $id_materiel = rand(1000, 9999);
            $id_couleur = rand(1, 100);

            // Appel direct à la méthode addPeinture
            $m->addPeinture($id_materiel, $id_couleur, $quantite, $nom_type_peinture);

            // Redirection vers la page admin après ajout
            header("Location: ?controller=Admin&action=admin");
            exit;
        }

        // Si pas de requête POST, on redirige vers la page admin
        header("Location: ?controller=Admin&action=admin");
        exit;
    }

    public function action_default() {
        $this->action_admin();
    }
}

?>
