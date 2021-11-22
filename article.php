<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billet</title>
    <style>
        h1{
            text-align: center;
        }
        p{
            width:50%;
            margin-left:25%;
        }
        h2, h3{
            margin-left:65%;
        }
        button{
            margin-left:25%;
        }
        .com{
            display: none;
            margin-left:25%;
        }
    </style>
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
    <button> Commentaires </button>
    <section class="commentaires">
        <div class="com" id="1">Whaa le PHP c'est génial, j'aimerais bien voir une démonstration ! </div>
        <div class="com" id="1">Quels sont les désavantages du php ?</div>
        <div class="com" id="2">C'est quoi une base de données ?</div>
        <div class="com" id="3"> Le therme "d'autres langages" est évoqué mais qui sont-ils ?</div>
        <div class="com" id="3">Très bon article, merci pour ses informations.</div>
    </section>
    <script>
  var c = document.querySelector("button");
  c.addEventListener("click", a => {
  document.querySelectorAll(".com").forEach(e=>{
  e.style.display="block";
  })
  });
</script>
</body>

</html>