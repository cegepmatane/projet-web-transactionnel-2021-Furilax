<?php
require_once "../chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
$listeLogos = LogoDAO::listerLogos();
?>

<!doctype html>
<html lang="fr">
<link rel="stylesheet" href="style/footer.css">
<link rel="stylesheet" href="style/admin.css">
<link rel="stylesheet" href="style/logos.css?=21">

<head>
	<meta charset="utf-8">
	<title>PickYourLogo - Accueil</title>
</head>

<?php include "../header.php"?>

	<h1>Produits</h1>
	<div class="centrer">
		<a href="ajouter.php"><button type="button" class="btn ajouter">Ajouter</button></a>
	</div>
	<nav></nav>

	<section id="conteneurListe">

		<?php
        foreach($listeLogos as $logo){       
	?>
		<div class="logo">
			<a href="logo.php?logo=<?=$logo->id?>">
				<img class="imageLogo" src="illustration/<?=formater($logo->image)?>" alt="">
			</a>
			<h2><?=formater($logo->nom)?></h2>
			<p class="descriptionLogo"><?=formater($logo->description)?></p>
			<a href="modifier.php?id=<?=($logo->id)?>"><button type="button" class="btn modifier">Modifier</button></a>
			<a href="traitement-supprimer.php?id=<?=($logo->id)?>"><button type="button"
					class="btn supprimer">Supprimer</button></a>
		</div>
	</section>
	<?php
    }
?>
</body>
<?php include "footer.php"?>

</html>