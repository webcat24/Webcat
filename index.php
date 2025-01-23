<?php
session_start();
//Pour avoir la fonction e()
require_once "Utils/functions.php";
// Inclusion du modèle
require_once "Models/Model.php";
// Inclusion de la classe Controller
require_once "Controllers/Controller.php";

//Liste des contrôleurs -- A RENSEIGNER
$controllers = ["Utilisateur", "Connexion", "inspiration", "Accueil", "boutique", "Materiel"];
//Nom du contrôleur par défaut-- A RENSEIGNER
$controller_default = "Accueil";

//API URL*********************************************************************
// Il faut stocker le mdp dans la BDD et le hasher + expiration des tokens (why not)
if (isset($_GET['api'])) {

    // Récupérer l'en-tête Authorization
    $headers = apache_request_headers();
    $authHeader = isset($headers['Authorization']) ? $headers['Authorization'] : null;

    if ($authHeader) {
        // Vérifier que le token commence par "Bearer"
        if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $token = $matches[1];  // Le token est dans $matches[1]

            // Vérifier si le token est valide (On compare avec notre token secret)
            if ($token === 'Webcat') {
                // Est-ce que c'est bien un string qui ne contient pas de caractère malveillant ?
                $api = filter_input(INPUT_GET, 'api', FILTER_SANITIZE_STRING);

                //-- A RENSEIGNER
                $apiDisponibles = ['allColors'];

                if (!in_array($api, $apiDisponibles)) {
                    header('Content-Type: application/json');
                    http_response_code(404);
                    echo json_encode(["error" => "API inconnue"]);
                    exit;
                }

                //Inclusion des API's
                require_once "Controllers/Controller_API.php";
                $controller = new Controller_API();

                if ($api == 'allColors') {
                    $controller->getAllColorsAPI();
                    exit;
                }
            } else {
                header('Content-Type: application/json');
                http_response_code(403);
                echo json_encode(["error" => "Accès interdit, token incorrect"]);
                exit;
            }
        }
    } else {
        // Pas d'en-tête Authorization
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(["error" => "Token manquant"]);
        exit;
    }
}

//Controller URL***************************************************************
//On teste si le paramètre controller existe et correspond à un contrôleur de la liste $controllers
elseif (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
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
