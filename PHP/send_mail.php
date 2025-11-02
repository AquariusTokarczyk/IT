<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Załaduj biblioteki PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Konfiguracja Gmail SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Arektokarczyk1982@gmail.com';
    $mail->Password = 'hwzw vgen cquw zdxi'; // zostaw to, co już wkleiłeś
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Dane nadawcy i odbiorcy
    $mail->setFrom('Arektokarczyk1982@gmail.com', 'IT-Hjälp Web');
    $mail->addAddress('Arektokarczyk1982@gmail.com');
    $mail->addReplyTo($_POST['email'], $_POST['name']);

    // Treść wiadomości
    $mail->isHTML(true);
    $mail->Subject = 'Nytt meddelande från IT-Hjälp hemsidan';
    $mail->Body = "
        <h2>Kontaktförfrågan</h2>
        <p><strong>Namn:</strong> {$_POST['name']}</p>
        <p><strong>E-post:</strong> {$_POST['email']}</p>
        <p><strong>Meddelande:</strong><br>{$_POST['message']}</p>
    ";

    // Wyślij
    $mail->send();
    echo "<script>alert('Tack! Ditt meddelande har skickats.'); window.history.back();</script>";
} catch (Exception $e) {
    echo "<script>alert('Ett fel uppstod: {$mail->ErrorInfo}'); window.history.back();</script>";
}
