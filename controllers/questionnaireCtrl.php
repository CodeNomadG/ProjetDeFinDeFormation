<?php

// Inclure la définition de la classe QuestionnaireDAO
require_once '../daos/questionnaireDAO.php';
require_once("../connexion/Connexion.php");
require_once("../models/questionnaire.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $connexion = new Connexion();
    $pdo = $connexion->seConnecter("faw.ini");

    // Instanciation de l'objet DAO pour les questionnaires
    $QuestionnaireDAO = new QuestionnaireDAO($pdo);

    // Récupérer les données du formulaire
    $q1 = isset($_POST["q1"]) ? $_POST["q1"] : "";
    $q2 = isset($_POST["q2"]) ? $_POST["q2"] : "";
    $q3 = isset($_POST["q3"]) ? $_POST["q3"] : "";
    $q4 = isset($_POST["q4"]) ? $_POST["q4"] : "";
    $id_salariees = isset($_POST["id_salariees"]) ? $_POST["id_salariees"] : "";

    // Créer un tableau avec les données du formulaire
    $data = array(
        'q1' => $q1,
        'q2' => $q2,
        'q3' => $q3,
        'q4' => $q4,
        'id_salariees' => $id_salariees
    );

    // Insérer les réponses du questionnaire dans la base de données en utilisant la méthode insert de votre DAO
    $questionnaireID = $QuestionnaireDAO->insert($data);

    // Vérification du résultat de l'insertion
    if ($questionnaireID !== false) {
        $message = "Questionnaire transmis avec succès";
    } else {
        $messageKO = "Échec, le questionnaire n'est pas transmis";
    }
}

// Inclure la vue QuestionnaireV1.php
include('../views/questionnaireView.php');
