<?php
session_start();
$_SESSION = $_POST;

$recompense = array(
    'type' => $_SESSION['gift'],
    'promo' => $_SESSION['promo'],
);

$anecdote = array(
    'japon' => $_SESSION['anecdoteJapon'],
    'mot' => $_SESSION['anecdoteMot'],
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Générateur de nouveau quizz</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">

    <h1>Voici votre code à copier-coller dans le fichier index.php pour générer le nouveau défi</h1>

    <code>
        <pre>
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
                        trentaine d'euros. Merci d'avoir participé au quizz de la journée. Sushi Shop est heureux de vous offrir <?php echo $recompense['type']; ?>
                sur votre prochaine
                        commande, grâce au code promo suivant : <?php echo $recompense['promo']; ?>. A plus tard pour un prochain défi !";
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
                        $speech = "<?php echo $anecdote['japon'] . "Merci d'avoir participé à la minute civilisation de la journée. Sushi Shop est heureux de vous offrir " . $recompense['type'] . " sur votre prochaine commande, grâce au code promo suivant : " . $recompense['promo'] . ". A plus tard pour un prochain défi !"; ?>
                ";
                        break;
                    case 'Mot':
                    case 'mot':
                    case 'japonais':
                    case 'Japonais':
                        $speech = "<?php echo $anecdote['mot'] . "Merci d'avoir participé à la minute civilisation de la journée. Sushi Shop est heureux de vous offrir " . $recompense['type'] . " sur votre prochaine commande, grâce au code promo suivant : " . $recompense['promo'] . ". A plus tard pour un prochain défi !"; ?>
                ";
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
                        à la minute culture de la journée. Sushi Shop est heureux de vous offrir <?php echo $recompense['type']; ?>
                sur votre prochaine
                        commande, grâce au code promo suivant : <?php echo $recompense['promo']; ?>. A plus tard pour un prochain défi !";
                        break;
                    case 'musique':
                    case 'Musique':
                        $speech = "La musique japonaise est un art qui était autrefois très lié aux arts du théâtre. Aujourd'hui encore malgré l'arrivée des codes occidentaux, il n'est
                         pas rare d'entendre des compositions très classiques mélangés aux sons modernes aux élans remarquablement théatraux. Merci d'avoir participé
                        à la minute culture de la journée. Sushi Shop est heureux de vous offrir <?php echo $recompense['type']; ?>
                sur votre prochaine
                        commande, grâce au code promo suivant : <?php echo $recompense['promo']; ?>. A plus tard pour un prochain défi !";
                        break;
                    case 'littérature':
                    case 'Littérature':
                        $speech = "De nombreux auteurs japonais sont connus en France, mais paradoxalement, le plus célèbre d'entre eux est très peu lu par chez nous. Il s'agit de Natsumé
                        Soseki, auteur de Botchan, livre largement autobiographique lu par tous les écoliers japonais durant leur scolarité. Merci d'avoir participé
                        à la minute culture de la journée. Sushi Shop est heureux de vous offrir <?php echo $recompense['type']; ?>
                sur votre prochaine
                        commande, grâce au code promo suivant : <?php echo $recompense['promo']; ?>. A plus tard pour un prochain défi !";
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

        </pre>
</code>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
