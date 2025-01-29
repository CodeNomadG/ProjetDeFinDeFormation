<!-- tacheinsert.php-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow at work</title>
    <link rel="icon" type="image/x-icon" href="/icons/FavFaw.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/tacheInsert.css">
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
                    <li class="logout-button">
                        <a href="../deconnexion/logout.php"><span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>Déconnexion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <nav class="nav-tache">
            <ul>
                <li><a href="../controllers/agendaSelectAllCtrl.php"><i class="fa-solid fa-list-check"></i> Mes tâches</a></li>
            </ul>
        </nav>
        <div class="container-insert">
            <h1>Ajouter une nouvelle tâche</h1>
            <fieldset class="fieldset-insert">
                <form action="../controllers/tacheInsertCtrl.php" method="post">

                    <label for="titre">Titre :</label>
                    <input type="text" id="titre" name="titre" value="<?php echo isset($titre) ? htmlspecialchars($titre) : ''; ?>"><br>
                    <span class="error">
                        <?php echo isset($messageKOTitre) ? $messageKOTitre : ''; ?>
                    </span>

                    <label for="description">Description :</label>
                    <textarea id="description" name="description" rows="4" cols="50"><?php echo isset($description) ? htmlspecialchars($description) : ''; ?></textarea><br>
                    <span class="error"><?php echo isset($messageKODescription) ? $messageKODescription : ''; ?></span>

                    <label for="date_echeance">Date d'échéance :</label>
                    <input type="date" id="date_echeance" name="date_echeance" value="<?php echo isset($date_echeance) ? htmlspecialchars($date_echeance) : ''; ?>"><br>
                    <span class="error"><?php echo isset($messageKODateEcheance) ? $messageKODateEcheance : ''; ?></span>

                    <label for="statut">Statut :</label>
                    <span class="error"><?php echo isset($messageKOStatut) ? $messageKOStatut : ''; ?></span>
                    <select id="statut" name="statut">
                        <option value=""></option>
                        <option value="En cours" <?php echo (isset($statut) && $statut === "En cours") ? 'selected' : ''; ?>>En cours</option>
                        <option value="Terminé" <?php echo (isset($statut) && $statut === "Terminé") ? 'selected' : ''; ?>>Terminé</option>
                        <option value="A faire" <?php echo (isset($statut) && $statut === "A faire") ? 'selected' : ''; ?>>A faire</option>
                    </select>
                    <br><br>
                    <input class="btn-insert-1" type="submit" value="Ajouter">
                </form>
                <?php
                if (isset($message)) {
                    echo '<div class="message-success">' . htmlspecialchars($message) . '</div>';
                }
                if (isset($messageKO)) {
                    echo '<div class="error-message">' . htmlspecialchars($messageKO) . '</div>';
                }
                if (isset($messageErreur)) {
                    echo '<div class="error-message">' . htmlspecialchars($messageErreur) . '</div>';
                }
                ?>
            </fieldset>
        </div>

        <button id="theme-toggle"><i class="fa-regular fa-moon"></i></button>

        <footer class="footer">
            <p>&copy; 2024 Flow At Work. Tous droits réservés.</p> <button id="theme-toggle"><i
                    class="fa-regular fa-moon"></i></button>
        </footer>
        <script src="../javaScript/monProfileMenu.js"></script>
        <script src="../javaScript/darkMode.js"></script>
</body>

</html>