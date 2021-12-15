<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet"
        type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
    </script>
    <title>Billet</title>
    <style>
        .fr-box.fr-basic {
            width: 60%;
            margin: auto;
        }

        form {
            text-align: center;
        }

        input {
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <a href="accueil.php">Retour</a>
    <?php 
        include 'db_link.php';
        include 'bouton_co_deco.php';
        if (isset($_GET["error"])){
            if ($_GET["error"] == "incomplete"){
                echo "Vous n'avez pas rempli tous les champs.";
            }
        }
    ?>
    <form action="traite_billet.php" method="GET">
        <h1>Je remplis et je post !</h1>
        <input type="text" name="titre" placeholder="Titre de l'article"><br>

        <!-- La fonctionnalité qui permet de poster des médias (autres que du texte) n'est pas utilisable -->
        <div><textarea id="text" name="contenu" rows="10" cols="50" placeholder="Contenu de l'article"></textarea></div>
        <br>
        <input type="submit" value="Poster mon article" style="display:block" class="post_article">
    </form>

</body>

<script>
    var editor = new FroalaEditor('#text')
</script>

</html>