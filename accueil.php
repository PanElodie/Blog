<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Accueil</title>
</head>

<body>
    <?php
        include 'link.php';
        include 'bouton_co_deco.php';
        echo "<main>";
        
        echo "<h1>Blog PHP, Elodie & Amélie</h1>\n
        <section>\n
        <h2>Articles les plus récents</h2>\n";

        if (isset($_SESSION["id"])){
            echo "<div class='admin-rights'>\n
            <p>Bienvenue {$_SESSION["login"]}</p>";

            if($_SESSION["id"] == 1 && $_SESSION["login"] == 'admin'){
                echo "<div class='button-post-billet'><a href='post_billet.php' class='post_article'>Poster un nouvel article</a></div>";
            }

            echo "</div>";
        }

        
        // Les 3 articles les plus récents et un petit aperçu de leur contenu
        $req1 = "SELECT * FROM blog_billet ORDER BY id_billet DESC LIMIT 3";
        $stmt = $db -> query($req1);
        $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $result){
            echo "<div>\n
            <a class='billet' href='article.php?id_article=". $result["id_billet"]."'>\n
            <span class='billet-titre'>{$result["titre"]}</span><span class='billet-date'>{$result["date"]}</span><br>\n
            <span>". substr(strip_tags($result["contenu"]), 0, 150)."...</span></a>
            </div>";
        }
    ?>
    </section>

    <section>
        <h2>Archives</h2>
        <?php
            $req2 = "SELECT * FROM blog_billet ORDER BY id_billet DESC LIMIT 1000000 OFFSET 3";
            $stmt = $db -> query($req2);
            $results2 = $stmt -> fetchAll(PDO::FETCH_ASSOC);

            foreach($results2 as $result){
                echo "<div>\n
                <a class='billet' href='article.php?id_article=". $result["id_billet"]."'>\n
                <span class='billet-titre'>{$result["titre"]}</span><span class='billet-date'>{$result["date"]}</span><br>\n
                <span>". substr(strip_tags($result["contenu"]), 0, 150)."...</span></a>
                </div>";
            }
            ?>

    </section>
    
    </main>
</body>

</html>