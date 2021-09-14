<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ProduitDAO.php";
$listeProduits = ProduitDAO::listerProduit();
//print_r($listeProduits);
?>

<?php include "header.php"?>

<section id="conteneurListe">

<?php
        	foreach($listeProduits as $produit){       
?>
			<div class="produit">
				<a href="produit.html"><img class="imageProduit" src="illustration/<?=$produit["image"];?>" alt="" ></a>
				<h2><?=$produit["nom"]; ?></h2>
				<p class = "descriptionProduit"><?=$produit["description"];?></p>
			</div>
	</section>
<?php
    }
?>

</body>

<?php include "footer.php"?>