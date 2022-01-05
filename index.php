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
    <main>
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

            // Si l'utilisateur est déjà connecté, il n'a pas à accéder à la page de connexion
            // et est directement redirigé vers la page d'accueil
            if (isset($_SESSION["id"])){
                header("Location: accueil.php");
            }
        ?>

        <form action="traite_connexion.php" method="POST">
            <input type="text" name="login" placeholder="Mon login" autocomplete="username">
            <input type="password" name="mdp" placeholder="Mon mot de passe" autocomplete="current-password">
            <input type="submit" value="Se connecter" class="post_article">
        </form>

        <h2>Vous n'avez pas encore de compte ?</h2>
        <a href="inscription.php">Je m'inscris</a>

        <a href="accueil.php" class="no-inscription">Visiter le blog sans m'inscrire</a>
    </main>
</body>

</html>