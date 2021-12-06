<?php
require_once "chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
$listeLogos = LogoDAO::nouveautesLogos();
//print_r($listeProduits);
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>PickYourLogo - Accueil</title>
	<link rel="stylesheet" href="style/index.css?=26">
	<link rel="stylesheet" href="style/logos.css">
</head>

<?php include "header.php"?>

	<section id="contenu">

		<div id="description">
			<h1><?php echo _("Bienvenue sur Pick Your Logo")?></h1>
			<hr>

			<div class="colonne">
				<h2><?php echo _("Selectionnez...")?></h2>
				<p><?php echo _("Pick Your Logo vous propose un large choix de modeles de logos pour tout les gouts !")?></p>
			</div>
			<div class="colonne">
				<h2><?php echo _("Personnalisez...")?></h2>
				<p><?php echo _("Apres avoir choisi votre logo qui correspond a vos attentes, vous pouvez le personnaliser et l'habiller a votre gout !")?></p>
			</div>
			<div class="colonne">
				<h2><?php echo _("Achetez !")?></h2>
				<p><?php echo _("Maintenant que votre logo est pret a arborer les plus belles devantures de votre magasin et de votre site internet,
					vous n'avez plus qu'a proceder a l'achat et soutenir nos graphistes !")?>
				</p>
			</div>

		</div>


		<section id="conteneurListe">
			<h1 class="font-effect-neon"><?php echo _("Les nouveautes de la semaine !")?></h1>

<?php
        foreach($listeLogos as $logo){       
?>

			<div class="logo">
				<a href="logo.php?logo=<?=$logo->id?>">
					<img class="imageLogo" src="illustration/<?=formater($logo->image)?>" alt="">
				</a>
				<h2><?=formater($logo->nom)?></h2>
				<p class = "descriptionLogo"><?=formater($logo->description)?></p>
			</div>

<?php
    	}
?>

		</section>
	
	</section>

</body>

<?php include "footer.php"?>