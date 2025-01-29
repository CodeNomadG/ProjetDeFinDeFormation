<?php

session_start(); // Démarrage de la session
require_once("../connexion/connexion.php"); // Inclusion de la classe de connexion à la base de données
require_once("../models/taches.php"); // Inclusion de la classe de modèle Taches

class TacheDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    // Sélectionner une tâche par ID
    public function selectTacheById(int $id): ?Tache
    {
        $stmt = $this->pdo->prepare("SELECT * FROM taches_personnelles WHERE id_tache = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Tache($data['id_tache'], $data['id_salariees'], $data['titre'], $data['description'], $data['date_creation'], $data['date_echeance'], $data['statut']);
        }
        return null; // Retourne null si aucune tâche n'est trouvée
    }

    // Méthode pour insérer une tâche dans la base de données
    public function insert(array $data): int
    {
        if (!isset($_SESSION['id_salariees']) || empty($_SESSION['id_salariees'])) {
            throw new Exception("Erreur: Cet utilisateur n'existe pas, veuillez vous inscrire");
        }

        $sql = "INSERT INTO taches_personnelles (id_salariees, titre, description, date_creation, date_echeance, statut) 
                VALUES (:id_salariees, :titre, :description, NOW(), :date_echeance, :statut)";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->bindParam(':id_salariees', $_SESSION['id_salariees'], PDO::PARAM_INT);
            $statement->bindParam(':titre', $data['titre']);
            $statement->bindParam(':description', $data['description']);
            $statement->bindParam(':date_echeance', $data['date_echeance']);
            $statement->bindParam(':statut', $data['statut']);
            $statement->execute();

            return $statement->rowCount();
        } catch (PDOException $e) {
            error_log("Erreur lors de l'insertion de la tâche : " . $e->getMessage());
            return -1;
        }
    }



    // Méthode pour supprimer une tâche
    public function delete(Tache $tache): int
    {
        $sql = "DELETE FROM taches_personnelles WHERE id_tache = :id_tache AND id_salariees = :id_salariees";

        try {
            $statement = $this->pdo->prepare($sql);
            $idTache = $tache->getIdTache();
            $idSalariees = $_SESSION['id_salariees'];

            $statement->bindParam(':id_tache', $idTache, PDO::PARAM_INT);
            $statement->bindParam(':id_salariees', $idSalariees, PDO::PARAM_INT);
            $statement->execute();

            return $statement->rowCount();
        } catch (PDOException $e) {
            error_log("Erreur lors de la suppression de la tâche : " . $e->getMessage());
            return -1;
        }
    }



    // Mettre à jour une tâche
    public function updateTache(Tache $tache): int
    {
        if (!isset($_SESSION['id_salariees']) || empty($_SESSION['id_salariees'])) {
            throw new Exception("Erreur: Cet utilisateur n'existe pas, veuillez vous inscrire");
        }
        $sql = "UPDATE taches_personnelles 
                SET titre = :titre, 
                    description = :description, 
                    date_creation = NOW(),
                    date_echeance = :date_echeance, 
                    statut = :statut
                WHERE id_tache = :id_tache";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(':titre', $tache->getTitre());
            $statement->bindValue(':description', $tache->getDescription());
            $statement->bindValue(':date_echeance', $tache->getDateEcheance());
            $statement->bindValue(':statut', $tache->getStatut());
            $statement->bindValue(':id_tache', $tache->getIdTache(), PDO::PARAM_INT);
            $statement->execute();

            return $statement->rowCount();
        } catch (PDOException $e) {
            error_log("Erreur lors de la mise à jour : " . $e->getMessage());
            return -1;
        }
    }

    // Afficher la liste des tâches
    public function selectAllTaches(): array
    {
        if (!isset($_SESSION['id_salariees']) || empty($_SESSION['id_salariees'])) {
            throw new Exception("Erreur: ID de l'utilisateur non trouvé dans la session.");
        }

        $taches = [];
        $requete = "SELECT t.*, s.* FROM taches_personnelles t JOIN salariees s ON t.id_salariees = s.id_salariees WHERE t.id_salariees = :id_salariees";

        try {
            $statement = $this->pdo->prepare($requete);
            $statement->bindParam(':id_salariees', $_SESSION['id_salariees'], PDO::PARAM_INT);
            $statement->execute();

            while ($enregistrement = $statement->fetch(PDO::FETCH_ASSOC)) {
                $taches[] = new Tache($enregistrement['id_tache'], $enregistrement['id_salariees'], $enregistrement['titre'], $enregistrement['description'], $enregistrement['date_creation'], $enregistrement['date_echeance'], $enregistrement['statut']);
            }

            return $taches;
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des tâches : " . $e->getMessage());
            return [];
        }
    }
}
