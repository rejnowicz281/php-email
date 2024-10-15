<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendEmail($to, $subject, $htmlBody, $altBody = "AltBody") {
    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.sendgrid.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'apikey';
        $mail->Password = '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';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('alanrejnowicz281@gmail.com', 'Alan');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $htmlBody;
        $mail->AltBody = $altBody;

        $mail->send();
        return "Mail has been sent successfully!";
    } catch (Exception $e) {
        return "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}