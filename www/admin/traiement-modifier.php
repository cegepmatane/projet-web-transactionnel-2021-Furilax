<?php 

require_once "configuration.php";

require_once "../accesseur/LogoDAO.php";

$nom = $_POST['nom'];
$auteur = $_POST['auteur'];
$description = $_POST['description'];
$prix = $_POST["prix"];


$filtresLogo = [];

$filtresLogo['nom'] = FILTER_VALIDATE_INT;
$filtresLogo['auteur'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['description'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['prix'] = FILTER_SANITIZE_ENCODED;

$logo = filter_input_array(INPUT_POST, $filtresLogo);
$reussiteAjout = LogoDAO::modifierLogo($logo);

if ($reussiteAjout){
    ?>
    <a href='admin.php'>ca marche</a>
    <?php
}
else{
    echo "ça marche pas".$reussiteAjout;
}

?>