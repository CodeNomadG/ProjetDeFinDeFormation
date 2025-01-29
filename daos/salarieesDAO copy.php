<?php
// SalarieesDAO.php
// Inclusion de la classe Salariees
require_once('../models/salariees.php');
require_once('../connexion/connexion.php');


// Définition de la classe SalarieesDAO
class SalarieesDAO
{
    // Propriété pour stocker la connexion PDO à la base de données
    private PDO $pdo;
    // Constructeur de la classe prenant une connexion PDO en paramètre
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    /**
     * Méthode pour insérer un Salarié dans la base de données
     * @param Salariees $salariees - Objet Salariees à insérer
     * @return int - Nombre de lignes affectées par l'insertion
     */
    public function insert(Salariees $salariees): int
    {
        // Initialisation du nombre de lignes affectées à 0
        $affected = 0;

        try {
            // Préparation de la requête SQL pour l'insertion
            $cmd = $this->pdo->prepare("INSERT INTO salariees (pseudo, email,
             mdp, mobile, poste, cp, ville, id_ville) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            //             $cmd = $this->pdo->prepare("INSERT INTO salariees (pseudo = ?, email = ?,
            // mdp = ?, mobile = ?, poste = ?, cp = ?, ville = ?, id_ville = ?) 
            // VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            // Liaison des valeurs aux paramètres de la requête
            $cmd->bindValue(1, $salariees->getPseudo());
            $cmd->bindValue(2, $salariees->getEmail());
            $cmd->bindValue(3, $salariees->getMdp());
            $cmd->bindValue(4, $salariees->getMobile());
            $cmd->bindValue(5, $salariees->getPoste());
            $cmd->bindValue(6, $salariees->getCp());
            $cmd->bindValue(7, $salariees->getVille());
            $cmd->bindValue(8, $salariees->getIdVille());


            // Exécution de la requête
            $cmd->execute();

            // Récupération du nombre de lignes affectées
            $affected = $cmd->rowcount();
        } catch (PDOException $e) {

            error_log($e->getMessage());
            // Gestion des exceptions (en commentaire ici)
            // echo $e->getMessage(); // echo seulement en test
            $affected = -1; // En cas d'erreur, on définit $affected à -1
        }

        // Retour du nombre de lignes affectées
        return $affected;
    }

    // Méthode pour supprimer un salarie de la base de données
    // ... continuer de la même manière pour les autres méthodes ...


    /**
     * Méthode pour supprimer une ville de la base de données
     * @param Salariees $salariees - Objet Salariees à supprimer
     * @return int - Nombre de lignes affectées par la suppression
     */
    public function delete(Salariees $salariees): int
    {
        // Initialisation du nombre de lignes affectées à 0
        $affected = 0;

        try {
            // Préparation de la requête SQL pour la suppression
            $cmd = $this->pdo->prepare("DELETE FROM salariees WHERE id_ville = ?");

            // Liaison de la valeur de l'ID du salarie au paramètre de la requête
            $cmd->bindValue(1, $salariees->getIdSalariees());

            // Exécution de la requête
            $cmd->execute();

            // Récupération du nombre de lignes affectées
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            // Gestion des exceptions
            // Affichage du message d'erreur
            echo $e->getMessage();
            // En cas d'erreur, on définit $affected à -1
            $affected = -1;
        }

        // Retour du nombre de lignes affectées
        return $affected;
    }

    /**
     * Méthode pour mettre à jour les données du salarie dans la base de données
     * @param Salariees $salariees - Objet Salariees avec les nouvelles données
     * @return int - Nombre de lignes affectées par la mise à jour
     */
    public function update(Salariees $salariees): int
    {
        // Initialisation du nombre de lignes affectées à 0
        $affected = 0;

        try {
            // Préparation de la requête SQL pour la mise à jour
            $cmd = $this->pdo->prepare("UPDATE salariees SET pseudo, email, mdp, mobile, poste, cp, ville) WHERE id_ville=?");

            // Liaison des valeurs aux paramètres de la requête
            $cmd->bindValue(1, $salariees->getPseudo());
            $cmd->bindValue(2, $salariees->getEmail());
            $cmd->bindValue(3, $salariees->getMdp());
            $cmd->bindValue(4, $salariees->getMobile());
            $cmd->bindValue(5, $salariees->getPoste());
            $cmd->bindValue(6, $salariees->getCp());
            $cmd->bindValue(7, $salariees->getVille());

            // Exécution de la requête
            $cmd->execute();

            // Récupération du nombre de lignes affectées
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            // Gestion des exceptions
            // Affichage du message d'erreur (uniquement pour les tests)
            echo $e->getMessage();
            // En cas d'erreur, on définit $affected à -1
            $affected = -1;
        }

        // Retour du nombre de lignes affectées
        return $affected;
    }


    /**
     * Méthode pour sélectionner un seul salarie dans la base de données par son ID
     * @param int $pk - ID de la ville à sélectionner
     * @return salariees - Objet Salariees correspondant à l'ID fourni
     */
    public function selectOne(int $pk): Salariees
    {
        // Début du bloc try-catch pour la gestion des exceptions
        try {
            // Préparation de la requête SQL pour la sélection
            $cursor = $this->pdo->prepare("SELECT * FROM salariees WHERE id_ville = ?");

            // Liaison de la valeur de l'ID du salarie au paramètre de la requête
            $cursor->bindParam(1, $pk);

            // Exécution de la requête
            $cursor->execute();

            // Récupération du résultat de la requête
            $record = $cursor->fetch();

            // Création de l'objet Salarie correspondant aux données récupérées
            if ($record != null) {
                $salariees = new Salariees($record["id_salariees"], $record["pseudo"], $record["email"], $record["mdp"], $record["mobile"], $record["poste"], $record["cp"], $record["ville"]);
            } else {
                $salariees = new Salariees(0, "Introuvable");
            }

            // Fermeture du curseur
            $cursor->closeCursor();
        } catch (PDOException $e) {
            // Gestion des exceptions en cas d'erreur
            // Création d'une nouvelle instance de salarie avec un message d'erreur
            $salariees = new Salariees(-1, $e->getMessage());
        }

        // Retour de l'objet Salariees
        return $salariees;
    }

    /**
     * Méthode pour sélectionner tout les salariees dans la base de données
     * @return array - Tableau d'objets Ville
     */
    public function selectAll(): array
    {
        // Initialisation du tableau de salariees
        $tSalariees = array();

        try {
            // Exécution de la requête SQL pour la sélection de tout les salairees
            $cursor = $this->pdo->query("SELECT * FROM salariees");

            // Configuration du mode de récupération des résultats en tableau associatif
            $cursor->setFetchMode(PDO::FETCH_ASSOC);

            // Boucle pour parcourir les résultats de la requête
            while ($record = $cursor->fetch()) {
                // Création de l'objet Salariees correspondant aux données récupérées
                $salariees = new Salariees(
                    $record["id_salariees"],
                    $record["pseudo"],
                    $record["email"],
                    $record["mdp"],
                    $record["mobile"],
                    $record["poste"],
                    $record["cp"],
                    $record["ville"]
                );

                // Ajout de l'objet Salariees au tableau
                $tSalariees[] = $salariees;
            }

            // Fermeture du curseur
            $cursor->closeCursor();
        } catch (PDOException $e) {
            // Gestion des exceptions en cas d'erreur
            // Création d'une nouvelle instance de Ville avec un message d'erreur
            $tSalariees[] = new Salariees("-1", $e->getMessage());
        }

        // Retour du tableau d'objets Salariees
        return $tSalariees;
    }
}
