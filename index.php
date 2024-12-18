<?php
session_start();
//Pour avoir la fonction e()
require_once "Utils/functions.php";
//Inclusion du modèle
require_once "Models/Model.php";
//Inclusion de la classe Controller
require_once "Controllers/Controller.php";

//Liste des contrôleurs -- A RENSEIGNER
$controllers = ["Utilisateur", "Connexion", "inspiration"];
//Nom du contrôleur par défaut-- A RENSEIGNER
$controller_default = "inspiration";

//API URL*********************************************************************
// Il faut stocker le mdp dans la BDD et le hasher + expiration des tokens (why not)
if(isset($_GET['api'])){

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
            }else {
                header('Content-Type: application/json');
                http_response_code(403);
                echo json_encode(["error" => "Accès interdit, token incorrect"]);
                exit;
            }
        }
    }else{
        // Pas d'en-tête Authorization
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(["error" => "Token manquant"]);
        exit;
    }
}

//Controller URL***************************************************************
//On teste si le paramètre controller existe et correspond à un contrôleur de la liste $controllers
elseif(isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
    $nom_controller = $_GET['controller'];
}
else {
    $nom_controller = $controller_default;
}

//On détermine le nom de la classe du contrôleur
$nom_classe = 'Controller_' . $nom_controller;

//On détermine le nom du fichier contenant la définition du contrôleur
$nom_fichier = 'Controllers/' . $nom_classe . '.php';

//Si le fichier existe et est accessible en lecture
if (is_readable($nom_fichier)) {
    //On l'inclut et on instancie un objet de cette classe
    require_once $nom_fichier;
    new $nom_classe();
} else {
    die("Error 404: not found!");
}
