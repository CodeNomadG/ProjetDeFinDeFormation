<!--tableauDeBord.php-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow at Work</title>

    <link rel="stylesheet" href="../css/tableauDeBord.css">

    <link rel="icon" type="image/x-icon" href="/icons/FavFaw.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <meta name="description"
        content="Flow at Work - Une équipe pluridisciplinaire pour accompagner les salariés dans leur bien-être au travail.">
    <meta name="keywords" content="bien-être, travail, équipe pluridisciplinaire, salarié, entreprise, Flow at Work">
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
                    <li class="logout-button">
                        <a href="../deconnexion/logout.php"><span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>Déconnexion</a>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="site-container">
            <h2>Tableau de bord</h2>
            <?php
            // Affichage du message de succès s'il est disponible
            if (isset($_GET['success_message'])) {
                echo '<div id="success-message" class="success-message">' . htmlspecialchars($_GET['success_message']) . '</div>';
            }
            ?>
            <form action="" method="POST" id='authentification-form'>

                <div class="card-container">
                    <div class="card">
                        <img src="../images/questionnaireimg.jpg" alt="Image 1">
                        <div class="card-content">
                            <h3>Questionnaire Flow</h3>
                            <!-- <p>Description pour la carte 1.</p>-->
                            <button type="submit"><a href='../views/questionnaireView.php'>Commencer</a></button>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../images/AgendaImg.jpg" alt="Image 2">
                        <div class="card-content">
                            <h3>Agenda</h3>
                            <!-- <p>Description pour la carte 2.</p>-->
                            <button type="submit"><a href='../controllers/agendaSelectAllCtrl.php'>Accéder</a> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <button id="theme-toggle"><i class="fa-regular fa-moon"></i></button>

    <footer class="footer">
        <p>&copy; 2024 Flow At Work. Tous droits réservés.</p> <button id="theme-toggle"><i
                class="fa-regular fa-moon"></i></button>
    </footer>
    <!--animation du message d'accueil-->
    <script src="../javaScript/eyeFlashMsgAccueil.js"></script>
    <script src="../javaScript/monProfileMenu.js"></script>
    <script src="../javaScript/darkMode.js"></script>
</body>



</html>