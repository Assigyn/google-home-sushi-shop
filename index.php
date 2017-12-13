<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {

    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $difficulty = $json->result->parameters->difficulty;
    $DebquestionOne = $json->result->parameters->DebquestionOne;
    $DebquestionTwo = $json->result->parameters->DebquestionTwo;

    if(isset($difficulty)){
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
    }

    if(isset($DebquestionOne)){
        switch($DebquestionOne){
            case 'Tokyo':
                $speech = "Bonne réponse ! Tokyo est aussi la plus grande ville du Japon. Son agglomération est peuplée de 42 millions d'habitants.
                           Voici une autre question : quel sport fait la fierté des japonais ?";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse. Un indice : cette ville est une des plus densément peulée du monde.";
                break;
        }
    }

    if(isset($DebquestionTwo)){
        switch($DebquestionTwo){
            case 'Judo':
                $speech = "Hm... ce n'est pas la réponse que j'attendais, même si le Judo est effectivement un sport national. Je pensais à quelque chose de plus
                massif, si vous voyez ce que je veux dire.";
                break;
            case 'Sumo':
                $speech = "Bravo, bonne réponse ! Le Sumo est effectivement très populaire au Japon. Saviez-vous que Jacques Chirac en est un grand amateur ?";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse. Un indice : cette ville est une des plus densément peulée du monde.";
                break;
        }
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