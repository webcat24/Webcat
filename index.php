<?php
session_start();
//Pour avoir la fonction e()
require_once "Utils/functions.php";
// Inclusion du modèle
require_once "Models/Model.php";
// Inclusion de la classe Controller
require_once "Controllers/Controller.php";

// Liste des contrôleurs autorisés
$controllers = ["Utilisateur", "Connexion", "inspiration","Accueil""Utilisateur", "Connexion", "Admin", "Materiel"];
$controller_default = "ConnexionAccueil";

// Récupérer le contrôleur depuis l'URL ou utiliser le contrôleur par défaut
if (isset($_GET['controller']) && in_array($_GET['controller'], $controllers)) {
    $nom_controller = $_GET['controller'];
} else {
    $nom_controller = $controller_default;
}

// Déterminer le nom de la classe et du fichier du contrôleur
$nom_classe = 'Controller_' . ucfirst(strtolower($nom_controller));
$nom_fichier = 'Controllers/' . $nom_classe . '.php';

// Vérifiez si le fichier existe et est accessible
if (is_readable($nom_fichier)) {
    require_once $nom_fichier;

    // Instancier dynamiquement le contrôleur
    if (class_exists($nom_classe)) {
        $controller = new $nom_classe();

        // Déterminer l'action à exécuter
        $action = isset($_GET['action']) ? 'action_' . strtolower($_GET['action']) : 'action_default';

        // Vérifiez si l'action existe dans le contrôleur
        if (method_exists($controller, $action)) {
            $controller->$action(); // Appeler l'action
        } else {
            die("Erreur 404 : L'action '$action' est introuvable dans le contrôleur '$nom_classe'.");
        }
    } else {
        die("Erreur 404 : La classe '$nom_classe' est introuvable.");
    }
} else {
    die("Erreur 404 : Le fichier du contrôleur '$nom_fichier' est introuvable.");
}
