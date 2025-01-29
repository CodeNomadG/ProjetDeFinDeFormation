<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Assurez-vous que le chemin est correct

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $entite = htmlspecialchars($_POST['entite']);
    $message = htmlspecialchars($_POST['message']);

    // Destinataire
    $to = "dirocloud@gmail.com";
    $subject = "Demande de Devis de $nom $prenom";

    // Corps du message
    $body = "Nom: $nom $prenom\n";
    $body .= "E-mail: $email\n";
    $body .= "Téléphone: $mobile\n";
    $body .= "Entité: $entite\n";
    $body .= "Message:\n$message\n";

    // Créer une instance de PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configurer le serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = getenv('SMTP_USERNAME'); // Utilisez une variable d'environnement
        $mail->Password = getenv('SMTP_PASSWORD'); // Utilisez une variable d'environnement
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configurer l'e-mail
        $mail->setFrom($email, "$nom $prenom");
        $mail->addAddress($to); // Ajouter le destinataire

        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Envoyer l'e-mail
        $mail->send();
        header("Location: ../views/devisView.php?success_message=Merci ! Votre demande a été envoyée.");
    } catch (Exception $e) {
        // En cas d'erreur
        error_log('Message non envoyé. Erreur: ' . $mail->ErrorInfo);
        header("Location: ../views/devisView.php?error_message=Désolé, une erreur est survenue. Veuillez réessayer.");
    }
} else {
    // Redirection si la méthode n'est pas POST
    header("Location: ../views/devisView.php");
    exit();
}
