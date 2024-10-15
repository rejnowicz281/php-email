<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'utils.php';

function sendEmail($message, $email, $phone, $first_name, $last_name, $website_type) {
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.sendgrid.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'apikey';
        $mail->Password = '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';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('alanrejnowicz281@gmail.com', 'Alan');
        $mail->addAddress($email);

        $mail->isHTML(true);

        $formattedMail = formatMail($message,  $phone, $first_name, $last_name, $website_type);

        $mail->Subject = $formattedMail['subject'];
        $mail->Body = $formattedMail['htmlBody'];
        $mail->AltBody = $formattedMail['altBody'];

        $mail->send();
        
        return "Mail has been sent successfully!";
    } catch (Exception $e) {
        return "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}