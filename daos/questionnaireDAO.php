<?php

session_start();
require_once("../connexion/Connexion.php");

class QuestionnaireDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert(array $data): int
    {
        $affectedRows = 0;

        // Récupère l'ID de l'utilisateur connecté à partir de la session
        // Assurez-vous que $_SESSION['id_salariees'] est défini et non vide
        if (!isset($_SESSION['id_salariees']) || empty($_SESSION['id_salariees'])) {
            // Gérez l'erreur ou redirigez l'utilisateur vers une page appropriée
            exit("Erreur: ID de l'utilisateur non trouvé dans la session.");
        }
        $idUserConnecte = $_SESSION['id_salariees'];

        $sql = "INSERT INTO questionnaire (id_questionnaire, q1, q2, q3, q4, id_salariees) 
                VALUES (NULL, :q1, :q2, :q3, :q4, :id_salariees)";

        try {
            $statement = $this->pdo->prepare($sql);

            // Lier les valeurs du tableau $data aux paramètres de la requête préparée
            $statement->bindParam(':q1', $data['q1']);
            $statement->bindParam(':q2', $data['q2']);
            $statement->bindParam(':q3', $data['q3']);
            $statement->bindParam(':q4', $data['q4']);
            $statement->bindParam(':id_salariees', $_SESSION['id_salariees'], PDO::PARAM_INT);

            $statement->execute();
            $affectedRows = $statement->rowCount();
        } catch (PDOException $e) {
            error_log("Erreur lors de l'insertion du questionnaire : " . $e->getMessage());
            $affectedRows = -1;
        }
        return $affectedRows;
    }
}
