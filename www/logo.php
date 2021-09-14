<?php

require CHEMIN_ACCESSEUR . "LogoDAO.php";

//$id = $_GET["id"];
$id = filter_var($_GET['logo'],FILTER_VALIDATE_INT); 
//echo "id:" . $id;
$logo = LogoDAO::lireLogoParId($id);

//print_r($produit);
?>


<link rel="stylesheet" href="logo.css">
<?php include "header.php"?>
<section id="conteneurGlobale">
                    <div id="conteneurLogo">
                    <img class="imageLogo" src="illustration/<?=$logo["image"];?>" alt="Synergy STRATA MANAGEMENT">
                    </div>
                    <div id="conteneurInfos">
                        <h1><?=$logo["nom"];?></h1>
                        <p class="infosLogo"><?=formater($logo->description)?></p>
                        <p class="infosLogo">Auteur : <?=formater($logo->auteur)?></p>
                        <p class="infosLogo">Prix : <?=formater($logo->prix)?></p>
                        <p class="infosLogo">Quantité : Ceci est un produit unique</p>
                        <Button id="btnPanier">Ajouter au panier</Button>
                    </div>
            </section>
</body>


<?php include "footer.php"?>