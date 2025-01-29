<?php
session_start(); // Démarrer la session
// Inclusion des fichiers nécessaires pour la connexion à la base de données et les opérations sur les salariés
require_once("../connexion/connexion.php");
require_once("../daos/salarieesDAO.php");

// Fonction pour créer l'espace utilisateur s'il n'existe pas déjà
function creerEspaceUtilisateurSiNexistePas($idSalariees)
{
    try {
        $connexion = new Connexion(); // Créer une instance de connexion
        $pdo = $connexion->seConnecter("faw.ini"); // Se connecter à la base de données en utilisant le fichier de configuration
    } catch (PDOException $e) {
        // Gérer les erreurs de création d'espace utilisateur
        echo "Erreur lors de la création de l'espace utilisateur : " . $e->getMessage();
    }
}
// Récupérer et filtrer les entrées de l'utilisateur
$email = trim(filter_input(INPUT_POST, "email1", FILTER_SANITIZE_EMAIL)); // Filtrer et nettoyer l'email
$mdp = trim(filter_input(INPUT_POST, "mdp1")); // Nettoyer le mot de passe

// Initialiser les messages d'erreur et le compteur d'erreurs
$messageKOEmail = "";
$messageKOMdp = "";
$messageErreur = "";
$nKO = 0;
// Contrôles de surface 
// Vérification de l'e-mail
if (empty($email)) {
    $messageKOEmail .= "<br/>E-mail requis";
    $nKO++;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $messageKOEmail .= "<br/>E-mail invalide";
    $nKO++;
}
// Vérification du mot de passe
if (empty($mdp)) {
    $messageKOMdp .= "<br/>Mot de passe requis";
    $nKO++;
} elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/', $mdp)) {
    $messageKOMdp .= "<br/>Mot de passe invalide";
    $nKO++;
}
// Si tous les champs sont remplis, procédez à l'authentification
if (empty($email) || empty($mdp)) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} else
    // Si tous les champs sont remplis et valides, procédez à l'authentification
    if ($nKO === 0) {
        try {
            $connexion = new Connexion(); // Créer une instance de connexion
            $pdo = $connexion->seConnecter("faw.ini"); // Se connecter à la base de données

            // Préparer et exécuter la requête pour authentifier l'utilisateur
            $requeteAuthentification = $pdo->prepare("SELECT * FROM salariees WHERE email = ?");
            $requeteAuthentification->execute([$email]);
            $user = $requeteAuthentification->fetch();
            if ($user) {
                // Vérification du mot de passe hashé
                if (password_verify($mdp, $user['mdp'])) {
                    // Authentification réussie
                    // Stocker l'identifiant de l'utilisateur dans une session
                    $_SESSION['id_salariees'] = $user['id_salariees'];
                    // Séparer l'email en deux parties en utilisant le '@' comme délimiteur et stocker le nom d'utilisateur dans la session
                    $emailParts = explode('@', $email);
                    $_SESSION['username'] = $emailParts[0];
                    // Créer l'espace utilisateur s'il n'existe pas déjà
                    creerEspaceUtilisateurSiNexistePas($_SESSION['id_salariees']);
                    // Redirection vers l'espace utilisateur avec un message de succès
                    header("Location: ../views/tableauDeBord.php?success_message=Ravi+de+vous+revoir+!");
                    exit();
                } else {
                    // Mot de passe incorrect
                    $messageErreur = "Nom d'utilisateur ou Mot de passe incorrect ";
                }
            } else {
                // Utilisateur non trouvé
                $messageErreur = "Nom d'utilisateur ou Mot de passe incorrect";
            }
        } catch (PDOException $e) {
            // Erreur de connexion à la base de données
            $messageErreur = "Erreur de connexion : " . $e->getMessage();
        }
    }

// Afficher les erreurs de validation et le formulaire de connexion
include '../views/ConnexionView.php';
