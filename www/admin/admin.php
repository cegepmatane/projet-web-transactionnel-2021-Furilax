<?php
include "accesseur/LogoDAO.php";
$listeLogos = LogoDAO::listerLogos();
?>

<!doctype html>
<html lang="fr">
<link rel="stylesheet" href="produits.css">
<link rel="stylesheet" href="../footer/footer.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="logos.css">

<head>
	<meta charset="utf-8">
	<title>PickYourLogo - Accueil</title>
</head>

<body>
	<header>
		<?php include "../header.php"?>;

	</header>
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
<?php include "footer.php"; ?>

</html>