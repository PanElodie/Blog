<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Vous êtes connecté</title>
</head>

<body>

    <?php
        include 'db_link.php';

        $req1 = "SELECT * FROM utilisateur WHERE login = ?";
        $verif = $db -> prepare($req1);
        $verif -> bindValue(1, $_GET["login"], PDO::PARAM_STR);
        $verif -> execute();

        $result = $verif -> fetch(PDO::FETCH_ASSOC);

        if (isset($_GET["login"])) {

            if ($_GET["login"] == "" || $_GET["mdp"] == "" || $_GET["mdp_check"] == ""){
                header ('Location: inscription.php?error=incomplete');
            } 
            else {
                if ($result) {
                    header ('Location: inscription.php?error=login');
                }
                else if ($_GET["mdp"] != $_GET["mdp_check"]){
                    header ('Location: inscription.php?error=mdp');
                }
                else {
                    $req2= "INSERT INTO utilisateur VALUES (NULL,:login,:mdp)";
                
                    $stmt= $db->prepare($req2);
                    $stmt->bindParam(':login',$_GET["login"] , PDO::PARAM_STR); 
                    
                    $hash= password_hash($_GET["mdp"],PASSWORD_DEFAULT);
                    $stmt->bindParam(':mdp',$hash , PDO::PARAM_STR); 
                    $stmt->execute();

                    // INSCRIPTION EN TANT QUE CONNEXION
                    $req3 = "SELECT * FROM utilisateur ORDER BY id_utilisateur DESC LIMIT 1";
                    $stmt_login = $db -> query($req3);
                    $resultat = $stmt_login -> fetch(PDO::FETCH_ASSOC);
                    $_SESSION["login"] = $resultat["login"];
                    $_SESSION["id"] = $resultat["id_utilisateur"];

                    echo "<h1>Bienvenue {$_SESSION["login"]}</h1>";
                }
            }
        } 

    ?>

    <script>
        setTimeout(function () {
            window.location.href = "accueil.php";
        }, 1500);
    </script>
</body>

</html>