<?php

// Inclusion du fichier de connexion à la base de données
require_once("../connexion/connexion.php");
require_once("../models/salariees.php");


// Déclaration de la classe SalarieesDAO
class SalarieesDAO
{
    // Propriété privée pour stocker l'instance de PDO
    private $pdo;

    // Constructeur prenant une instance PDO pour la connexion à la base de données
    public function __construct(PDO $pdo)
    {
        // Attribution de l'instance de PDO à la propriété $pdo de la classe
        $this->pdo = $pdo;
    }

    // Méthode pour insérer des données dans la table "salariees" de la base de données
    public function insert(array $data): int
    {
        // Initialisation du nombre de lignes affectées à zéro
        $affected = 0;

        // Requête SQL pour récupérer l'id_ville en fonction du nom de la ville fourni
        $sql_select_ville = "SELECT id_ville FROM villes WHERE nom_ville = :nom_ville";

        try {
            // Préparation de la requête SQL
            $statement_select_ville = $this->pdo->prepare($sql_select_ville);
            // Attribution de la valeur du paramètre nom_ville avec bindValue
            $statement_select_ville->bindValue(':nom_ville', $data["ville"]);
            // Exécution de la requête SQL
            $statement_select_ville->execute();
            // Récupération de l'identifiant de la ville
            $id_ville = $statement_select_ville->fetchColumn();

            // Requête SQL d'insertion du salarié avec l'id_ville récupéré
            $sql_insert_salariees = "INSERT INTO salariees(pseudo, email, mdp, mobile, poste, cp, ville, id_ville) VALUES (:pseudo, :email, :mdp, :mobile, :poste, :cp, :ville, :id_ville)";

            // Préparation de la requête SQL d'insertion
            $insert_salariees = $this->pdo->prepare($sql_insert_salariees);

            // Hasher le mot de passe
            $hashed_password = password_hash($data["mdp"], PASSWORD_DEFAULT);

            // Attribution des valeurs des paramètres avec bindValue
            $insert_salariees->bindValue(':pseudo', $data["pseudo"]);
            $insert_salariees->bindValue(':email', $data["email"]);
            $insert_salariees->bindValue(':mdp', $hashed_password); // Mot de passe hashé
            $insert_salariees->bindValue(':mobile', $data["mobile"]);
            $insert_salariees->bindValue(':poste', $data["poste"]);
            $insert_salariees->bindValue(':cp', $data["cp"]);
            $insert_salariees->bindValue(':ville', $data["ville"]);
            $insert_salariees->bindValue(':id_ville', $id_ville);

            // Exécution de la requête SQL d'insertion
            $insert_salariees->execute();
            // Récupération du nombre de lignes affectées par l'insertion
            $affected = $insert_salariees->rowCount();
        } catch (PDOException $e) {
            // En cas d'erreur, affichage du message d'erreur et attribution de -1 à $affected
            echo $e->getMessage();
            $affected = -1;
        }
        // Retour du nombre de lignes affectées par l'insertion
        return $affected;
    }
}
