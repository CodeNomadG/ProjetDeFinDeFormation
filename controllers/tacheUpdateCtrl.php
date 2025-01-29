<?php
// Chargement des fichiers annexes 'require once'
require_once '../models/taches.php'; // Inclusion de la classe Tache
require_once '../connexion/connexion.php'; // Inclusion de la classe Connexion pour la base de données
require_once '../daos/tacheDAO.php'; // Inclusion de la classe TacheDaoPoo

// Création d'une nouvelle instance de Connexion
$cnx = new Connexion();
// Connexion à la base de données en utilisant les paramètres du fichier 'faw.ini'
$pdo = $cnx->seConnecter("faw.ini");

// Initialisation des variables
$option = ""; // Options pour les tâches existantes
$message = "";
$messageKO = "";

// Création de l'objet TacheDaoPoo en lui passant la connexion PDO
$tacheDAO = new TacheDAO($pdo);

// Récupérer toutes les tâches depuis la base de données
$taches = $tacheDAO->selectAllTaches();

// Récupérer l'ID de la tâche à modifier
if (isset($_GET['id_tache'])) {
    $id_tache = (int)$_GET['id_tache'];
    $tache = $tacheDAO->selectTacheById($id_tache); // Assurez-vous que cette méthode existe et renvoie l'objet Tache
}

// Gestion du bouton de modification
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btnValiderModif"])) {
    // Récupération des données du formulaire
    $id_tache = isset($_POST["id_tache"]) ? (int)$_POST["id_tache"] : null; // Cast to integer

    $titre = isset($_POST["titre"]) ? trim($_POST["titre"]) : null; // Trim input
    $description = isset($_POST["description"]) ? trim($_POST["description"]) : null;
    $date_echeance = isset($_POST["date_echeance"]) ? $_POST["date_echeance"] : null;
    $statut = isset($_POST["statut"]) ? $_POST["statut"] : null;

    // Input validation
    if ($id_tache === null || empty($titre) || empty($description) || empty($date_echeance) || empty($statut)) {
        $messageKO = "Tous les champs sont requis.";
    } else {
        // Créer un objet Tache avec les données modifiées
        $tache = new Tache();
        $tache->setIdTache($id_tache);
        $tache->setTitre($titre);
        $tache->setDescription($description);
        $tache->setDateEcheance($date_echeance);
        $tache->setStatut($statut);

        // Mise à jour de la tâche dans la base de données
        $nbLignesModifiees = $tacheDAO->updateTache($tache);

        // Vérification si la mise à jour a réussi
        if ($nbLignesModifiees > 0) {
            $message = "La tâche a été mise à jour avec succès.";
        } else {
            $messageKO = "Une erreur s'est produite lors de la mise à jour de la tâche.";
        }
    }
}

// Inclusion de la vue pour l'interface utilisateur
include '../views/tacheUpdate.php';
// include '../views/agendaSelectAllView.php';
