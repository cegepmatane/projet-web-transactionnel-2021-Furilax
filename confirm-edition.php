<?php 

require_once "chemins.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

$filtresMembre = [];

$filtresMembre['identidiant'] = FILTER_SANITIZE_ENCODED;
$filtresMembre['courriel'] = FILTER_SANITIZE_ENCODED;
$filtresMembre['motDePasse'] = FILTER_SANITIZE_ENCODED;
$filtresMembre['id'] = FILTER_SANITIZE_ENCODED;

$membre = filter_input_array(INPUT_POST, $filtresMembre);
//print_r($logo);
$reussiteAjout = MembreDAO::modifierMembre($membre);

if ($reussiteAjout){
    echo "ca marche";
}
else{
    echo "ça marche pas".$reussiteAjout;
}

?>