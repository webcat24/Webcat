<?php

class Controller_materiel extends Controller {

    // Méthode de confirmation
    public function action_confirmation() {
        // Données spécifiques à passer à la vue
        $data = [
            "message" => "Votre matériel a bien été ajouté !"
        ];

        // Rendu de la vue de confirmation
        $this->render("confirmation", $data);
    }

    // Méthode pour ajouter un matériel
    public function action_add_materiel() {
        $m = Model::getModel();

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["description"], $_POST["prix"], $_POST["nom_materiel"])) {
            var_dump($_POST);
            $description = htmlspecialchars($_POST["description"]);
            $prix = floatval($_POST["prix"]);
            $nom_materiel = htmlspecialchars($_POST["nom_materiel"]);

            if (method_exists($m, 'ajouterMateriel')) {
                $m->ajouterMateriel($description, $prix, $nom_materiel);

                
                header("Location: ?controller=Materiel&action=confirmation");
                exit;
            }
        }

        
        header("Location: ?controller=Materiel&action=materiel");
        exit;
    }

   
    public function action_materiel() {
        $m = Model::getModel();

       
        if (method_exists($m, 'recupererMateriels')) {
            $materiels = $m->recupererMateriels();
        } else {
            $materiels = [];
        }

        
        $data = ["materiels" => $materiels];

        
        $this->render("materiel", $data);
    }

   
    public function action_default() {
        $this->action_materiel(); 
    }
}
?>
