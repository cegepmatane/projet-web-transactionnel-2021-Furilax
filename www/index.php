<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
$listeProduits = LogoDAO::listerProduit();
//print_r($listeProduits);
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>PickYourLogo - Accueil</title>
	<link rel="stylesheet" href="/www/style/index.css">
</head>

<?php include "header.php"?>

	<section id="contenu">

		<div id="description">
			<h1>Bienvenue sur Pick Your Logo</h1>
			<hr>

			<div class="colonne">
				<h2>Sélectionnez...</h2>
				<p>Pick Your Logo vous propose un large choix de modèles de logos pour tout les goûts !</p>
			</div>
			<div class="colonne">
				<h2>Personnalisez...</h2>
				<p>Après avoir choisi votre logo qui correspond à vos attentes, vous pouvez le personnaliser et l'habiller à votre goût !</p>
			</div>
			<div class="colonne">
				<h2>Achetez !</h2>
				<p>Maintenant que votre logo est prêt à arborer les plus belles devantures de votre magasin et de votre site internet,
					vous n'avez plus qu'à procéder à l'achat et soutenir nos graphistes !
				</p>
			</div>

		</div>


		<section id="conteneurListe">
			<h1 class="font-effect-neon">Les nouveautés de la semaine !</h1>

<?php
        	foreach($listeProduits as $produit){       
?>

			<div class="produit">
				<a href="produit.php"><img class="imageProduit" src="illustration/<?=$produit["image"];?>" alt="" ></a>
				<h2><?=$produit["nom"]; ?></h2>
				<p class = "descriptionProduit"><?=$produit["description"];?></p>
			</div>

<?php
    		}
?>

		</section>
	
	</section>

</body>

<?php include "footer.php"?>