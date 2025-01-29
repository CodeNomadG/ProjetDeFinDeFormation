<?php
// Définition de la classe Connexion qui sera utilisée pour établir une connexion à une base de données
class Connexion
{
    // Méthode pour seConnecter qui prend en paramètre le chemin vers un fichier INI de configuration
    public function seConnecter($iniFilePath)
    {
        // Vérification et ajustement du chemin si nécessaire
        if (!file_exists($iniFilePath)) {
            // Si le fichier INI n'existe pas dans le chemin donné, ajustez le chemin
            $iniFilePath = dirname(__FILE__) . '/../conf/faw.ini';
        }
        // Lecture du fichier INI et stockage des paramètres de configuration dans un tableau associatif
        $config = parse_ini_file($iniFilePath, true);
        // Vérification si la lecture du fichier de configuration a réussi
        if (!$config) {
            // Si la lecture échoue, une exception est lancée avec un message d'erreur
            throw new Exception("Unable to read the configuration file.");
        }
        // Récupération des paramètres de connexion à partir du tableau de configuration
        $protocole = $config['section_connexion']['protocole']; // Protocole (par ex. mysql)
        $host = $config['section_connexion']['host'];           // Hôte (par ex. localhost)
        $port = $config['section_connexion']['port'];           // Port (par ex. 3306)
        $db = $config['section_connexion']['db'];               // Nom de la base de données
        $user = $config['section_connexion']['ut'];             // Nom d'utilisateur
        $mdp = $config['section_connexion']['mdp'];             // Mot de passe


        // Construction de la chaîne de connexion (DSN) nom de la source de données pour PDO
        $dsn = "$protocole:host=$host;port=$port;dbname=$db";

        try {
            // Tentative de création d'une nouvelle instance PDO avec les paramètres fournis
            $pdo = new PDO($dsn, $user, $mdp);
            // Configuration de l'attribut pour lever des exceptions en cas d'erreurs SQL
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Retourne l'instance PDO si la connexion est réussie
            return $pdo;
        } catch (PDOException $e) {
            // Enregistrer l'erreur dans un fichier de log
            error_log("Erreur de connexion : ", 3, dirname(__FILE__) . '/../logs/errors.log');
            // En cas d'échec de la connexion, une exception PDO est lancée avec un message d'erreur détaillé
            throw new PDOException("Veuillez réessayer plus tard.");
        }
    }
}
