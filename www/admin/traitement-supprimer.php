<?php
require_once "configuration.php";

require_once "../chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";

$id = $_GET["id"];

$finSuppression = LogoDAO::supprimerLogo($id);

if ($finSuppression){
    echo "<a href='admin.php'>ça a été supprimer</a>";
}

?>