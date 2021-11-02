<?php

$id = filter_var($_GET['membres'],FILTER_VALIDATE_INT); 

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
        <div class="form">
            <label for="nom" value>nom d'utilisateur</label><br>
            <input type="text" id="nom" name="nom" value="<?=formater($membre->nom)?>">
            <input class="boutton-envoyer" type="submit" value="Submit">
        </div>
        <div class="form">
            <label for="mail">e-mail</label><br>
            <input type="email" id="mail" name="mail">
            <input class="boutton-envoyer" type="submit" value="Submit">
        </div>
        <div class="form">
            <label for="motDePass">mot de pass</label><br>
            <input type="password" id="motDePass" name="motDePass">
            <input class="boutton-envoyer" type="submit" value="Submit">
        </div>
            <div class="form">
            <a href="deconnexion.php">Deconnexion</a>
            </div> 
    </div>
    </form>

</body>

<?php include "footer.php"?>