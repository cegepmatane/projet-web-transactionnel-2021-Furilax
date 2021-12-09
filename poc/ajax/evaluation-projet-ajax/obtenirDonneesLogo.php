<?php
require_once "chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
require_once "fonctionsEvaluation.php";

$idUtilisateur = 1;

$query = "SELECT * FROM avis ORDER BY id DESC";
$resultat = mysqli_query($conn, $query);

$outputString = '';

foreach ($resultat as $row) {
    $evalUtilisateur = evalUtilisateur($idUtilisateur, $row['id'], $conn);
    $evalTotal = evalTotal($row['id'], $conn);
    $outputString .= '
        <div class="row-item">
 <div class="row-title">' . $row['nom'] . '</div> <div class="response" id="response-' . $row['id'] . '"></div>
 <ul class="list-inline"  onMouseLeave="mouseOutRating(' . $row['id'] . ',' . $evalUtilisateur . ');"> ';
    
    for ($count = 1; $count <= 5; $count ++) {
        $idEtoile = $row['id'] . '_' . $count;
        
        if ($count <= $evalUtilisateur) {
            
            $outputString .= '<li value="' . $count . '" id="' . $idEtoile . '" class="star selected">&#9733;</li>';
        } else {
            $outputString .= '<li value="' . $count . '"  id="' . $idEtoile . '" class="star" onclick="ajouterEvaluation(' . $row['id'] . ',' . $count . ');" onMouseOver="mouseOverRating(' . $row['id'] . ',' . $count . ');">&#9733;</li>';
        }
    } // endFor
    
    $outputString .= '
 </ul>
 
 <p class="review-note">Total Reviews: ' . $evalTotal . '</p>
 <p class="text-address">' . $row["address"] . '</p>
</div>
 ';
}
echo $outputString;
?>