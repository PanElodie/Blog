<header>
    <a href="accueil.php" class="retour">Retour</a>
<?php 
    if (isset($_SESSION["id"])){
        echo "<a class='deconnexion' href='deconnexion.php'>Se déconnecter</a>" ;
    } else {
        echo "<a class='connexion' href='index.php'>Se connecter</a>" ;
    }
?>
</header>