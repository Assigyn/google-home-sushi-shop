<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {

    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $difficulty = $json->result->parameters->difficulty;
    $DebquestionThree = $json->result->parameters->DebquestionThree;

    if(isset($difficulty)){
        switch ($difficulty){
            case 'quizz':
            case 'Quizz':
            case 'quiz':
            case 'Quiz':
                $speech = "Vous avez raison, mieux vaut commencer léger : commençons par un petit quiz.
                 Quel figure géométrique est visible sur le drapeau japonais ?";
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

    $answerQ2 = $json->result->parameters->answerQ2;

    if(isset($answerQ2)){
        switch($answerQ2){
            case 'Cercle':
            case 'cercle':
                $speech = "Bravo, la réponse est cercle.
                Le drapeau du Japon est un des rares à présenter une forme circulaire de la sorte..
                Voici une autre question : Quelle ville était capitale avant Tokyo ?";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse.";
                break;
        }
    }

    $answerQ3 = $json->result->parameters->answerQ3;

    if(isset($answerQ3)){
        switch($answerQ3){
            case 'Kyoto':
            case 'kyoto':
                $speech = "Bravo, bonne réponse !
                Kyoto possède un temple immense : le pavillon d'or..
                Nous arrivons enfin à la question finale. Comment s'appelle le monstre le connu au Japon ?";
                break;
            default:
                $speech = "Désolé, ce n'est pas la bonne réponse... courage !";
                break;
        }
    }

    if(isset($DebquestionThree)){
        switch($DebquestionThree){
            case 'Godzilla':
            case 'godzilla':
                $speech = "Bonne réponse !
                Godzilla s'appelle en réalité Gojira. Il figure dans plus d'une vingtaine de films. .
                Merci d'avoir participé au quizz de la journée. Sushi Shop est heureux de vous offrir deux sushis sur votre prochaine
                commande, grâce au code promo suivant : 'TWOSUSHIS'. A plus tard pour un prochain défi !";
                break;
            default:
                $speech = "Aïe, ce n'est pas la bonne réponse... ";
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