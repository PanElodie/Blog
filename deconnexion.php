<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Vous êtes déconnecté !</title>
</head>

<body>
    <main>
        <?= "<h1>A bientôt {$_SESSION["login"]}</h1>"; ?>
        <p>Vous allez être redirigé dans quelques secondes.</p>
        <p>Si cela n'est pas fait, cliquez <a href="index.php">ici</a> !</p>
        <?php
            $_SESSION = array();
            session_destroy();
        ?>
    </main>

    <script>
        setTimeout(function () {
            window.location.href = "index.php";
        }, 1500);
    </script>

</body>

</html>