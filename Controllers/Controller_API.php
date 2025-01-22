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
}
?>