<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Le nom du blog</h1>
    <div>
        <p>Bienvenue</p>
        <?php 
            include 'connexion.php';
            $requete = "SELECT * FROM billet";
            $stmt = $db -> query($requete);
            $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $result){
                echo "<div>\n
                <a href='article.php?id=". $result["id_billet"]."'>{$result["titre"]}</a>
                </div>";
            }
        ?>
    </div>
</body>
</html>