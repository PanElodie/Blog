<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vous êtes connecté</title>
</head>
<body>
    <?php 
        include 'connexion.php';
        $requete = "SELECT * FROM utilisateur WHERE `login` = ?";

        $stmt = $db -> prepare($requete);
        $stmt -> bindValue(1, $_GET["login"], PDO::PARAM_STR);
        $stmt -> execute();

        $resultat = $stmt -> fetch(PDO::FETCH_ASSOC);
        
        if (isset($_GET["login"])) {
            if($resultat == false){

                header('Location:login.php?error=login');

            } else {

                if (password_verify($_GET["mdp"], $resultat["mdp"])) {

                    // echo "<p>Utilisateur {$resultat["id_utilisateur"]} :\n
                    // login : {$resultat["login"]}<br>\n
                    // mdp : {$resultat["mdp"]}<br>";

                    // $_SESSION["login"] = $resultat["id_utilisateur"].$resultat["nom"];
                    // echo $_SESSION["login"];
                    echo "Vous êtes bien connecté !";

                    } else {

                    header('Location:login.php?error=mdp');
                }
            }
        }
    ?>
</body>
</html>