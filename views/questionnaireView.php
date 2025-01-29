<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow at work</title>
    <link rel="icon" type="image/x-icon" href="/icons/FavFaw.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/questionnaire.css">

    <!-- Ajout de Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="mobile-menu">
        <a href="###"></a><span class="material-icons" onclick="toggler()" id="toggler"><i class="fa-regular fa-user"></i></span>
    </div>
    <div class="container">
        <header>
            <nav class="menu">
                <a class="header_h" href="../views/tableauDeBord.php" id="change-url">
                    <img src="../logo/Logofaw.png"
                        class="logo" alt="Logo de flow">
                </a>

                <ul>
                    <li class="btn_log_h">
                        <a href="../views/tableauDeBord.php">
                            <span class="icon"><i class="fa-solid fa-house-user"></i></span>
                            Accueil
                        </a>
                    </li>
                    <!-- <li class="logout-button">
                        <a href="../views/AccueilFlow.php"><span class="icon"><i class="fa-solid fa-gear"></i></span>Paramètre</a>
                    </li>-->
                    <li class="logout-button">
                        <a href="../deconnexion/logout.php"><span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>Déconnexion</a>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="titre_de_page">
            <h1>Questionnaire</h1>
        </div>
        <div class="questionnaire">
            <form id="questionForm" action="../controllers/questionnaireCtrl.php" method="POST">

                <!-- Question 1 -->
                <div class="question" id="question1">
                    <h3>Comment vous sentez-vous généralement lorsque vous arrivez au travail le matin?</h3><br><br><br>
                    <input type="radio" name="q1" value="Je ne sais pas"> Je ne sais pas<br>
                    <input type="radio" name="q1" value="Je me sens enthousiaste"> Je me sens enthousiaste<br>
                    <input type="radio" name="q1" value="Je me sens anxieux"> Je me sens anxieux<br>
                </div>



                <!-- Question 2 -->
                <div class="question" id="question2">
                    <h3>Sur une échelle de 1 à 10, comment évalueriez-vous votre niveau de stress au travail ces dernières semaines?</h3><br><br>
                    <div class="reponse">
                        <div class="rating-option">
                            1<br><input type="radio" name="q2" value="1">
                        </div>
                        <div class="rating-option">
                            2<br><input type="radio" name="q2" value="2">
                        </div>
                        <div class="rating-option">
                            3<br><input type="radio" name="q2" value="3">
                        </div>
                        <div class="rating-option">
                            4<br><input type="radio" name="q2" value="4">
                        </div>
                        <div class="rating-option">
                            5<br><input type="radio" name="q2" value="5">
                        </div>
                        <div class="rating-option">
                            6<br><input type="radio" name="q2" value="6">
                        </div>
                        <div class="rating-option">
                            7<br><input type="radio" name="q2" value="7">
                        </div>
                        <div class="rating-option">
                            8<br><input type="radio" name="q2" value="8">
                        </div>
                        <div class="rating-option">
                            9<br><input type="radio" name="q2" value="9">
                        </div>
                        <div class="rating-option">
                            10<br><input type="radio" name="q2" value="10">
                        </div>
                    </div>
                </div>


                <!-- Question 3 -->

                <div class="question" id="question3">
                    <h3>À quel point vous sentez-vous soutenu(e) par votre équipe ou vos supérieurs lorsque vous rencontrez des difficultés professionnelles ou personnelles?</h3><br><br><br>
                    <input type="radio" name="q3" value="Pas du tout">Pas du tout<br>
                    <input type="radio" name="q3" value="Un peu"> Un peu<br>
                    <input type="radio" name="q3" value="Moyennement"> Moyennement<br>
                    <input type="radio" name="q3" value="Beaucoup"> Beaucoup<br>
                </div>


                <!-- Question 4 -->
                <div class="question" id="question4">
                    <h3>Avez-vous accès à des ressources ou à des programmes de bien-être au travail (tels que des séances de méditation, des conseils en gestion du stress, des activités sportives, etc.)?</h3><br><br><br>
                    <input type="radio" name="q4" value="Oui">Oui<br>
                    <input type="radio" name="q4" value="Non"> Non<br>
                    <input type="radio" name="q4" value="Parfois"> Parfois<br>
                </div>


                <!-- Boutons de navigation -->
                <div class="button-container">
                    <button class="btn-prev" name="prevButton" onclick="prevQuestion()">Précédent</button>

                    <button class="btn_soumet_quest" type="submit" name="submitButton" style="display:none">Soumettre</button>

                    <button class="btn-next" type="button" name="nextButton" onclick="nextQuestion()">Suivant</button>
                </div>


                <!-- Bouton de soumission -->

            </form>
        </div>
        <?php
        if (isset($message)) {
            echo "<div class='message success'>$message</div>";
        }

        if (isset($messageKO)) {
            echo "<div class='message warning'>$messageKO</div>";
        }
        if (isset($messageErreur)) {
            echo "<div class='message error'>$messageErreur</div>";
        }

        ?>
    </div>
    <button id="theme-toggle"><i class="fa-regular fa-moon"></i></button>

    <footer class="footer">
        <p>&copy; 2024 Flow At Work. Tous droits réservés.</p> <button id="theme-toggle"><i
                class="fa-regular fa-moon"></i></button>
    </footer>
    <script src="../javaScript/questionnaire.js"></script>
    <script src="../javaScript/monProfileMenu.js"></script>
    <script src="../javaScript/darkMode.js"></script>

</body>

</html>