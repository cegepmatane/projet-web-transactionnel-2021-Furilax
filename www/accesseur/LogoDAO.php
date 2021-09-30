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

    public static function ajouterLogo($logo)
    {

        LogoDAO::initialiser();

        $requeteAjouterLogo = LogoDAO::$basededonnees->prepare(LogoDAO::SQL_AJOUTER_LOGO); 
    
        $requeteAjouterLogo->bindParam(':nom', $logo['nom'], PDO::PARAM_STR);
        $requeteAjouterLogo->bindParam(':auteur', $logo['auteur'], PDO::PARAM_STR);
        $requeteAjouterLogo->bindParam(':description', $logo['description'], PDO::PARAM_STR);
        $requeteAjouterLogo->bindParam(':prix', $logo['prix'], PDO::PARAM_STR);
        //$requeteAjouterLogo->bindParam(':image', $logo['image'], PDO::PARAM_STR);
    
        $reussiteAjout = $requeteAjouterLogo -> execute();
        return $reussiteAjout;
    }

    public static function lireLogo($id)
    {
        LogoDAO::initialiser();
        
        $id= filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);

        $requeteLireLogo = LogoDAO::$basededonnees->prepare(LogoDAO::$SQL_LIRE_LOGO);
        $requeteLireLogo-> bindParam(':id',$id,PDO::PARAM_INT);
        $requeteLireLogo->execute();
        return $requeteLireLogo -> fetch();
    }

    public static function modifierLogo($logo)
    {
        LogoDAO::initialiser();

        $requeteLogo = LogoDAO::$basededonnees->prepare(LogoDAO::SQL_MODIFIER_LOGO);

        $requeteLogo->bindParam(':nom', $logo['nom'], PDO::PARAM_STR);
        $requeteLogo->bindParam(':auteur', $logo['auteur'], PDO::PARAM_STR);
        $requeteLogo->bindParam(':description', $logo['description'], PDO::PARAM_STR);
        $requeteLogo->bindParam(':prix', $logo['prix'], PDO::PARAM_STR);
        $requeteLogo->bindParam(':id', $logo['id'], PDO::PARAM_INT);
        
        $reussiteModification = $requeteLogo -> execute();
        return $reussiteModification;
    }
    
    public static function supprimerLogo($id)
    {
        LogoDAO::initialiser();
        $supprimeLogo = LogoDAO::$basededonnees->prepare(LogoDAO::SQL_SUPPRIMER_LOGO);
        $supprimeLogo->bindParam(':id', $id, PDO::PARAM_INT);
        $supprimeLogo->execute();
        return $supprimeLogo;
    }
}

function formater($texte)
{
//$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
//$texte = htmlentities($texte,ENT_COMPAT,'UTF');
return $texte;

}
?>