<?php

// Inclure la définition de la classe TacheDAO
require_once '../daos/tacheDAO.php';
require_once("../connexion/connexion.php");
require_once("../models/taches.php");

// Connexion à la base de données
$connexion = new Connexion();
$pdo = $connexion->seConnecter("faw.ini");

// Instanciation de l'objet DAO pour les tâches
$tacheDAO = new TacheDAO($pdo);

// Récupérer toutes les tâches depuis la base de données
$taches = $tacheDAO->selectAllTaches();

// Récupérer l'ID de la tâche à modifier
if (isset($_GET['id_tache'])) {
    $id_tache = (int)$_GET['id_tache'];
    $tache = $tacheDAO->selectTacheById($id_tache); // Assurez-vous que cette méthode existe et renvoie l'objet Tache
}
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Récupérer l'ID de la tâche à supprimer
    $id_tache = isset($_POST["id_tache"]) ? $_POST["id_tache"] : null;
    // Vérifier si l'ID de la tâche est valide
    if ($id_tache !== null) {
        // Créer un objet Tache avec l'ID de la tâche à supprimer
        $tache = new Tache();
        $tache->setIdTache($id_tache);

        // Supprimer la tâche de la base de données en utilisant la méthode delete de votre DAO
        $affectedRows = $tacheDAO->delete($tache);
        //var_dump($taches);
        // Vérification du résultat de la suppression
        if ($affectedRows > 0) {
            $message = "La tâche a été supprimée avec succès";
        } else {
            $messageKO = "Échec de la suppression de la tâche";
        }
    } else {
        $messageKO = "ID de tâche invalide";
    }
}

// Inclure la vue DeleteTacheView.php
include('../views/tacheDelete.php');
// include('../views/agendaSelectAllView.php');
