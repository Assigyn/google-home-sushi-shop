<?php
session_start();

if(isset($_POST['submit'])) {

    if (empty($_POST['questionOne'])) $errors['questionOne'] = "Veuillez indiquer une question";
}
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
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="result.php" method="post" target="_blank">

                <h1 class="text-center">Modifier le défi Sushi shop</h1>

                <h2 class="text-center">La récompense</h2>

                <div style="background-color: #eee; padding: 10px;">
                    <div class="form-group">
                        <label for="gift">La récompense</label>
                        <input type="text" placeholder="exemple : un Sushi signature" id="gift" name="gift" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="promo">Le code promo</label>
                        <input type="text" placeholder="exemple : SIGNATURESUSHI" id="promo" name="promo" class="form-control">
                    </div>
                </div>

               <!--  <h2 class="text-center">Le Quizz</h2>

                <div class="form-group">
                    <label for="questionOne">Première Question</label>
                    <input type="text" placeholder="exemple : Quelle est la capitale du Japon" id="questionOne" name="questionOne" class="form-control">
                </div>

                <div class="form-group">
                    <label for="questionOneA">Réponse</label>
                    <input type="text" placeholder="exemple : Tokyo" id="questionOneA" name="questionOneA" class="form-control">
                </div>

                <div class="form-group">
                    <label for="questionOneB">Anecdote</label>
                    <input type="text" placeholder="exemple : Saviez-vous que Tokyo s'appellait autrefois Edo ?" id="questionOneB" name="questionOneB" class="form-control">
                </div>

                <hr>

                <div class="form-group">
                    <label for="questionTwo">Seconde Question</label>
                    <input type="text" id="questionTwo" name="questionTwo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="questionTwoA">Réponse</label>
                    <input type="text" id="questionTwoA" name="questionTwoA" class="form-control">
                </div>

                <div class="form-group">
                    <label for="questionTwoB">Anecdote</label>
                    <input type="text" id="questionTwoB" name="questionTwoB" class="form-control">
                </div>

                <hr>

                <div class="form-group">
                    <label for="questionThree">Troisième Question</label>
                    <input type="text" id="questionThree" name="questionThree" class="form-control">
                </div>

                <div class="form-group">
                    <label for="questionThreeA">Réponse</label>
                    <input type="text" id="questionThreeA" name="questionThreeA" class="form-control">
                </div>

                <div class="form-group">
                    <label for="questionThreeB">Anecdote</label>
                    <input type="text" id="questionThreeB" name="questionThreeB" class="form-control">
                </div> -->


                <h2 class="text-center">Civilisation</h2>

                <div class="form-group">
                    <label for="anecdoteJapon">Anecdote Japon</label>
                    <input type="text" id="anecdoteJapon" placeholder="exemple : Le Japon est resté isolé du reste du monde..." name="anecdoteJapon" class="form-control">
                </div>

                <div class="form-group">
                    <label for="anecdoteMot">Anecdote mot Japonais</label>
                    <input type="text" placeholder="exemple : Le mot Kami a deux sens en japonais..." id="anecdoteMot" name="anecdoteMot" class="form-control">
                </div>


                <button type="submit" id="submit" name="submit" class="btn btn-primary">Envoyer</button>

            </form>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

