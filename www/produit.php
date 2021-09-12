<?php

require CHEMIN_ACCESSEUR . "ProduitDAO.php";

//$id = $_GET["id"];
$id = filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);
//echo "id:" . $id;
$produit = ProduitDAO::lireProduitParId($id);

//print_r($produit);
?>



<body>

<?php include "header.php"?>
<section id="conteneurGlobale">
                    <div id="conteneurProduit">
                    <img class="imageProduit" src="illustration/<?=$produit["image"];?>" alt="Synergy STRATA MANAGEMENT">
                    </div>
                    <div id="conteneurInfos">
                        <h1><?=$produit["nom"];?></h1>
                        <p class="infosProduit"><?=$produit["description"];?></p>
                        <p class="infosProduit">Auteur : <?=$produit["auteur"];?></p>
                        <p class="infosProduit">Prix : <?=$produit["prix"];?></p>
                        <p class="infosProduit">Quantité : Ceci est un produit unique</p>
                        <Button id="btnPanier">Ajouter au panier</Button>
                    </div>
            </section>
</body>


<?php include "footer.php"?>