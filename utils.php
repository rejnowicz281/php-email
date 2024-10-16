<?php

function formatMail($message, $phone, $first_name, $last_name, $website_type) {
    $lineBreakMessage = nl2br($message);

    $subject = "Contact Message Received From: {$first_name} {$last_name}";
    $htmlBody = "<h1>Contact Message Received</h1>";
    $htmlBody .= "<p><strong>Name:</strong> {$first_name} {$last_name}</p>";
    $htmlBody .= "<p><strong>Phone Number:</strong> {$phone}</p>";
    $htmlBody .= "<p><strong>Requested Website Type:</strong> {$website_type}</p>";
    $htmlBody .= "<h2>User Message</h2>";
    $htmlBody .= "<p>{$lineBreakMessage}</p>";

    $altBody = "Contact Message Received\n";
    $altBody .= "Name: {$first_name} {$last_name}\n";
    $altBody .= "Phone Number: {$phone}\n";
    $altBody .= "Requested Website Type: {$website_type}\n";
    $altBody .= "User Message\n";
    $altBody .= "{$message}";

    return [
        'subject' => $subject,
        'htmlBody' => $htmlBody,
        'altBody' => $altBody
    ];
}

function validateText($text) {
    if(!isset($text)) {
        return '';
    }

    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function validateEmail($email) {
    if(!isset($email)) {
        return '';
    }
    
    return filter_var(validateText($email), FILTER_VALIDATE_EMAIL);
}