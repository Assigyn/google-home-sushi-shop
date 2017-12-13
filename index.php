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

    if(isset($DebquestionOne)){
        switch($DebquestionOne){
            case 'Tokyo':
            case 'tokyo':
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
                $speech = "Désolé, ce n'est pas la bonne réponse. Un indice : c'est un sport qu'on connaît mal au dehors du Japon.";
                break;
        }
    }

    if(isset($DebquestionThree)){
        switch($DebquestionThree){
            case 'Thon':
            case 'thon':
            case 'Otoro':
            case 'otoro':
                $speech = "Bonne réponse ! Le Thon Otoro est très populaire au Japon. Dans les restaurants les plus huppés, un sushi Otoro peut coûter l'équivalent d'une
                trentaine d'euros.";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse. Un indice : c'est un poisson à la chair bien rouge.";
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
                $speech = "Le Japon est un des seuls pays asiatiques qui n'a jamais été colonisé par les Européens. Il a d'ailleurs fermé ses frontières près de
                 300 ans entre le 16ème et le 19ème siècle. Allez, un dernier effort, récitez après moi : Sushi Shop ga suki desu";
                break;
            case 'Mot':
            case 'mot':
            case 'japonais':
            case 'Japonais':
                $speech = "Le mot Kami en japonais a plusieurs signification : il peut signifier Dieu, mais aussi papier.
                Allez, un dernier effort, récitez après moi : Sushi Shop ga suki desu";
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
                Hayao Miyazaki, grand réalisateur célèbre pour des films comme Princesse Mononoké, est ainsi souvent comparé à Walt Disney.";
                break;
            case 'musique':
            case 'Musique':
                $speech = "La musique japonaise est un art qui était autrefois très lié aux arts du théâtre. Aujourd'hui encore malgré l'arrivée des codes occidentaux, il n'est
                 pas rare d'entendre des compositions très classiques mélangés aux sons modernes.";
                break;
            case 'littérature':
            case 'Littérature':
                $speech = "De nombreux auteurs japonais sont connus en France, mais paradoxalement, le plus célèbre d'entre eux est très peu lu par chez nous. Il s'agit de Natsumé
                Soseki, auteur de Botchan, livre largement autobiographique lu par tous les écoliers japonais durant leur scolarité.";
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