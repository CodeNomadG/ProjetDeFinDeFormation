<?php
//connexionTest.php

// Inclure le fichier de connexion
require_once 'connexion.php';

// Définir les informations de connexion à la base de données
// $host = "127.0.0.1";
// $db = "faw";
// $user = "ut";
// $mdp = "mdp";

// Créer une instance de la classe Connexion
$connexion = new Connexion();

try {
    // Appeler la méthode seConnecter() pour établir la connexion à la base de données
    $pdo = $connexion->seConnecter("../conf/faw.ini");

    // Si la connexion est établie avec succès, afficher un message de succès
    echo "Connexion à la base de données établie avec succès !";
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher le message d'erreur
    echo "Erreur de connexion : " . $e->getMessage();
}
