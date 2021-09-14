<?php
require "BaseDeDonnees.php";
include_once "modele/Logo.php";

class LogoDAO{

    public static function lireLogoParId($id)
{
$SQL_LOGO = "SELECT * FROM logos WHERE id = :id"; 
$requeteLogo = BaseDeDonnees::getConnexion($id)->prepare($SQL_LOGO);
$requeteLogo->bindParam(':id', $id, PDO::PARAM_INT);
$requeteLogo->execute();
$logo = $requeteLogo->fetch(PDO::FETCH_ASSOC);

return new Logo($logo);
}

public static function listerLogos(){
    $MESSAGE_SQL_LIST_LOGO = "SELECT * FROM logos;";
    $requeteListeLogo = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LIST_LOGO);
    $requeteListeLogo->execute();
    $logosTableau = $requeteListeLogo->fetchAll(PDO::FETCH_ASSOC);
    foreach($logosTableau as $logoTableau) $logos[] = new Logo($tableauLogo);
    
    return $logo;
}

function formater($texte)
{
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
	return $texte;
}

}
?>