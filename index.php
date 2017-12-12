<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {

    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $difficulty = $json->result->parameters->difficulty;
    $questionOne = $json->result->parameters->questionOne;

    switch ($difficulty){
        case 'médium':
            $speech = "L'équilibre est toujours une bonne chose";
            break;
        case 'débutant':
            $speech = "Vous avez raison, mieux vaut commencer léger : commençons par un petit quiz.
            Première question : quelle est la capitale actuelle du Japon ?";
            break;
        case 'difficile':
            $speech = "Vous avez de l'audace, bravo !";
            break;
        default:
            $speech = "Désolé, je n'ai pas saisi le niveau de difficulté ?";
            break;
    }

    switch($questionOne){
        case 'Tokyo':
            $speech = "Bonne réponse ! Tokyo est aussi la plus grande ville
            du Japon. Son agglomération est peuplée de 42 millions d'habitants.";
            break;
        default:
            $speech = "Désolé, ce n'est pas la bonne réponse. Un indice : cette
            ville est une des plus densément peulée du monde.";
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