<?php
require_once "chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
$listeLogos = LogoDAO::listerLogos();
//print_r($listeProduits);
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>PickYourLogo - Accueil</title>
	<link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/edition-profil.css">
</head>

<?php include "header.php"?>

<body>
	

    <form class="formulaire" action="">
        <div class="titre">
            <h1>nom de l'utilisateur</h1>
        </div>
        <div class="form">
            <label for="nom" value>nom d'utilisateur</label><br>
            <input type="text" id="nom" name="nom">
            <input class="boutton-envoyer" type="submit" value="Submit">
        </div>
        <div class="form">
            <label for="auteur">e-mail</label><br>
            <input type="email" id="auteur" name="auteur">
            <input class="boutton-envoyer" type="submit" value="Submit">
        </div>
        <div class="form">
            <label for="prix">mot de pass</label><br>
            <input type="password" id="prix" name="prix">
            <input class="boutton-envoyer" type="submit" value="Submit">
        </div>
            <div class="form">
            <a href="deconnexion.php">Deconnexion</a>
            </div> 
    </div>
    </form>

</body>

<?php include "footer.php"?>