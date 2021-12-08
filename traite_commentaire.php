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
        $req = "INSERT INTO commentaire VALUES (NULL, :texte, CURRENT_TIMESTAMP, {$_SESSION["id"]}, {$_GET["id_article"]})";
        $stmt= $db->prepare($req);
        $stmt->bindParam(':texte',$_GET["commentaire"] , PDO::PARAM_STR); 
        $stmt->execute();
        echo "Merci pour votre commentaire !";
    ?>

    <script>
        setTimeout(function () {
            window.location.href = "article.php?id_article=<?= $_GET["id_article"]; ?>";
        }, 1500);
    </script>
</body>

</html>