<?php session_start();?>

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
        if (isset($_POST["commentaire"])){
            if ($_POST["commentaire"] != ""){
                $req = "INSERT INTO commentaire VALUES (NULL, :texte, CURRENT_TIMESTAMP, {$_SESSION["id"]}, {$_POST["id_article"]})";
                $stmt= $db->prepare($req);
                $stmt->bindParam(':texte',$_POST["commentaire"] , PDO::PARAM_STR); 
                $stmt->execute();
                echo "Merci pour votre commentaire !";
            } else {
                echo "Vous n'avez rien écrit...";
            }
        }
        
    ?>

    <script>
        setTimeout(function () {
            window.location.href = "article.php?id_article=<?= $_POST["id_article"]; ?>";
        }, 1500);
    </script>
</body>

</html>