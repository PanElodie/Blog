<?php
session_start();
include 'connexion.php';

$req1 = "SELECT * FROM utilisateur WHERE login = ?";
$verif -> bindValue(1, $_GET["login"], PDO::PARAM_STR);
$verif -> execute();

$result = $verif -> fetch(PDO::FETCH_ASSOC);

if (isset($_GET["login"])) {
    if ($result) {
        // A vérifier
        header ('Location: inscription.php?error=login');
    }
}

$req2= "INSERT INTO utilisateur VALUES (NULL,:login,:mdp)";

$stmt= $db->prepare($requete);
$stmt->bindParam(':login',$_GET["login"] , PDO::PARAM_STR); 

$hash= password_hash($_GET["mdp"],PASSWORD_DEFAULT);
$stmt->bindParam(':mdp',$hash , PDO::PARAM_STR); 
$stmt->execute();
echo "L'inscription s'est bien déroulée<br>";
header('Location:login.php');
?>