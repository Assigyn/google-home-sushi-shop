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
                 Première question : Quel figure géométrique est visible sur le drapeau japonais ?";
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

    if(isset($questionOne)){
        switch($questionOne){
            case 'Cercle':
            case 'cercle':
                $speech = "Bonne réponse ! Le drapeau du Japon est un des rares à présenter une forme circulaire de la sorte.'
                           Voici une autre question : Quelle ville était capitale avant Tokyo ?";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse.";
                break;
        }
    }

    unset($questionOne);

    if(isset($questionTwo)){
        switch($questionTwo){
            case 'Kyoto':
            case 'kyoto':
                $speech = "Bonne réponse ! Kyoto possède un temple immense : le pavillon d'or.'
                           Nous arrivons enfin à la dernière question ! Quelle ville était capitale avant Tokyo ?";
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
                trentaine d'euros. Merci d'avoir participé au quizz de la journée. Sushi Shop est heureux de vous offrir deux california rolls gratuits sur votre prochaine
                commande, grâce au code promo suivant : CALIFORNIATWO. A plus tard pour un prochain défi !";
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