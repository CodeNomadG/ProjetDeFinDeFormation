<?php
require_once '../models/taches.php';
require_once '../connexion/connexion.php';
require_once '../daos/tacheDAO.php';

$cnx = new Connexion();
$pdo = $cnx->seConnecter("faw.ini");
$tacheDAO = new TacheDAO($pdo);

$message = "";
$messageKO = "";

// Gestion du bouton de modification
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_tache = isset($_POST["id_tache"]) ? (int)$_POST["id_tache"] : null;
    $titre = isset($_POST["titre"]) ? trim($_POST["titre"]) : null;
    $description = isset($_POST["description"]) ? trim($_POST["description"]) : null;
    $date_echeance = isset($_POST["date_echeance"]) ? $_POST["date_echeance"] : null;
    $statut = isset($_POST["statut"]) ? $_POST["statut"] : null;

    // Validation des entrées
    if ($id_tache === null || empty($titre) || empty($description) || empty($date_echeance) || empty($statut)) {
        $messageKO = "Tous les champs sont requis.";
    } else {
        $tache = new Tache();
        $tache->setIdTache($id_tache);
        $tache->setTitre($titre);
        $tache->setDescription($description);
        $tache->setDateEcheance($date_echeance);
        $tache->setStatut($statut);

        $affectedRows = $tacheDAO->updateTache($tache);

        if ($affectedRows > 0) {
            $message = "La tâche a été mise à jour avec succès.";
        } else {
            $messageKO = "Une erreur s'est produite lors de la mise à jour de la tâche.";
        }
    }
}

// Redirection ou inclusion d'une vue avec un message
header("Location: updateAgenda.php?message=" . urlencode($message));
exit();
