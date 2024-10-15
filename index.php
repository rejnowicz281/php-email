<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="index.php" method="POST">
            <textarea name="tresc" placeholder="Treść..." cols="30" rows="10" spellcheck="false"></textarea>
            <input type="submit" value="Wyślij">
        </form>
        <?php if(isset($_POST['tresc'])) echo "napisales: {$_POST['tresc']}" ?>
    </div>
</body>

</html>