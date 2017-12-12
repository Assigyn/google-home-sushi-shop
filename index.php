<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {

    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $difficulty = $json->result->parameters->difficulty;

    switch ($difficulty){
        case 'médium':
            $speech = "L'équilibre est toujours une bonne chose";
            break;
        case 'débutant':
            $speech = "Vous avez raison, mieux vaut commencer léger";
            break;
        case 'difficile':
            $speech = "Vous avez de l'audace, bravo !";
            break;
        default:
            $speech = "Désolé, je n'ai pas saisi le niveau de difficulté ?";
            break;
    }

    $response = new \stdClass();
    $response->speech = $speech;
    $response->displayText = $speech;
    $response->source = "webhook";
    echo json_encode($response);

}
else {
    echo "Method not allowed";
}

?>