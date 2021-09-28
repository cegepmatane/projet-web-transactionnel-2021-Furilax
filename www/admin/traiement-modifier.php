<?php 

require_once "configuration.php";

require_once "../accesseur/LogoDAO.php";

$filtresLogo = [];

$filtresLogo['nom'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['auteur'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['description'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['prix'] = FILTER_SANITIZE_ENCODED;
$filtresLogo['id'] = FILTER_VALIDATE_INT;


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