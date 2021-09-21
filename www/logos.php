<?php
include "accesseur/LogoDAO.php";
$listeLogos = LogoDAO::listerLogos();
//print_r($listeProduits);
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style/logos.css">
</head>

<?php include "header.php"?>

<section id="conteneurListe">

<h1>Nos Produits</h1>

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
	</section>
<?php
    }
?>

</body>

<?php include "footer.php"?>