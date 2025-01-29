<?php
// Démarre la session
session_start();

// Vide toutes les variables de session
$_SESSION = array();

// Si un cookie de session existe, le supprimer
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Détruit la session
session_destroy();

// Empêche le cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


if (!isset($_SESSION['user_id'])) {
    // Redirige l'utilisateur vers la page de connexion ou d'accueil
    header("Location: ../views/connexionView.php");  // Ou accueil.php selon ton choix
    exit();
}
