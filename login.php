<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
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
    <form action="traite_login.php" method="GET">
        <input type="text" name="login" placeholder="Mon login">
        <input type="password" name="mdp" placeholder="Mon mot de passe">
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>