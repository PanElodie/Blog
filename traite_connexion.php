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
        include 'link.php';
        $requete = "SELECT * FROM blog_utilisateur WHERE `login` = ?";

        $stmt = $db -> prepare($requete);
        $stmt -> bindValue(1, $_POST["login"], PDO::PARAM_STR);
        $stmt -> execute();

        $resultat = $stmt -> fetch(PDO::FETCH_ASSOC);
        
        if (isset($_POST["login"])) {
            if($resultat == false){
                header('Location:index.php?error=login');

            } else {
                if (password_verify($_POST["mdp"], $resultat["mdp"])) {

                    $_SESSION["id"] = $resultat["id_utilisateur"];
                    $_SESSION["login"] = $resultat["login"];
                    header('Location:accueil.php');
                } else {

                    header('Location:index.php?error=mdp');
                }
            }
        }
    ?>
</body>
</html>