<?php

// Inclure la définition de la classe QuestionnaireDAO
require_once '../daos/tacheDAO.php';
require_once("../connexion/connexion.php");
require_once("../models/taches.php");

//Mettre en place les filter_input

$titre = filter_input(INPUT_POST, "titre");
$description = trim(filter_input(INPUT_POST, "description"));
$date_echeance = trim(filter_input(INPUT_POST, "date_echeance"));
$statut = trim(filter_input(INPUT_POST, "statut"));

//Déclarer les variables des messages d'erreur
$messageKOTitre = "";
$messageKODescription = "";
$messageKODateEcheance = "";
$messageKOStatut = "";

$messageKO = "";
$messageOK = "";

$nKO = 0;

//Vérifier les champs de saisies

//verifier le titre
if (empty($titre)) {
    $messageKOTitre = "titre requis";
    $nKO++;
} elseif (!preg_match('/^[a-zA-Z0-9\s.,!?éèêëàâôîï]{3,50}$/', $titre)) {
    $messageKOTitre = "Titre invalide";
    $nKO++;
}

if (empty($description)) {
    $messageKODescription = "Déscription de la tâche requise";
    $nKO++;
} elseif (!preg_match('/^[a-zA-Z0-9\s.,!?éèêëàâôîï]{10,500}$/', $description)) {
    $messageKODescription = "Description non conforme";
    $nKO++;
}

if (empty($date_echeance)) {
    $messageKODateEcheance = "Date d'écheance requise";
    $nKO++;
} elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_echeance)) {
    $messageKODateEcheance = "Date non conforme";
    $nKO++;
}

if (empty($statut)) {
    $messageKOStatut = "Statut requis ";
    $nKO++;
}
// Vérifier les champs requis et la correspondance des emails et mots de passe
if (empty($titre)) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} elseif (empty($description)) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} elseif (empty($date_echeance)) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} elseif (empty($statut)) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} else

if ($nKO === 0) {

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connexion à la base de données
        $connexion = new Connexion();
        $pdo = $connexion->seConnecter("faw.ini");

        // Instanciation de l'objet DAO pour les questionnaires
        $tacheDAO = new TacheDAO($pdo);
        // Récupérer toutes les tâches depuis la base de données
        $taches = $tacheDAO->selectAllTaches();
        // Récupérer les données du formulaire

        $id_salariees = isset($_POST["id_salariees"]) ? $_POST["id_salariees"] : "";
        $titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
        $description = isset($_POST["description"]) ? $_POST["description"] : "";
        $date_creation = isset($_POST["date_creation"]) ? $_POST["date_creation"] : "";
        $date_echeance = isset($_POST["date_echeance"]) ? $_POST["date_echeance"] : "";
        $statut = isset($_POST["statut"]) ? $_POST["statut"] : "";

        // Créer un tableau avec les données du formulaire
        $data = array(
            'id_salariees' => $id_salariees,
            'titre' => $titre,
            'description' => $description,
            'date_creation' => $date_creation,
            'date_echeance' => $date_echeance,
            'statut' => $statut
        );

        // Insérer les réponses du questionnaire dans la base de données en utilisant la méthode insert de votre DAO
        $tacheID = $tacheDAO->insert($data);

        // Vérification du résultat de l'insertion
        if ($tacheID !== false) {
            $message = "Nouvelle tâche ajoutée";
        } else {
            $messageKO = "Échec, la tâche n'a pas été ajoutée";
        }
    }
}

// Inclure la vue QuestionnaireV1.php

include('../views/tacheInsert.php');
