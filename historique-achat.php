<?php
require_once "chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>PickYourLogo - historique d'achat</title>
	<link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/historique-achat.css">
</head>
<?php include "header.php"?>
<body>

    <div class="block-liste-achat">
        <section class="liste-achat">

            <div class="achat">
                <div class="image-produit">
                    <img src="unknown.png" alt="peroquet" class="image">
                </div>
                <div class="information-achat">
                    <ul>
                        <br>
                        <li class="liste"><label for="date">date d'achat : </label></li>
                        <li class="liste"><label for="nom">nom du logo : </label></li>
                        <li class="liste"><label for="prix">prix : </label></li>
                    </ul>
                </div>
            </div>

            <div class="achat">
                <div class="image-produit">
                    <img src="imagetype.jpg" alt="peroquet" class="image">
                </div>
                <div class="information-achat">
                    <ul>
                        <br>
                        <li class="liste"><label for="date">date d'achat : </label></li>
                        <li class="liste"><label for="nom">nom du logo : </label></li>
                        <li class="liste"><label for="prix">prix : </label></li>
                    </ul>
                </div>
            </div>

            <div class="achat">
                <div class="image-produit">
                    <img src="unknown.png" alt="peroquet" class="image">
                </div>
                <div class="information-achat">
                    <ul>
                        <br>
                        <li class="liste"><label for="date">date d'achat : </label></li>
                        <li class="liste"><label for="nom">nom du logo : </label></li>
                        <li class="liste"><label for="prix">prix : </label></li>
                    </ul>
                </div>
            </div>

    </section>
    </div>
</body>
<?php include "footer.php"?>