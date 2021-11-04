<?php

$id = filter_input(INPUT_GET, 'membre' , FILTER_VALIDATE_INT);

require_once "chemins.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

$membre = MembreDAO::detaillerMembre($id);

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
        <div class="form" action="confirm-edition.php">
            <input type="hidden" name="id" value="<?= $membre->id?>">
            <label for="nom" value>nom d'utilisateur</label><br>
            <input type="text" id="nom" name="nom" value="<?=$_SESSION["identifiant"]?>">
            <input class="boutton-envoyer" type="submit" value="Modifier">
        </div>
        <!--<div class="form">
            <label for="mail">e-mail : <?=$membre->courriel?></label><br>
            <input type="email" id="mail" name="mail" value="<?=$membre->courriel?>">
            <input class="boutton-envoyer" type="submit" value="Modifier">
        </div>-->
        <div class="form">
            <label for="motDePass">mot de pass</label><br>
            <input type="password" id="motDePass" name="motDePass">
            <input class="boutton-envoyer" type="submit" value="Modifier">
        </div>
            <div class="form">
            <a href="deconnexion.php">Deconnexion</a>
            </div> 
    </div>
    </form>

</body>

<?php include "footer.php"?>