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
            width: 50%;
            margin-left: 25%;
        }

        h2,
        h3 {
            margin-left: 65%;
        }

        button {
            margin-left: 25%;
        }

        form {
            margin-left: 30%;
        }

        .com {
            margin-left: 25%;
        }

        .commentaires {
            display: none;
        }
    </style>
</head>

<body>
    <a href="accueil.php">Retour</a>
    <?php
        include 'db_link.php';
        include 'bouton_co_deco.php';
        
        if (isset($_GET["id_article"])){
            $article = $_GET["id_article"];
            $reqArticle = "SELECT * FROM billet WHERE id_billet = $article";
            $stmt = $db -> query($reqArticle);
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            
            // COMMENT REMPLACER "ENTER" AVEC BR???
            echo "<section class='article'>\n
            <h1>{$result["titre"]}</h1>\n
            <p>{$result["contenu"]}</p>\n
            <p>Publié le {$result["date"]} </p>\n
            </section>";
    ?>

    <button> Commentaires </button>
    <section class="commentaires">
        <?php 
            $reqCom = "SELECT * FROM commentaire WHERE ext_billet = $article";
            $stmt = $db -> query($reqCom);
            $commentaires = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            
            foreach($commentaires as $commentaire){
                echo "<div class='com'>{$commentaire["texte"]}</div>";
                echo  "<div class='com'>{$commentaire["date"]}</div>";
                $reqLog = "SELECT * FROM utilisateur WHERE id_utilisateur = {$commentaire["ext_utilisateur"]}";
                $stmt = $db -> query($reqLog);
                $login = $stmt -> fetch(PDO::FETCH_ASSOC);
                echo  "<div class='com'>{$login["login"]}</div>";
            }

            if (isset($_SESSION["id"])){
                echo ("<form action='traite_commentaire.php' method='GET'>\n
                <h4>Poster mon commentaire</h4>\n
                <textarea name='commentaire' rows='10' cols='50' placeholder='Ecrire le commentaire'></textarea><br><br>\n
                <input type='submit' value='Poster mon commentaire' style='display:block'><br><br>\n
                <input type='hidden' name='id_article' value='". $article ."'>\n
                </form>");
            } else {
                echo "<p>Pour poster un commentaire, <a href='connexion.php'>se connecter</a></p>";
            }
        };
       
        ?>

    </section>
    <script>
        document.querySelector("button").addEventListener("click", () => {
            var com = document.querySelector('.commentaires');
            if (com.style.display == "block") {
                com.style.display = "none";
            } else {
                com.style.display = "block";
            }
        });
    </script>
</body>

</html>