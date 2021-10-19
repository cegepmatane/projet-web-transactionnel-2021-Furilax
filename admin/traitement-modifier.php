<?php 

require_once "../chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
require_once "configuration.php";

$filtresLogo = [];

$filtresLogo['nom'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['auteur'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['description'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['prix'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['id'] = FILTER_SANITIZE_ENCODED;

$logo = filter_input_array(INPUT_POST, $filtresLogo);
//print_r($logo);
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