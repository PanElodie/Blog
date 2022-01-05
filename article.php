<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Billet</title>
    <style>
        h1 {
            text-align: center;
        }

        p {
            width: 55%;
            min-width: 550px;
            margin: 20px auto;
        }

        button, input {
            margin: auto;
            display: block;
        }

        form {
            text-align : center;
        }

        .retour {
            display: inline;
        }
    </style>
</head>

<body>
    <?php
        include 'db_link.php';
        include 'bouton_co_deco.php';
        
        if (isset($_GET["id_article"])){

            // L'article
            $reqArticle = "SELECT * FROM blog_billet WHERE id_billet = :article";
            $stmt = $db -> prepare($reqArticle);
            $stmt -> bindValue(':article', $_GET["id_article"], PDO::PARAM_INT);
            $stmt -> execute();
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);

            echo "<section class='article'>\n
            <h1>{$result["titre"]}</h1>\n
            <p>{$result["contenu"]}</p>\n
            <p><em>Publié le {$result["date"]}</em></p>\n
            </section>\n
            <button class='post_article'> Voir les commentaires </button>\n
            <section class='commentaires'>\n";

            // Les commentaires
            $reqCom = "SELECT * FROM blog_commentaire WHERE ext_billet = $article";
            $stmt = $db -> query($reqCom);
            $commentaires = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            
            foreach($commentaires as $commentaire){
                $reqLog = "SELECT * FROM blog_utilisateur WHERE id_utilisateur = {$commentaire["ext_utilisateur"]}";
                $stmt = $db -> query($reqLog);
                $login = $stmt -> fetch(PDO::FETCH_ASSOC);
                echo  "<div class='commentaire'>\n
                <span class='log'>{$login["login"]}</span>\n
                <span class='date'>{$commentaire["date"]}</span>\n
                <p class='text'>{$commentaire["texte"]}</p>\n
                </div>";

            }

            // Si l'utilisateur est connecté, il peut poster un commentaire
            if (isset($_SESSION["id"])){
                echo ("<form action='traite_commentaire.php' method='POST'>\n
                <h2>Poster mon commentaire</h2>\n
                <textarea name='commentaire' rows='10' cols='50' placeholder='Ecrire le commentaire'></textarea><br><br>\n
                <input type='submit' value='Poster mon commentaire' style='display:block'class='post_article'><br><br>\n
                <input type='hidden' name='id_article' value='". $article ."'>\n
                </form>");
            } else {
                echo "<p>Pour poster un commentaire, <a href='index.php'>se connecter</a></p>";
            }
        };
       
        ?>
       
    </section>


    <script>
        // Cacher ou afficher les commentaires
        document.querySelector("button").addEventListener("click", () => {
            var com = document.querySelector('.commentaires');
            if (com.style.display == "block") {
                com.style.display = "none";
            } else {
                com.style.display = "block";
            }
        });

        document.querySelector('button').addEventListener('click', e => {
            let state = document.querySelector('.commentaires').style.display;
            if (state == 'block'){
                e.target.innerHTML = 'Cacher les commentaires';
            } else {
                e.target.innerHTML = 'Voir les commentaires';
            }
        })
    </script>
</body>

</html>