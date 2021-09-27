<?php
include_once "modele/Logo.php";
include_once "accesseur/LogoSQL.php";

class Accesseur{
    public static $basededonnees = null;

		public static function initialiser()
		{
			$usager = 'root';
			$motdepasse = '6785';
			$hote = 'localhost';
			$base = 'logos';
			$dsn = 'mysql:dbname='.$base.';host=' . $hote;
			LogoDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			LogoDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
}

class LogoDAO extends Accesseur implements LogoSQL{

    public static function listerLogos()
    {
        LogoDAO::initialiser();

        $demandeLogos = LogoDAO::$basededonnees->prepare(LogoDAO::SQL_LISTE_LOGOS);
        $demandeLogos->execute();
        //$contrats = $demandeContrats->fetchAll(PDO::FETCH_OBJ);
        $logosTableau = $demandeLogos->fetchAll(PDO::FETCH_ASSOC);
        foreach($logosTableau as $logoTableau) $logos[] = new Logo($logoTableau);
        return $logos;
    }

    public static function nouveautesLogos()
    {
        LogoDAO::initialiser();

        $demandeLogos = LogoDAO::$basededonnees->prepare(LogoDAO::SQL_NOUVEAUTES_LOGOS);
        $demandeLogos->execute();
        //$contrats = $demandeContrats->fetchAll(PDO::FETCH_OBJ);
        $logosTableau = $demandeLogos->fetchAll(PDO::FETCH_ASSOC);
        foreach($logosTableau as $logoTableau) $logos[] = new Logo($logoTableau);
        return $logos;
    }
    
    public static function detaillerLogo($id)
    {
        LogoDAO::initialiser();

        $demandeLogo = LogoDAO::$basededonnees->prepare(LogoDAO::SQL_DETAIL_LOGO);
        $demandeLogo->bindParam(':id', $id, PDO::PARAM_INT);
        $demandeLogo->execute();
        $logo = $demandeLogo->fetch(PDO::FETCH_ASSOC);
        return new Logo($logo);
    }

    
}

function formater($texte)
{
//$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
//$texte = htmlentities($texte,ENT_COMPAT,'UTF');
return $texte;

}
?>