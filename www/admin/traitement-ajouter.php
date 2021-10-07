<?php
//echo "salut"

require_once "../chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
require_once "configuration.php";

//$repertoireIllustration = $_SERVER['DOCUMENT_ROOT'] . "/image_produit";

$nom = $_POST['nom'];
$auteur = $_POST['auteur'];
$description = $_POST['description'];
$prix = $_POST["prix"];
//$illustration = $_FILES['illustration']['name'];

$filtresLogo = [];

$filtresLogo['nom'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['auteur'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['description'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['prix'] = FILTER_SANITIZE_ENCODED;

$logo = filter_input_array(INPUT_POST, $filtresLogo);

//echo $logo;
//$logo['illustration'] = $illustration;

$reussiteAjout = LogoDAO::ajouterLogo($logo);

if ($reussiteAjout){
    ?>
    <a href='admin.php'>ca marche</a>
    <?php
}
else{
    echo "ça marche pas".$reussiteAjout;
}

?>