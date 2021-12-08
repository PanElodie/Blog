<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Accueil</title>
</head>
<body>
    <h1>Le nom du blog</h1>
    <div>
        <?php
            include 'db_link.php';
            include 'bouton_co_deco.php';
            if (isset($_SESSION["id"])){
                echo "<p>Bienvenue {$_SESSION["login"]}</p>";
            }
            $requete = "SELECT * FROM billet";
            $stmt = $db -> query($requete);
            $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $result){
                echo "<div>\n
                <a href='article.php?id_article=". $result["id_billet"]."'>{$result["titre"]}</a>
                </div>";
            }
        ?>
    </div>
        <?php
            if(isset($_SESSION["id"]) && $_SESSION["id"] == 1 && $_SESSION["login"] == 'admin'){
                echo '<div style="margin-top:20px;"><a href="post_billet.php">Poster un nouvel article</a></div>';
            }
        ?>
</body>
</html>