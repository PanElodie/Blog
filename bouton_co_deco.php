<?php 
    if (isset($_SESSION["id"])){
        echo "<a class='deconnexion' href='deconnexion.php'>Se déconnecter</a>" ;
    } else {
        echo "<a class='connexion' href='connexion.php'>Se connecter</a>" ;
    }
?>