<?php
//Fichier SelectAllTacheCtrl.php

// Inclure les fichiers nécessaires
require_once('../daos/tacheDAO.php');
require_once('../connexion/connexion.php');
require_once("../models/taches.php");

// Assurez-vous de démarrer la session si ce n'est pas déjà fait

$taches = []; // Initialisation du tableau $taches

// Connexion à la base de données
$connexion = new Connexion();
$pdo = $connexion->seConnecter("../conf/faw.ini");

// Instanciation de l'objet DAO pour les tâches
$tacheDAO = new TacheDAO($pdo);

// Récupérer toutes les tâches depuis la base de données
// $taches = $tacheDAO->selectAllTaches();
// $taches = $tacheDAO->selectAllTaches();
$taches = $tacheDAO->selectAllTaches();

// Inclure le fichier de vue pour afficher les tâches

include '../views/agendaSelectAllView.php';












// // Connexion à la BD
// $cnx = new Connexion();
// $pdo = $cnx->seConnecter('../conf/faw.ini');

// // Instanciation d'un objet DAO
// $dao = new TacheDAO($pdo);

// // On sollicite la méthode selectAll du DAO et on récupère les villes
// $taches = $dao->selectAllTaches();



// // On crée l'IHM (include)
