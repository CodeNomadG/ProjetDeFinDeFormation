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
    <link rel="stylesheet" href="../css/tacheDelete.css">

    <!-- Ajout de Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>

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
                    <li>
                        <a href="../controllers/tacheUpdateCtrl.php" onclick="modifierTache(<?php echo $tache->getIdTache(); ?>); return false;">
                            <i class="fa-regular fa-pen-to-square"></i> mise à jour
                        </a>
                    </li>

                </ul>
            </nav>
            <div class="container-delete">
                <fieldset class="fieldset-delete">
                    <h1>Supprimer une tâche</h1>
                    <form class="form-delete" id="form-delete" action="../controllers/tacheDeleteCtrl.php" method="post" onsubmit="return confirmerDelete();">
                        <br>
                        <?php if (isset($tache)) : ?>

                            <table>
                                <tr>
                                    <td>Titre :</td>
                                    <td><?php echo htmlspecialchars($tache->getTitre()); ?></td>
                                </tr>
                                <tr>
                                    <td>Description :</td>
                                    <td><?php echo htmlspecialchars($tache->getDescription()); ?></td>
                                </tr>
                                <tr>
                                    <td>Date d'échéance :</td>
                                    <td><?php echo htmlspecialchars($tache->getDateEcheance()); ?></td>
                                </tr>
                                <tr>
                                    <td>Statut :</td>
                                    <td><?php echo htmlspecialchars($tache->getStatut()); ?></td>
                                </tr>
                                <!-- Hidden ID field -->
                                <input type="hidden" name="id_tache" value="<?php echo htmlspecialchars($tache->getIdTache()); ?>">
                            </table><br><br>

                            <!--?php var_dump($tache) ?-->

                        <?php else : ?>
                            <p>Tâche non trouvée.</p>
                        <?php endif; ?>

                        <button class="btn-delete" type="submit" name="btnValiderSuppr">Supprimer</button>
                    </form>
                    <?php
                    if (isset($message)) {
                        echo '<div class="message-success">' . htmlspecialchars($message) . '</div>';
                    }
                    if (isset($messageKO)) {
                        echo '<div class="error-message">' . htmlspecialchars($messageKO) . '</div>';
                    }
                    if (isset($messageErreur)) {
                        echo '<div class="error-message">' . htmlspecialchars($messageµErreur) . '</div>';
                    }
                    ?>
                </fieldset>
            </div>

            <button id="theme-toggle"><i class="fa-regular fa-moon"></i></button>

            <footer class="footer">
                <p>&copy; 2024 Flow At Work. Tous droits réservés.</p> <button id="theme-toggle"><i
                        class="fa-regular fa-moon"></i></button>
            </footer>
        </div>
        </div>

        <script src="../javaScript/monProfileMenu.js"></script>
        <script src="../javaScript/darkMode.js"></script>
        <script src="../javaScript/supModi.js"></script>
    </body>

</html>