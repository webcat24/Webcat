<?php
class Controller_admin extends Controller {

    public function action_admin() {   
        $m = Model::getModel();
        $data = []; // Vous pouvez utiliser un tableau vide ou ajouter d'autres données si nécessaire

        // Rendu de la page admin avec le formulaire
        $this->render("admin", $data);
    }

    public function action_add_product() {
        $m = Model::getModel();

        // Vérification si une requête POST a été envoyée
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"], $_POST["price"], $_POST["description"])) {
            $name = htmlspecialchars($_POST["name"]);
            $price = floatval($_POST["price"]);
            $description = htmlspecialchars($_POST["description"]);
            $image = ""; // Vous pouvez gérer l'image plus tard, si nécessaire

            // Appel direct à la méthode addProducts
            $m->addProducts($name, $price, $description, $image);
        }

        // Redirection vers la page admin après ajout
        header("Location: ?controller=Admin&action=admin");
        exit;
    }

    public function action_default() {
        $this->action_admin();
    }
}
?>
