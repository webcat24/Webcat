<?php
class Controller_API extends Controller
{

    public function action_default()
    {
    }

    public function getAllColorsAPI()
    {
        $m = Model::getModel();
        $data = $m->getAllColors();

        // Retourner la réponse sous forme JSON
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode($data);
    }
    public function action_apiGetProduits()
    {
        $m = Model::getModel();
        $produits = $m->getProduits();
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode($produits);
        exit;
    }

}
?>