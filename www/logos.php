<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
$listeLogos = LogoDAO::listerLogos();
//print_r($listeProduits);
?>

<link rel="stylesheet" href="logos.css">
<?php include "header.php"?>

<section id="conteneurListe">

<?php
        	foreach($listeLogos as $logo){       
?>
			<div class="logo">
				<a href="logo.html"><img class="imageLogo" src="illustration/<?=$logo["image"];?>" alt="" ></a>
				<h2><?=$logo["nom"]; ?></h2>
				<p class = "descriptionLogo"><?=$logo["description"];?></p>
			</div>
	</section>
<?php
    }
?>

</body>

<?php include "footer.php"?>