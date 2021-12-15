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
    <?php
        include 'db_link.php';
        include 'bouton_co_deco.php';

        echo "<h1>Le nom du blog</h1>\n
        <div>\n";

        if (isset($_SESSION["id"])){
            echo "<div class='admin-rights'>\n
            <p>Bienvenue {$_SESSION["login"]}</p>";
        }

        if(isset($_SESSION["id"]) && $_SESSION["id"] == 1 && $_SESSION["login"] == 'admin'){
            echo "<div class='button-post-billet'><a href='post_billet.php' class='post_article'>Poster un nouvel article</a></div>\n
            </div>";
        }
        
        // Les articles et petit aperçu du contenu
        $requete = "SELECT * FROM billet";
        $stmt = $db -> query($requete);
        $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $result){
            echo "<div>\n
            <a class='billet' href='article.php?id_article=". $result["id_billet"]."'><span class='billet-titre'>{$result["titre"]}</span><br>\n
            <span>". substr(strip_tags($result["contenu"]), 0, 80)."...</span></a>
            </div>";
        }
    ?>
    </div>
</body>
</html>