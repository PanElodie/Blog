<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Inscription</title>
</head>

<body>
    <?php
        include 'link.php';

        if (isset($_GET["error"])){
            if ($_GET["error"] == 'login'){
                echo("<script>alert(\"Ce login existe déjà.\")</script>");
            } else if ($_GET["error"] == 'incomplete'){
                echo("<script>alert(\"Vous n'avez pas rempli tous les champs.\")</script>");
            }
            else {
                echo("<script>alert(\"Les mots de passe que vous avez insérés sont différents.\")</script>");
            }
        }
    ?>
    <main>
        <h1>Inscription</h1>

        <form action="traite_inscription.php" method="POST">
            <label for="login">Login</label>
            <input type="text" name="login" autocomplete="username"><br>

            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" autocomplete="new-password"><br>

            <label for="mdp_check">Mot de passe</label>
            <input type="password" name="mdp_check" autocomplete="new-password"><br>

            <input type="submit" value="S'inscrire">
        </form>

        <a href="index.php">J'ai déjà un compte</a>
    </main>
</body>

</html>