<?php
require "send.php";

if(isset($_POST['body']) && isset($_POST['to']) && isset($_POST['subject'])) {
    $body = $_POST['body'];
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    
    sendEmail($to, $subject, $body);
}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>

<body>
    <div>
        <form method="POST">
            <input type="email" name="to" placeholder="Odbiorca...">
            <input type="text" name="subject" placeholder="Temat...">
            <textarea name="body" placeholder="Treść..." cols="30" rows="10" spellcheck="false"></textarea>
            <input type="submit" value="Wyślij">
        </form>
        <?php if(isset($body)) echo "napisales: {$body}" ?>
    </div>
</body>

</html>