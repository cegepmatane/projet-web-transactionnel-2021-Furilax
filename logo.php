<?php

//$id = $_GET["id"];
$id = filter_var($_GET['logo'],FILTER_VALIDATE_INT); 

require_once "chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
//echo "id:" . $id;
$logo = LogoDAO::detaillerLogo($id);

//print_r($produit);
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="style/logo.css?=20">
</head>

<?php include "header.php"?>
<section id="conteneurGlobale">
    <div id="conteneurLogo">
        <img id="imageLogo" src="illustration/<?=formater($logo->image)?>" alt="Synergy STRATA MANAGEMENT">
    </div>
    <div id="conteneurInfos">
        <h1><?=formater($logo->nom)?></h1>
        <div><p class="infosLogo"><?=formater($logo->description)?></p></div>
        <p class="infosLogo">Auteur : <?=formater($logo->auteur)?></p>
        <p class="infosLogo">Prix : <?=formater($logo->prix)?></p>
        <p class="infosLogo">Publication : <?=formater($logo->publication)?></p>
        <form method="post" action="panier.php?action=add&id=<?=formater($logo->id)?>">
            <input type="submit" id="btnPanier" value="Ajouter au panier">
        </form>
    </div>
</section>
</body>


<?php include "footer.php"?>