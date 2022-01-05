<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <!-- L'API utilisé pour l'éditeur de texte -->
    <script src="https://cdn.tiny.cloud/1/m9w99ohm04gcyht4x4p74yctlx7oqrpmxnccas8dnfvz1vvw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Billet</title>
    <style>
        form {
            text-align: center;
        }

        input {
            margin: 20px auto;
        }
        .retour {
            display: inline;
        }
    </style>
</head>

<body>
    <?php 
        include 'link.php';
        include 'bouton_co_deco.php';
        if (isset($_POST["error"])){
            if ($_POST["error"] == "incomplete"){
                echo "Vous n'avez pas rempli tous les champs.";
            }
        }
    ?>
    <form action="traite_billet.php" method="POST">
        <h1>Je remplis et je post !</h1>
        <input type="text" name="titre" placeholder="Titre de l'article"><br>

        <textarea id="text" name="contenu" rows="30" cols="30" placeholder="Contenu de l'article"></textarea>
        <br>
        <input type="submit" value="Poster mon article" style="display:block" class="post_article">
    </form>

</body>

<script>
    // Script pour inclure l'éditeur de texte dans le textarea
    tinymce.init({
      selector: '#text'
    });
</script>

</html>