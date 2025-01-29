<?php
// Inclusion des fichiers nécessaires
require_once '../models/taches.php';
require_once '../connexion/connexion.php';
require_once '../daos/tacheDAO.php';

// Afficher les erreurs (pour le débogage)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Création d'une nouvelle instance de Connexion
$cnx = new Connexion();
$pdo = $cnx->seConnecter("faw.ini");
$tacheDAO = new TacheDAO($pdo);

// Vérifie si l'ID de la tâche a été passé dans l'URL
if (isset($_GET['id_tache'])) {
    $id_tache = (int)$_GET['id_tache'];

    // Récupération de la tâche à partir de la base de données
    $tache = $tacheDAO->selectTacheById($id_tache);

    if ($tache === null) {
        echo "Tâche non trouvée.";
        exit;
    }
} else {
    echo "ID de la tâche manquant.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Tâche</title>
    <link rel="stylesheet" href="../css/tacheUpdate.css">
</head>

<body>
    <div class="container-update">
        <h1>Modifier Tâche</h1>
        <form action="../controllers/updateCtrl.php" method="post">
            <input type="hidden" name="id_tache" value="<?php echo htmlspecialchars($tache->getIdTache()); ?>">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" value="<?php echo htmlspecialchars($tache->getTitre()); ?>" required>

            <label for="description">Description :</label>
            <input type="text" name="description" id="description" value="<?php echo htmlspecialchars($tache->getDescription()); ?>" required>

            <label for="date_echeance">Date limite :</label>
            <input type="date" name="date_echeance" id="date_echeance" value="<?php echo htmlspecialchars($tache->getDateEcheance()); ?>" required>

            <label for="statut">Statut :</label>
            <select name="statut" id="statut" required>
                <option value="En cours" <?php if ($tache->getStatut() === 'En cours') echo 'selected'; ?>>En cours</option>
                <option value="Terminé" <?php if ($tache->getStatut() === 'Terminé') echo 'selected'; ?>>Terminé</option>
                <option value="A faire" <?php if ($tache->getStatut() === 'A faire') echo 'selected'; ?>>À Faire</option>
            </select>

            <button type="submit" name="btnValiderModif">Mettre à jour</button>
        </form>
    </div>
</body>

</html>