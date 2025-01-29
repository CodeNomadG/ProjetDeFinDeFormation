<!--agendaSelectAllView.php-->
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
    <!--<link rel="stylesheet" href="../css/agenda.css">-->
    <link rel="stylesheet" href="../css/agenda.css">

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
                    <!--<li class="logout-button">
                        <a href="../views/AccueilFlow.php"><span class="icon"><i class="fa-solid fa-gear"></i></span>Paramètre</a>
                        </li>-->
                    <li class="logout-button">
                        <a href="../deconnexion/logout.php"><span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>Déconnexion</a>
                    </li>
                </ul>
            </nav>
        </header>

        <nav class="nav-tache">
            <ul>
                <li><a href="../controllers/agendaSelectAllCtrl.php"><i class="fa-solid fa-list-check"></i> Mes tâches</a></li>
                <li><a href="../views/tacheInsert.php"><i class="fa-regular fa-calendar-plus"></i> Ajouter une tâche</a></li>
            </ul>
        </nav>

        <fieldset>
            <h1>Agenda</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date de création</th>
                            <th>Date limite</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($taches as $tache) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($tache->getIdTache()); ?></td>
                                <td><?php echo htmlspecialchars($tache->getIdSalariees()); ?></td>
                                <td><?php echo htmlspecialchars($tache->getTitre()); ?></td>
                                <td><?php echo htmlspecialchars($tache->getDescription()); ?></td>
                                <td><?php echo htmlspecialchars($tache->getDateCreation()); ?></td>
                                <td><?php echo htmlspecialchars($tache->getDateEcheance()); ?></td>
                                <td><?php echo htmlspecialchars($tache->getStatut()); ?></td>
                                <td class="action-button">
                                    <button class="btn-modifier" onclick="modifierTache(<?php echo $tache->getIdTache(); ?>)"><i class="fa-regular fa-pen-to-square"></i>
                                        <span class="btn-text">
                                            Modif</span>
                                    </button>
                                    <button class="btn-supprimer" onclick="supprimerTache(<?php echo $tache->getIdTache(); ?>)"><i class="fa-regular fa-trash-can"></i>
                                        <span class="btn-text">Suppr.</span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php
            if (isset($message)) {
                echo '<div class="message-success">' . htmlspecialchars($message) . '</div>';
            }

            if (isset($messageKO)) {
                echo '<div class="message-failur">' . htmlspecialchars($messageKO) . '</div>';
            }
            if (isset($messageErreur)) {
                echo '<div class="message-failur">' . htmlspecialchars($messageErreur) . '</div>';
            }

            ?>
        </fieldset>
        <button id="theme-toggle"><i class="fa-regular fa-moon"></i></button>

        <footer class="footer">
            <p>&copy; 2024 Flow At Work. Tous droits réservés.</p> <button id="theme-toggle"><i
                    class="fa-regular fa-moon"></i></button>
        </footer>
        <script src="../javaScript/monProfileMenu.js"></script>
        <script src="../javaScript/darkMode.js"></script>
        <script src="../javaScript/supModi.js"></script>


</body>

</html>