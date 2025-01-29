<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow at Work</title>

    <link rel="stylesheet" href="../css/devis.css">
    <link rel="icon" type="image/x-icon" href="/icons/FavFaw.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <meta name="description" content="Contactez Flow at Work pour toute question, suggestion ou demande d'information concernant le bien-être au travail.">
    <meta name="keywords" content="bien-être, travail, équipe pluridisciplinaire, salariés, entreprises, Flow at Work, contact, formulaire">
    <meta name="author" content="Flow at Work">

    <meta property="og:title" content="Flow at Work - Contactez-nous">
    <meta property="og:description" content="Flow at Work accompagne les salariés dans leur bien-être au travail. Contactez-nous pour plus d'informations.">
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
            <h1>DEVIS</h1>
            <p>Prêt à vous lancer dans le bien-être optimal ? Faites une demande de devis.</p>

            <div class="row">
                <fieldset>
                    <form action="../controllers/devisCtrl.php" method="POST">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" required>

                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" required>

                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>

                        <label for="mobile">Numéro de téléphone</label>
                        <input type="tel" id="mobile" name="mobile" required>

                        <label for="entite">Entité</label>
                        <select id="entity" name="entite" required>
                            <option value=""> ---- </option>
                            <option value="entreprise">Entreprise</option>
                            <option value="salarié">Salarié</option>
                        </select>

                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>

                        <input class="element-bouton" type="submit" value="Envoyer">
                    </form>
                </fieldset>
            </div>

            <div class="social-icons">
                <a href="https://www.facebook.com/bruno.duquesne" aria-label="Facebook de Bruno Duquesne"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="https://www.linkedin.com/company/brunoduquesneflowatwork/posts/?feedView=all" aria-label="LinkedIn de Bruno Duquesne"><i class="fa-brands fa-linkedin"></i></a>
                <a href="https://maps.app.goo.gl/LUt4z3DSo91b5hJt9" aria-label="Localisation Flow At Work"><i class="fa-solid fa-map-location-dot"></i></a>
            </div>
        </div>
    </div>

    <button id="theme-toggle"><i class="fa-regular fa-moon"></i></button>

    <footer class="footer">
        <p>&copy; 2024 Flow At Work. Tous droits réservés.</p>
    </footer>
    <?php
    if (isset($_GET['success_message'])) {
        echo '<div class="success-message">' . htmlspecialchars($_GET['success_message']) . '</div>';
    }
    if (isset($_GET['error_message'])) {
        echo '<div class="error-message">' . htmlspecialchars($_GET['error_message']) . '</div>';
    }
    ?>

    <script src="../javaScript/darkMode.js"></script>
    <script src="../javaScript/navBar.js"></script>
</body>

</html>