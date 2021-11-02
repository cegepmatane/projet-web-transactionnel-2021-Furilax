<?php 

require_once "chemins.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

$filtresMembre = [];

$filtresMembre['nom'] = FILTER_SANITIZE_ENCODED;
$filtresMembre['mail'] = FILTER_SANITIZE_ENCODED;
$filtresMembre['motDePass'] = FILTER_SANITIZE_ENCODED;
$filtresMembre['id'] = FILTER_SANITIZE_ENCODED;

$membre = filter_input_array(INPUT_POST, $filtresMembre);
//print_r($logo);
$reussiteAjout = MembreDAO::modifierMembre($membre);

if ($reussiteAjout){
    ?>
    <a href='edition-profil.php?membre=<?=$membre->id?>'>ca marche</a>
    <?php
}
else{
    echo "ça marche pas".$reussiteAjout;
}

?>