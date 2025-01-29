<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow at Work</title>

    <link rel="stylesheet" href="../css/connexion.css">

    <link rel="icon" type="image/x-icon" href="/icons/FavFaw.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <meta name="description"
        content="Contactez Flow at Work pour toute question, suggestion ou demande d'information concernant le bien-être au travail.">
    <meta name="keywords"
        content="bien-être, travail, équipe pluridisciplinaire, salariés, entreprises, Flow at Work, contact, formulaire">
    <meta name="author" content="Flow at Work">

    <meta property="og:title" content="Flow at Work - Contactez-nous">
    <meta property="og:description"
        content="Flow at Work accompagne les salariés dans leur bien-être au travail. Contactez-nous pour plus d'informations.">
    <meta property="og:image" content="/icons/FavFaw.jpg">
    <meta property="og:url" content="https://www.flowatwork.com/contact">

    <meta name="robots" content="index, follow">
</head>




<body>
    <div class="mobile-menu">
        <span class="material-icons" onclick="toggler()" id="toggler"><i class="fa-solid fa-bars"></i></span>
    </div>

    <div class="container">
        <header>
            <nav class="menu">
                <a class="header_h" href="../index.php" id="change-url">
                    <img src="../logo/Logofaw.png" class="logo" alt="Logo de la page" />
                </a>

                <ul>
                    <li><a href="../index.php">Accueil</a></li>
                    <li><a href="../views/aProposDuFlow.php">À propos du flow</a></li>
                    <li><a href="../views/quiSommesNous.php">Qui sommes-nous ?</a></li>
                    <li><a href="../views/contactView.php">Contact</a></li>
                    <li><a href="../views/connexionView.php">Connexion</a></li>
                </ul>
            </nav>
        </header>
        <div class="site-container">
            <h1>
                <img src="../images/loginAvatar.png" alt="" class="login-avatar">
            </h1>
            <h2>Connexion</h2>


            <div class="row">

                <form action="../controllers/ConnexionCtrl.php" method="POST" id='Connexion-form'>
                    <input class="input-error" type="email" name="email1" id="email1" value="Nadir@gmail.com"
                        placeholder="Email">
                    <span class="error">
                        <?php echo isset($messageKOEmail) ? $messageKOEmail : ''; ?>
                    </span>

                    <label class="password-field">
                        <input class="input-error" type="password" name="mdp1" id="mdp1" value="Nadir@123456"
                            placeholder="Mot de passe">
                        <i class="far fa-eye" id="togglePassword"></i>
                    </label>
                    <span class="error">
                        <?php echo isset($messageKOMdp) ? $messageKOMdp : ''; ?>
                    </span><br>
                    <?php
                    // Affichage des messages d'erreur sous le bloc de connexion
                    if (isset($message)) {
                        echo "<div class='success-message'>$message</div>";
                    }

                    if (isset($messageKO)) {
                        echo "<div class='error-message'>$messageKO</div>";
                    }

                    if (isset($messageErreur)) {
                        echo "<div class='error-message'>$messageErreur</div>";
                    }
                    ?>
                    <input type="submit" name="bt_submit" id="bt_submit" value="Se connecter">

                    <p>
                        Vous n'avez pas de compte ? <a href="../views/InscriptionView.php">Créer un nouveau
                            compte</a>
                    </p>
                    <div class=" social-icons">
                        <a href="https://www.facebook.com/bruno.duquesne" aria-label="Facebook de Bruno Duquesne"><i
                                class="fa-brands fa-square-facebook"></i></a>

                        <a href="https://www.linkedin.com/company/brunoduquesneflowatwork/posts/?feedView=all"
                            aria-label="LinkedIn de Bruno Duquesne"><i class="fa-brands fa-linkedin"></i></a>

                        <a href=" https://maps.app.goo.gl/LUt4z3DSo91b5hJt9" aria-label="localisationFlowAtWork"><i
                                class="fa-solid fa-map-location-dot"></i></a>
                    </div>

                </form>

            </div>

        </div>
    </div>
    <button id="theme-toggle"><i class="fa-regular fa-moon"></i></button>

    <footer class="footer">
        <p>&copy; 2024 Flow At Work. Tous droits réservés.</p> <button id="theme-toggle"><i
                class="fa-regular fa-moon"></i></button>
    </footer>
    script src="javaScript/darkMode.js">
    <script src="../javaScript/navBar.js"></script>
    <script src="../javaScript/eyeFlashMsgAccueil.js"></script>

</body>

</html>