<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre article a été publié</title>
</head>

<body>
    <?php 
        include 'db_link.php';

        if ($_GET["titre"] == "" || $_GET["contenu"] == ""){
            header ('Location: post_billet.php?error=incomplete');
        } else {
            $req = "INSERT INTO billet VALUES (NULL, :contenu, CURRENT_TIMESTAMP, :titre)";
            $stmt= $db->prepare($req);
            $stmt->bindParam(':contenu',$_GET["contenu"] , PDO::PARAM_STR); 
            $stmt->bindParam(':titre',$_GET["titre"] , PDO::PARAM_STR); 
            $stmt->execute();
    
            echo "L'article est publié !";
        }
    ?>

    <script>
        setTimeout(function () {
            window.location.href = "accueil.php";
        }, 1500);
    </script>
</body>

</html>