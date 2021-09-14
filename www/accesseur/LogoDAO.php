<?php
require "BaseDeDonnees.php";
class LogoDAO{

    public static function lireLogoParId($id)
{
$SQL_LOGO = "SELECT * FROM logos WHERE id = :id"; 
$requeteLogo = BaseDeDonnees::getConnexion($id)->prepare($SQL_LOGO);
$requeteLogo->bindParam(':id', $id, PDO::PARAM_INT);
$requeteLogo->execute();
$logo = $requeteLogo->fetch();

return $logo;
}

public static function listerLogos(){
    $MESSAGE_SQL_LIST_LOGO = "SELECT id, nom, auteur, description, image, prix FROM logos;";
    $requeteListeLogo = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LIST_LOGO);
    $requeteListeLogo->execute();
    $listeLogos = $requeteListeLogo->fetchAll();
    
    return $listeLogos;
}

}
?>