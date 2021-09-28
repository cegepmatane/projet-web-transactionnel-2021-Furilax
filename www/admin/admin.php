<?php
include "../accesseur/LogoDAO.php";
$listeLogos = LogoDAO::listerLogos();
?>

<!doctype html>
<html lang="fr">
<link rel="stylesheet" href="style/produits.css">
<link rel="stylesheet" href="../footer/footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../../../www/index.css">
<link rel="stylesheet" href="style/admin.css">
<link rel="stylesheet" href="style/logos.css">

<head>
	<meta charset="utf-8">
	<title>PickYourLogo - Accueil</title>
</head>

<body>

	<header>
		<div class="parallax"></div>


		<ul id="nav">
			<li><a class="active" href="#accueil">Accueil</a></li>
			<li><a href="#mission">Notre Mission</a></li>
			<li><a href="#produits">Nos Produits</a></li>
			<li><a href="#connexion">Connexion</a></li>
		</ul>

		<script src="script/menu-sticky.js"></script>

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
			<p class = "descriptionLogo"><?=formater($logo->description)?></p>
			<a href="modifier.php?id=<?=$switch['id']?>"><button type="button" class="btn modifier">Modifier</button></a>
			<button type="button" class="btn supprimer">Supprimer</button>
		</div>
	</section>
<?php
    }
?>

	<!--<div class="produit">
			<img class="imageProduit" src="pomme_de_terre.jpg" alt="Synergy STRATA MANAGEMENT">
			<h2>Logo 1</h2>
			<a href="modifier.php"><button type="button" class="btn modifier">Modifier</button></a>
			<button type="button" class="btn supprimer">Supprimer</button>
		</div>
		<div class="produit">
			<img class="imageProduit" src="pomme_de_terre.jpg" alt="Logos Vintage">
			<h2>Logo 2</h2>
			<a href="modifier.php"><button type="button" class="btn modifier">Modifier</button></a>
			<button type="button" class="btn supprimer">Supprimer</button>
		</div>
		<div class="produit">
			<img class="imageProduit" src="pomme_de_terre.jpg" alt="Logos Vintage">
			<h2>Logo 3</h2>
			<a href="modifier.php"><button type="button" class="btn modifier">Modifier</button></a>
			<button type="button" class="btn supprimer">Supprimer</button>
		</div>
		<div class="produit">
			<img class="imageProduit" src="pomme_de_terre.jpg" alt="Logos Vintage">
			<h2>Logo 4</h2>
			<a href="modifier.php"><button type="button" class="btn modifier">Modifier</button></a>
			<button type="button" class="btn supprimer">Supprimer</button>
		</div>
		<div class="produit">
			<img class="imageProduit" src="pomme_de_terre.jpg" alt="Logos Vintage">
			<h2>Logo 5</h2>
			<a href="modifier.php"><button type="button" class="btn modifier">Modifier</button></a>
			<button type="button" class="btn supprimer">Supprimer</button>
		</div>
		<div class="produit">
			<img class="imageProduit" src="pomme_de_terre.jpg" alt="Logos Vintage">
			<h2>Logo 6</h2>
			<a href="modifier.php"><button type="button" class="btn modifier">Modifier</button></a>
			<button type="button" class="btn supprimer">Supprimer</button>
		</div>-->
	</section>
</body>
<?php include "footer.php"; ?>
</html>