<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php
           include 'db_link.php';
            if (isset($_GET["error"])){
                if (($_GET["error"] == 'login')){
                    echo("<script>alert(\"Votre login n\'est pas correct\")</script>");
                } else {
                    echo("<script>alert(\"Votre mot de passe n\'est pas correct\")</script>");
                }
            }
        ?>
    <form action="traite_connexion.php" method="GET">
        <input type="text" name="login" placeholder="Mon login" autocomplete="username">
        <input type="password" name="mdp" placeholder="Mon mot de passe" autocomplete="current-password">
        <input type="submit" value="Se connecter">
    </form>

    <h2>Vous n'avez pas encore de compte ?</h2>
    <a href="inscription.php">Je m'inscris</a>

    <a href="accueil.php">Visiter le blog sans m'inscrire</a>
</body>
</html>