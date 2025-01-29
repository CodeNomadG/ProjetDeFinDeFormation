<?php

/*
 * InscriptionCTRL.php
 */

/*
  INPUTS
 */
require_once("../daos/salarieesDAO.php");
require_once("../connexion/connexion.php");



$pseudo = filter_input(INPUT_POST, "pseudo");
$email1 = trim(filter_input(INPUT_POST, "email1"));
$email2 = trim(filter_input(INPUT_POST, "email2"));
$mdp1 = trim(filter_input(INPUT_POST, "mdp1"));
$mdp2 = trim(filter_input(INPUT_POST, "mdp2"));
$mobile = filter_input(INPUT_POST, "mobile");
$poste = filter_input(INPUT_POST, "poste");
$cp = filter_input(INPUT_POST, "cp");
$ville = filter_input(INPUT_POST, "ville");
$id_ville = filter_input(INPUT_POST, "id_ville");
$bt_submit = filter_input(INPUT_POST, "bt_submit");

/*
  TRT
 */
$messageKOPseudo = "";
$messageKOEmail1 = "";
$messageKOEmail2 = "";
$messageKOMdp1 = "";
$messageKOMdp2 = "";
$messageKOMobile = "";
$messageKOPoste = "";
$messageKOCp = "";
$messageKOVille = "";
$messageKOPseudo = "";

$messageKO = "";
$messageOK = "";


$nKO = 0;

// Vérification du pseudo
if (empty($pseudo)) {
    $messageKOPseudo = "Pseudo requis";
    $nKO++;
} elseif (!preg_match('/^[a-z0-9_-]{3,16}$/i', $pseudo)) {
    $messageKOPseudo = "Pseudo invalide";
    $nKO++;
}

// Vérification de l'e-mail
if (empty($email1)) {
    $messageKOEmail1 .= "<br/>E-mail requis";
    $nKO++;
} elseif (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
    $messageKOEmail1 .= "<br/>E-mail invalide";
    $nKO++;
}


if ($email2 == null || $email2 != $email1) {
    $messageKOEmail2 .= "<br/> Confirmation de l'email requise ou différent";
    $nKO++;
}

// Vérification du mot de passe 1
if (empty($mdp1)) {
    $messageKOMdp1 .= "<br/>Mot de passe requis";
    $nKO++;
} elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/', $mdp1)) {
    $messageKOMdp1 .= "<br/>Mot de passe invalide";
    $nKO++;
}

// Vérification du mot de passe 2
if ($mdp2 == null || $mdp2 != $mdp1) {
    $messageKOMdp2 .= "<br/>Mot de passe requis ou différent";
    $nKO++;
}

// Vérification du mobile
if (empty($mobile)) {
    $messageKOMobile .= "<br/>Numéro de téléphone requis";
    $nKO++;
} elseif (!preg_match('/^(0|\+33|0033)[1-9]([-. ]?[0-9]{2}){4}$/', $mobile)) {
    $messageKOMobile .= "<br/>Numéro de téléphone invalide";
    $nKO++;
}


// Vérification du poste
if (empty($poste)) {
    $messageKOPoste .= "<br/>Intitulé du Poste requis";
    $nKO++;
} elseif (!preg_match('/^[a-zA-Z0-9\s-]{2,50}$/', $poste)) {
    $messageKOPoste .= "<br/>Intitulé du poste invalide";
    $nKO++;
}

// Vérification du code postal
if (empty($cp)) {
    $messageKOCp .= "<br/>Code postal requis";
    $nKO++;
} elseif (!preg_match('/^\d{5}$/', $cp)) {
    $messageKOCp .= "<br/>Code postal invalide";
    $nKO++;
}

// Vérification du nom de la ville
if (empty($ville)) {
    $messageKOVille .= "<br/>Nom de la ville requis";
    $nKO++;
} elseif (!preg_match('/^[a-zA-Z0-9\s-]{2,50}$/', $ville)) {
    $messageKOVille .= "<br/>Nom de la ville invalide";
    $nKO++;
}
// Si tous les champs sont remplis, procédez à l'authentification
// Vérifier les champs requis et la correspondance des emails et mots de passe
if (empty($pseudo)) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} elseif (empty($email1) || empty($email2) || $email2 != $email1) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} elseif (empty($mdp1) || empty($mdp2) || $mdp2 != $mdp1) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} elseif (empty($mobile)) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} elseif (empty($poste)) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} elseif (empty($cp)) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} elseif (empty($ville)) {
    $messageErreur = "Tous les champs de saisie sont obligatoires !";
} else

    // Si tous les champs sont remplis et valides, procédez à l'insertion dans la base de données
    if ($nKO === 0) {



        // if ($bt_submit !== null && $nKO === 0) {

        // Connexion à la base de données
        // $connexion = new Connexion(); // Créez une instance de la classe Connexion
        // $cnx = $connexion->seConnecter("petitourson.ini");

        if ($_SERVER["REQUEST_METHOD"] == "POST" && $nKO === 0) {
            $connexion = new Connexion(); // Créer une instance de la classe Connexion
            $pdo = $connexion->seConnecter("faw.ini"); // Connectez-vous à la base de données

            // Requête SQL pour vérifier si le pseudo ou l'email existe déjà dans la base de données
            $query = "SELECT * FROM salariees WHERE email = :email OR pseudo = :pseudo";
            $statement = $pdo->prepare($query);
            $statement->execute(array(':email' => $email1, ':pseudo' => $pseudo));

            // Vérifiez si des résultats ont été renvoyés
            if ($statement->rowCount() > 0) {
                // Le compte existe déjà dans la base de données, afficher un message d'erreur
                $messageErreur = "Un compte avec ce pseudo ou cet email existe déjà.";
            } else {
                // Le compte n'existe pas encore dans la base de données, procédez à l'inscription
                // Code pour inscrire l'utilisateur dans la base de données
                // ...
                // Affichez un message de succès ou redirigez l'utilisateur vers une autre page

                // Instanciation de l'objet DAO pour les parents
                // $parentDAO = new ParentDAO($cnx);

                // Instanciation de l'objet DAO pour les parents
                $SalarieesDAO = new SalarieesDAO($pdo);

                // Création d'un tableau associatif avec les données du parent
                $data = array(
                    // "civilite_parent" => $civilite,
                    // "nom_parent" => $nom,
                    // "prenom_parent" => $prenom,
                    // "date_naissance" => $dateNaissance,
                    "pseudo" => $pseudo,
                    "email" => $email1,
                    "mdp" => $mdp1,
                    "mobile" => $mobile,
                    "poste" => $poste,
                    "cp" => $cp,
                    "ville" => $ville,
                    "id_ville" => $id_ville
                );

                // Insertion des données dans la base de données
                // $parentID = insert($cnx, $data);
                $salarieesID = $SalarieesDAO->insert($data);

                // Vérification du résultat de l'insertion
                if ($salarieesID == 1) {
                    $message = "Inscription reussit";
                    // echo "Parent inséré avec l'ID : " . $parentID;
                } else {
                    $messageKO = "Echec de l'inscription veuillez contactez l'administrateur";
                    //     echo "Erreur lors de l'insertion du parent.";
                }
            }
        }
    }
// }

/*
OUTPUTS
*/
// echo "  $messageErreur";
// echo "$messageKO";
//echo "<hr/>$messageOK<hr/>";
//Isma42@gmail

include '../views/inscriptionView.php';
