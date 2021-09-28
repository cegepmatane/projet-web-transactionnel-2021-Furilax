<?php
require_once "configuration.php";

require_once "../accesseur/LogoDAO.php";

$id = $_GET["id"];

$finSuppression = LogoDAO::supprimerLogo($id);

if ($finSuppression){
    echo "<a href='admin.php'>ça a été supprimer</a>";
}

?>