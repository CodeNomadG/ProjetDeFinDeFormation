<?php
// updateAgenda.php

require_once '../models/taches.php';
require_once '../connexion/connexion.php';
require_once '../daos/tacheDAO.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
$cnx = new Connexion();
$pdo = $cnx->seConnecter("faw.ini");

// Création de l'objet TacheDAO
$tacheDAO = new TacheDAO($pdo);

// Récupération de toutes les tâches
$taches = $tacheDAO->selectAllTaches();

if ($taches === null) {
    $taches = []; // Assurez-vous que $taches est un tableau même si aucune tâche n'est trouvée
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Tâches</title>
</head>

<body>
    <div class="table-container">
        <h1>Liste des Tâches</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date limite</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($taches as $tache) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($tache->getIdTache()); ?></td>
                        <td><?php echo htmlspecialchars($tache->getTitre()); ?></td>
                        <td><?php echo htmlspecialchars($tache->getDescription()); ?></td>
                        <td><?php echo htmlspecialchars($tache->getDateEcheance()); ?></td>
                        <td><?php echo htmlspecialchars($tache->getStatut()); ?></td>
                        <td>
                            <button class="btn-modifier" onclick="modifierTache(<?php echo $tache->getIdTache(); ?>)">
                                Modifier
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function modifierTache(idTache) {
            window.location.href = "tacheUpdate.php?id_tache=" + idTache;
        }
    </script>
</body>

</html>