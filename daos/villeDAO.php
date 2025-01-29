<?php
// Inclusion du fichier de connexion à la base de données
require_once("../daos/connexion.php");
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

    // Méthode pour insérer des données dans la table "salairees" de la base de données
    public function insert(Salariees $salariees): int
    {
        $affected = 0;
        try {
            $insertQuery = "INSERT INTO salariees(pseudo, email, mdp, mobile, poste, cp, ville) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $statement = $this->pdo->prepare($insertQuery);
            $statement->bindValue(1, $salariees->getPseudo());
            $statement->bindValue(2, $salariees->getEmail());
            $statement->bindValue(3, $salariees->getMdp());
            $statement->bindValue(4, $salariees->getMobile());
            $statement->bindValue(5, $salariees->getPoste());
            $statement->bindValue(6, $salariees->getCp());
            $statement->bindValue(7, $salariees->getVille());

            $statement->execute();

            $affected = $statement->rowCount();
        } catch (PDOException $e) {
            // Gérer les erreurs de manière appropriée, par exemple, log ou renvoyer une exception
            echo $e->getMessage(); // Afficher un message d'erreur
            $affected = -1;
        }
        return $affected;
    }

    // Méthode pour supprimer une ville de la base de données
    public function delete(Salariees $salariees): int
    {
        $affected = 0;
        try {
            $deleteQuery = "DELETE FROM salariees WHERE id_ville = ?";

            $statement = $this->pdo->prepare($deleteQuery);

            $statement->bindValue(1, $salariees->getIdSalariees());

            $statement->execute();

            $affected = $statement->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage(); // Afficher un message d'erreur
            $affected = -1;
        }
        return $affected;
    }

    public function update(Salariees $salariees): int
    {
        $affected = 0;
        try {

            //Syntaxe : UPDATE « la table » SET colonne1 = valeur1, colonne2 = valeur2 WHERE PK = valeur
            $sql = "UPDATE salariees SET pseudo, email, mdp, mobile, poste, cp, ville) WHERE id_salariees=?";
            // On sollicite la methode prepare() qui compile l'ordre SQL de l'objet pdo
            // L'objet pdo est un attribut de la classe Salariees
            $cmd = $this->pdo->prepare($sql);
            // On valorise les valeurs des parametres de la requête SQL
            // Liaison entre le parametre 1 et la valeur récupérée dans l'objet Salariees grâce à un getter
            $cmd->bindValue(1, $salariees->getPseudo());
            $cmd->bindValue(2, $salariees->getEmail());
            $cmd->bindValue(3, $salariees->getMdp());
            $cmd->bindValue(4, $salariees->getMobile());
            $cmd->bindValue(5, $salariees->getPoste());
            $cmd->bindValue(6, $salariees->getCp());
            $cmd->bindValue(7, $salariees->getVille());
            $cmd->bindValue(8, $salariees->getIdSalariees());
            // On execute la requête SQL
            $cmd->execute();
            // On récupère le nombre de ligne(s) modifiée(s)
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            /*
    *On écrit dans le catch : affichage du message d’erreur : $e→getMessage()… 
    *On sollicite la methode getMessage() de l’objet $e qui est de la classe PDOException.
    */
            echo $e->getMessage();
            $affected = -1;
        }
        return $affected;
    }




    public function selectOne(int $pk): Salariees
    {
        try {
            // Prépare la requête SQL avec un paramètre de substitution
            $cursor = $this->pdo->prepare("SELECT * FROM salariees WHERE id_ville = ?");

            // Lie le paramètre à la valeur fournie (probablement un identifiant de salarie)
            $cursor->bindParam(1, $pk);

            // Exécute la requête préparée avec le paramètre lié
            $cursor->execute();

            // Récupère la première ligne de résultat de la requête (s'il y en a)
            $record = $cursor->fetch();


            if ($record != null) {
                // Utilisation du constructeur de Ville pour créer un objet Ville
                $salariees = new Salariees($record["id_salariees"], $record["pseudo"], $record["email"], $record["mdp"], $record["mobile"], $record["poste"], $record["cp"], $record["ville"]);
            } else {
                // Si la ligne n'est pas trouvée, créer une Ville avec des valeurs par défaut
                $salariees = new Salariees(0, "Introuvable");
            }

            $cursor->closeCursor();
        } catch (PDOException $e) {
            // En cas d'erreur, créer une Ville avec un code d'erreur et le message d'erreur
            $salariees = new Salariees(-1, $e->getMessage());
        }

        return $salariees;
    }
    public function SelectAll(): array
    {
        try {
            // Initialiser un tableau pour stocker les objets Ville
            $salariees = [];
            // Construire la requête SQL de sélection
            $requêteSélection = "SELECT * FROM salariees";
            // Exécuter la requête SQL
            $instruction = $this->pdo->query($requêteSélection);
            // Parcourir chaque enregistrement retourné par la requête
            while ($record = $instruction->fetch()) {
                // Créer un objet Ville à partir des données de l'enregistrement

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
                // Ajouter l'objet Ville au tableau des villes
                $tSalariees[] = $salariees;
            }
            // Fermer le curseur de la requête
            $instruction->closeCursor();
        } catch (PDOException $e) {
            // En cas d'erreur, afficher le message d'erreur et initialiser le tableau des villes
            echo $e->getMessage();
            $tSalariees = [];
        }
        // Retourner le tableau des villes
        return $tSalariees;
    }
}
