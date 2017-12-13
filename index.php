<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {

    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $difficulty = $json->result->parameters->difficulty;
    $questionOne = $json->result->parameters->questionOne;
    $questionTwo = $json->result->parameters->questionTwo;
    $questionThree = $json->result->parameters->questionThree;

    if(isset($difficulty)){
        switch ($difficulty){
            case 'quizz':
            case 'Quizz':
            case 'quiz':
            case 'Quiz':
                $speech = "Vous avez raison, mieux vaut commencer léger : commençons par un petit quiz.
                 Première question : quelle est la capitale actuelle du Japon ?";
                break;
            case 'civilisation':
            case 'Civilisation':
                $speech = "Les questions de civilisation sont toujours fascinantes : faisons un petit cours de Japonais ! Tout d'abord, quel est votre nom ?";
                break;
            case 'culture':
            case 'Culture':
                $speech = "La culture japonaise est très vivante. Quel aspect vous intéresse ? Le cinéma ? La littérature ? La musique ?";
                break;
            default:
                $speech = "Désolé, je n'ai pas saisi le thème ?";
                break;
        }
    }

    /** Answers for quizz Questions ***/

    /** Answers for quizz Questions ***/

    if(isset($questionOne)){
        switch($questionOne){
            case 'Tokyo':
            case 'tokyo':
                $speech = "Bonne réponse ! Tokyo est aussi la plus grande ville du Japon. Son agglomération est peuplée de 42 millions d'habitants.
                           Voici une autre question : quel sport fait la fierté des japonais ?";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse...";
                break;
        }
    }

    if(isset($questionTwo)){
        switch($questionTwo){
            case 'Judo':
            case 'judo':
            case 'Judoka':
            case 'judoka':
                $speech = "Hm... ce n'est pas la réponse que j'attendais, même si le Judo est effectivement un sport national. Je pensais à quelque chose de plus
                massif, si vous voyez ce que je veux dire.";
                break;
            case 'Sumo':
            case 'sumo':
            case 'Sumotori':
            case 'sumotori':
                $speech = "Bravo, bonne réponse ! Le Sumo est effectivement très populaire au Japon. Saviez-vous que Jacques Chirac en est un grand amateur ?
                Nous arrivons enfin à la question finale. Quel poisson est la star des sushis ?";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse.";
                break;
        }
    }

    if(isset($questionThree)){
        switch($questionThree){
            case 'Thon':
            case 'thon':
            case 'Otoro':
            case 'otoro':
                $speech = "Bonne réponse ! Le Thon Otoro est très populaire au Japon. Dans les restaurants les plus huppés, un sushi Otoro peut coûter l'équivalent d'une
                trentaine d'euros. Merci d'avoir participé au quizz de la journée. Sushi Shop est heureux de vous offrir deux sushis spéciaux sur votre prochaine
                commande, grâce au code promo suivant : SUSHISPECIAUX. A plus tard pour un prochain défi !";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse, ce n'est pas bien loin.";
                break;
        }
    }


    /** Answers for civilisation Questions ***/

    $MedquestionOne = $json->result->parameters->MedquestionOne;

    if(isset($MedquestionOne)){
        switch($MedquestionOne){
            case 'anecdote':
            case 'Anecdote':
            case 'Japon':
            case 'japon':
                $speech = "Le pays est un pays très apprécié par Jacques Chirac. En effet l'ancien président aime énormément 
                    les Sumotori, au point d'avoir souhaité en être un dans sa prime jeunesse.";
                break;
            case 'Mot':
            case 'mot':
            case 'japonais':
            case 'Japonais':
                $speech = "Au Japon, Noël se dit Kurisumassu, et rime souvent avec KFC. Les jeunes japonais sont en effet fous
                de cette chaine de fast food et n'hésitent pas à s'offrir des ailes de poulet durant ce jour très spécial.";
                break;
            default:
                $speech = "Je n'ai pas compris votre choix, désolé.";
                break;
        }
    }

    /** Answers for culture Questions ***/

    $cultureTheme = $json->result->parameters->cultureTheme;

    if(isset($cultureTheme)){
        switch($cultureTheme){
            case 'Cinéma':
            case 'cinéma':
                $speech = "Le Japon a exporté de nombreux films aux quatre coins du globe. Mais c'est surtout l'excellence de ses dessins animés qui est reconnue par tous.
                Hayao Miyazaki, grand réalisateur célèbre pour des films comme Princesse Mononoké, est ainsi souvent comparé à Walt Disney. Merci d'avoir participé
                à la minute culture de la journée. Sushi Shop est heureux de vous offrir deux california rolls gratuits sur votre prochaine
                commande, grâce au code promo suivant : CALIFORNIATWO. A plus tard pour un prochain défi !";
                break;
            case 'musique':
            case 'Musique':
                $speech = "La musique japonaise est un art qui était autrefois très lié aux arts du théâtre. Aujourd'hui encore malgré l'arrivée des codes occidentaux, il n'est
                 pas rare d'entendre des compositions très classiques mélangés aux sons modernes aux élans remarquablement théatraux. Merci d'avoir participé
                à la minute culture de la journée. Sushi Shop est heureux de vous offrir deux california rolls gratuits sur votre prochaine
                commande, grâce au code promo suivant : CALIFORNIATWO. A plus tard pour un prochain défi !";
                break;
            case 'littérature':
            case 'Littérature':
                $speech = "De nombreux auteurs japonais sont connus en France, mais paradoxalement, le plus célèbre d'entre eux est très peu lu par chez nous. Il s'agit de Natsumé
                Soseki, auteur de Botchan, livre largement autobiographique lu par tous les écoliers japonais durant leur scolarité. Merci d'avoir participé
                à la minute culture de la journée. Sushi Shop est heureux de vous offrir deux california rolls gratuits sur votre prochaine
                commande, grâce au code promo suivant : CALIFORNIATWO. A plus tard pour un prochain défi !";
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