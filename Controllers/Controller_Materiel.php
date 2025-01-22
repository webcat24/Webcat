<?php

class Controller_materiel extends Controller {

   
    public function action_confirmation() {
        $data = [
            "message" => "Votre matériel a bien été ajouté !"
        ];
        $this->render("confirmation", $data);
    }

    // Méthode pour ajouter un matériel
   public function action_add_materiel() {
    $m = Model::getModel();

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["description"], $_POST["prix"], $_POST["nom_materiel"])) {
        $description = htmlspecialchars($_POST["description"]);
        $prix = floatval($_POST["prix"]);
        $nom_materiel = htmlspecialchars($_POST["nom_materiel"]);
        $type = $_POST["type"] ?? null;

        // Insérer dans Materiel et récupérer l'ID généré
        $idMateriel = $m->ajouterMateriel($description, $prix, $nom_materiel);

        if ($idMateriel) {
            if ($type === "peinture" && isset($_POST["id_type_peinture"], $_POST["quantite"], $_POST["id_couleur"])) {
                $id_type_peinture = intval($_POST["id_type_peinture"]);
                $quantite = htmlspecialchars($_POST["quantite"]);
                $id_couleur = intval($_POST["id_couleur"]);

                if (method_exists($m, 'ajouterPeinture')) {
                    $m->ajouterPeinture($idMateriel, $quantite, $id_type_peinture, $id_couleur);
                }
            } elseif ($type === "autre" && isset($_POST["type_materiel"])) {
                $typeMateriel = htmlspecialchars($_POST["type_materiel"]);

                if (method_exists($m, 'ajouterAutreMateriel')) {
                    $m->ajouterAutreMateriel($idMateriel, $typeMateriel);
                }
            }
        }

        // Redirection après ajout
        header("Location: ?controller=Materiel&action=confirmation");
        exit;
    }

    // Redirection en cas d'échec
    header("Location: ?controller=Materiel&action=materiel");
    exit;
}

    
    
    public function action_materiel() {
        $m = Model::getModel();

        $materiels = method_exists($m, 'recupererMateriels') ? $m->recupererMateriels() : [];
        $couleurs = method_exists($m, 'recupererCouleurs') ? $m->recupererCouleurs() : [];
        $typesPeinture = method_exists($m, 'recupererTypePeinture') ? $m->recupererTypePeinture() : [];
       
        
        $data = [
            "materiels" => $materiels,
            "couleurs" => $couleurs,
            "typesPeinture" => $typesPeinture
        ];

        $this->render("materiel", $data);
    }

    // Méthode par défaut
    public function action_default() {
        $this->action_materiel(); 
    }
}
?>
