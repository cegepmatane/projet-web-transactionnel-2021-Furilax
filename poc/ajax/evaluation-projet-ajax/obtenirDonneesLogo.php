<?php
require_once "chemins.php";
require CHEMIN_ACCESSEUR . "AvisDAO.php";
require_once "fonctionsEvaluation.php";

$idUtilisateur = 1;

$listeAvis = AvisDAO::listerAvis();

$caractereSortie = '';

foreach ($listeAvis as $ligne) {
    $evalUtilisateur = evalUtilisateur($idUtilisateur, $ligne['id'], $connexion);
    $evalTotal = evalTotal($ligne['id'], $connexion);
    $caractereSortie .= '
        <div class="ligne-item">
 <div class="ligne-titre">' . $ligne['evaluation'] . '</div> <div class="response" id="response-' . $ligne['id'] . '"></div>
 <ul class="list-inline"  onMouseLeave="mouseOutRating(' . $ligne['id'] . ',' . $evalUtilisateur . ');"> ';
    
    for ($compte = 1; $compte <= 5; $compte ++) {
        $idEtoile = $ligne['id'] . '_' . $compte;
        
        if ($compte <= $evalUtilisateur) {
            
            $caractereSortie .= '<li value="' . $compte . '" id="' . $idEtoile . '" class="star selected">&#9733;</li>';
        } else {
            $caractereSortie .= '<li value="' . $compte . '"  id="' . $idEtoile . '" class="star" onclick="ajouterEvaluation(' . $ligne['id'] . ',' . $compte . ');" onMouseOver="mouseOverRating(' . $ligne['id'] . ',' . $compte . ');">&#9733;</li>';
        }
    } // endFor
    
    $caractereSortie .= '
 </ul>
 
 <p class="review-note">Total Reviews: ' . $evalTotal . '</p>
 <p class="text-address">' . $ligne["address"] . '</p>
</div>
 ';
}
echo $caractereSortie;
?>