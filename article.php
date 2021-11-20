<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billet</title>
</head>

<body>
    <?php
        include 'connexion.php';
        $article = $_GET["id"];
        $requete = "SELECT * FROM billet WHERE id_billet = $article";
        $stmt = $db -> query($requete);
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);

        echo "<section class='article'>\n
        <h1>{$result["titre"]}</h1>\n
        {$result["contenu"]}\n
        <p>Publié le {$result["date"]} </p>\n
        </section>";

    ?>
    <section class="commentaires"></section>
</body>

</html>