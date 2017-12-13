<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {

    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $difficulty = $json->result->parameters->difficulty;
    $DebquestionOne = $json->result->parameters->DebquestionOne;
    $DebquestionTwo = $json->result->parameters->DebquestionTwo;
    $DebquestionThree = $json->result->parameters->DebquestionThree;

    if(isset($difficulty)){
        switch ($difficulty){
            case 'débutant':
            case 'facile':
                $speech = "Vous avez raison, mieux vaut commencer léger : commençons par un petit quiz.
                 Première question : quelle est la capitale actuelle du Japon ?";
                break;
            case 'médium':
            case 'moyen':
                $speech = "L'équilibre est toujours une bonne chose : faisons un petit cours de Japonais ! Tout d'abord, quel est votre nom ?";
                break;
            case 'difficile':
                $speech = "Vous avez de l'audace, bravo !";
                break;
            default:
                $speech = "Désolé, je n'ai pas saisi le niveau de difficulté ?";
                break;
        }
    }

    /** Answers for Easy Questions ***/

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
            case 'Judoka':
                $speech = "Hm... ce n'est pas la réponse que j'attendais, même si le Judo est effectivement un sport national. Je pensais à quelque chose de plus
                massif, si vous voyez ce que je veux dire.";
                break;
            case 'Sumo':
            case 'Sumotori':
                $speech = "Bravo, bonne réponse ! Le Sumo est effectivement très populaire au Japon. Saviez-vous que Jacques Chirac en est un grand amateur ?
                Nous arrivons enfin à la question finale. Quel poisson est la star des sushis ?";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse. Un indice : c'est un sport qu'on connaît mal au dehors du Japon.";
                break;
        }
    }

    if(isset($DebquestionThree)){
        switch($DebquestionThree){
            case 'Thon':
            case 'Otoro':
                $speech = "Bonne réponse ! Le Thon Otoro est très populaire au Japon. Dans les restaurants les plus huppés, un sushi Otoro peut coûter l'équivalent d'une
                trentaine d'euros.";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse. Un indice : c'est un poisson à la chair bien rouge.";
                break;
        }
    }

    /** Answers for Médium Questions ***/

    $MedquestionOne = $json->result->parameters->MedquestionOne;

    if(isset($MedquestionOne)){
        switch($MedquestionOne){
            case 'couleurs':
            case 'couleur':
                $speech = "Les couleurs sont un bon choix. Répétez après moi : Kuro. Shiro.";
                break;
            case 'chiffres':
            case 'chiffre':
                $speech = "Un amateur de mathématiques, intéressant ! Répétez après moi : shi";
                break;
            default:
                $speech = "Je n'ai pas compris votre choix, désolé.";
                break;
        }
    }

    $MedquestionThree = $json->result->parameters->MedquestionThree;

    if(isset($MedquestionThree)){
        switch($MedquestionThree){
            case 'Kuro Shiro':
            case 'Kuro shiro':
            case 'kuro shiro':
                $speech = "Vous venez de réciter les couleurs suivantes : noir et blanc. Dernier effort, récitez après moi : Sushi Shop ga suki desu";
                break;
            case 'Shi':
            case 'shi':
            case 'Chi':
            case 'chi':
                $speech = "Bien ! Shi est le chiffre 4 en japonais, mais signifie également \"mort\". Il est donc peu utilisé, on
                lui préfère le mot \"Yon\". Dernier effort, récitez après moi : Sushi Shop ga suki desu";
                break;
            default:
                $speech = "Je n'ai pas compris votre choix, désolé.";
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