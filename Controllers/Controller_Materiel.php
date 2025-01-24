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
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Validation des champs requis
            if (!isset($_POST["description"], $_POST["prix"], $_POST["nom_materiel"])) {
                $this->redirectWithError("Les champs description, prix, et nom_materiel sont obligatoires.");
            }
    
            // Récupération et nettoyage des données
            $description = e($_POST["description"]);
            $prix = filter_var($_POST["prix"], FILTER_VALIDATE_FLOAT);
            $nom_materiel = e($_POST["nom_materiel"]);
            $type = $_POST["type"] ?? null;
    
            if ($prix === false) {
                $this->redirectWithError("Le prix doit être un nombre valide.");
            }
    
            // Gestion du fichier image
            $uploadFilePath = $this->handleFileUpload($_FILES['image'] ?? null);
            if (!$uploadFilePath) {
                $this->redirectWithError("Erreur lors du téléchargement de l'image.");
            }
    
            // Ajout de l'image et récupération de l'ID
            $idImage = $m->ajouterImage($uploadFilePath);
            if (!$idImage) {
                $this->redirectWithError("Erreur lors de l'ajout de l'image en base de données.");
            }
    
            // Insertion dans la table Materiel
            $idMateriel = $m->ajouterMateriel($description, $prix, $nom_materiel, $idImage);
            if (!$idMateriel) {
                $this->redirectWithError("Erreur lors de l'ajout du matériel en base de données.");
            }
    
            // Gestion des types spécifiques
            if ($type === "peinture" && isset($_POST["id_type_peinture"], $_POST["quantite"], $_POST["id_couleur"])) {
                $id_type_peinture = intval($_POST["id_type_peinture"]);
                $quantite = e($_POST["quantite"]);
                $id_couleur = intval($_POST["id_couleur"]);
    
                if (method_exists($m, 'ajouterPeinture')) {
                    $m->ajouterPeinture($idMateriel, $quantite, $id_type_peinture, $id_couleur);
                }
            } elseif ($type === "autre" && isset($_POST["type_materiel"])) {
                $typeMateriel = e($_POST["type_materiel"]);
    
                if (method_exists($m, 'ajouterAutreMateriel')) {
                    $m->ajouterAutreMateriel($idMateriel, $typeMateriel);
                }
            }
    
            // Redirection après succès
            header("Location: ?controller=Materiel&action=confirmation");
            exit;
        }
    
        // Redirection en cas d'échec de la méthode POST
        header("Location: ?controller=Materiel&action=materiel");
        exit;
    }
    
    // Fonction pour gérer l'upload du fichier
    private function handleFileUpload($file) {
        if (!$file || !isset($file['tmp_name'], $file['name'])) {
            return null;
        }
    
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $fileType = mime_content_type($file['tmp_name']);
        $fileName = basename($file['name']);
        $uploadDir = "Content/img/materiaux/";
        $uploadFilePath = $uploadDir . $fileName;
    
        if (!in_array($fileType, $allowedMimeTypes)) {
            return null;
        }
    
        if (!move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
            return null;
        }
    
        return $uploadFilePath;
    }
    
    // Fonction pour rediriger avec un message d'erreur
    private function redirectWithError($message) {
        echo "<script>alert('" . addslashes($message) . "'); window.location.href='?controller=Materiel&action=materiel';</script>";
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
   
    public function action_default() {
        $this->action_materiel(); 
    }
}
?>
