<?php
require_once "chemins.php";
require CHEMIN_ACCESSEUR . "AvisDAO.php";

$listeUtilisateurAvis = AvisDAO::listerAvisUtilisateur();
$ajoutAvis = AvisDAO::ajouterAvis();

$idUtilisateur = 1;

if (isset($_POST["id"], $_POST["idLogo"])) {

    $idLogo = $_POST["idLogo"];
    $evaluation = $_POST["id"];

    if($resultat = fetch($connexion, $listeUtilisateurAvis)) {
        $compteLigne = fetchAll($resultat);
    }

    if($compteLigne == 0) {
        $resultat = fetch($connexion, $ajoutAvis);
        echo $resultat;
    }
}
?>