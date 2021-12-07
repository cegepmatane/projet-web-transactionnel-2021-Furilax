<?php
require_once "chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";

$idUtilisateur = 1;

if (isset($_POST["index"], $_POST["idLogo"])) {

    $idLogo = $_POST["idLogo"];
    $evaluation = $_POST["index"];

    $verifierQueryExistante = "select * from evaluation where id = '" . $idUtilisateur . "' and idLogo = '" . $idLogo . "'";
    if($resultat = mysqli_query($conn, $verifierQueryExistante)) {
        $rowcount = mysqli_num_rows($resultat);
    }

    if($rowcount == 0) {
        $insertQuery = "INSERT INTO evaluation(idUtilisateur, idLogo, evaluation) VALUES ('" . $idUtilisateur . "','" . $idLogo . "','" . $evaluation . "')";
        $resultat = mysqli_query($conn, $insertQuery);
        echo "succés";
    } else {
        echo "Déjà voté !";
    }
}
?>