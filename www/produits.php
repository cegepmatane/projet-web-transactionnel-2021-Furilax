<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
$listeLogos = LogoDAO::listerLogos();
//print_r($listeProduits);
?>

<?php include "header.php"?>

<section id="conteneurListe">

<?php
        	foreach($listeLogos as $logo){       
?>
			<div class="produit">
				<a href="produit.html"><img class="imageProduit" src="illustration/<?=$logo["image"];?>" alt="" ></a>
				<h2><?=$logo["nom"]; ?></h2>
				<p class = "descriptionProduit"><?=$logo["description"];?></p>
			</div>
	</section>
<?php
    }
?>

</body>

<?php include "footer.php"?>