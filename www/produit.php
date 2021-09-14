<?php

require CHEMIN_ACCESSEUR . "LogoDAO.php";

//$id = $_GET["id"];
$id = filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);
//echo "id:" . $id;
$logo = LogoDAO::lireLogoParId($id);

//print_r($produit);
?>



<?php include "header.php"?>
<section id="conteneurGlobale">
                    <div id="conteneurProduit">
                    <img class="imageProduit" src="illustration/<?=$logo["image"];?>" alt="Synergy STRATA MANAGEMENT">
                    </div>
                    <div id="conteneurInfos">
                        <h1><?=$logo["nom"];?></h1>
                        <p class="infosProduit"><?=$logo["description"];?></p>
                        <p class="infosProduit">Auteur : <?=$logo["auteur"];?></p>
                        <p class="infosProduit">Prix : <?=$logo["prix"];?></p>
                        <p class="infosProduit">Quantité : Ceci est un produit unique</p>
                        <Button id="btnPanier">Ajouter au panier</Button>
                    </div>
            </section>
</body>


<?php include "footer.php"?>